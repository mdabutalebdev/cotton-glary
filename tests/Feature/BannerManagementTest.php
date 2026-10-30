<?php

namespace Tests\Feature;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BannerManagementTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create([
            'name' => 'Admin',
            'email' => 'admin@example.test',
            'role' => 'admin',
            'password' => bcrypt('secret'),
        ]);
    }

    private function customer(): User
    {
        return User::create([
            'name' => 'Rahim',
            'email' => 'rahim@example.test',
            'role' => 'user',
            'password' => bcrypt('secret'),
        ]);
    }

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'badge_text' => 'Sustainable Apparel',
            'title' => 'Your Global Partner for Premium Cotton Apparel',
            'highlight_text' => 'Premium Cotton',
            'description' => 'Main paragraph.',
            'sub_description' => 'Secondary paragraph.',
            'primary_button_text' => 'Explore Collections',
            'primary_button_link' => '#',
            'secondary_button_text' => 'Contact Sales',
            'secondary_button_link' => '#',
            'sort_order' => 0,
            'is_active' => 1,
            'stats' => [
                'number' => ['120', '25'],
                'suffix' => ['+', ''],
                'label' => ['Partner Factories', 'Countries Served'],
            ],
        ], $overrides);
    }

    public function test_homepage_shows_the_active_banner(): void
    {
        Banner::create($this->payload(['title' => 'Live Hero Title', 'is_active' => true, 'stats' => []]));

        $this->get('/')
            ->assertOk()
            ->assertSee('Live Hero Title');
    }

    public function test_homepage_still_works_without_any_banner(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_guests_cannot_manage_banners(): void
    {
        $this->get(route('admin.banners.index'))->assertRedirect(route('login'));
    }

    public function test_non_admins_are_forbidden(): void
    {
        $this->actingAs($this->customer())
            ->get(route('admin.banners.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_the_banners_table(): void
    {
        Banner::create($this->payload(['title' => 'Table Row Banner', 'stats' => []]));

        $this->actingAs($this->admin())
            ->get(route('admin.banners.index'))
            ->assertOk()
            ->assertSee('Table Row Banner');
    }

    public function test_admin_can_view_create_and_edit_forms(): void
    {
        $banner = Banner::create($this->payload(['stats' => []]));
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.banners.create'))->assertOk();
        $this->actingAs($admin)->get(route('admin.banners.edit', $banner))->assertOk();
    }

    public function test_admin_can_create_a_banner_with_stats(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.banners.store'), $this->payload())
            ->assertRedirect(route('admin.banners.index'));

        $banner = Banner::first();

        $this->assertNotNull($banner);
        $this->assertSame('Your Global Partner for Premium Cotton Apparel', $banner->title);
        $this->assertCount(2, $banner->stats);
        $this->assertSame('Partner Factories', $banner->stats[0]['label']);
        $this->assertTrue($banner->is_active);
    }

    public function test_creating_an_active_banner_deactivates_others(): void
    {
        $admin = $this->admin();
        $first = Banner::create($this->payload(['title' => 'First', 'is_active' => true, 'stats' => []]));

        $this->actingAs($admin)
            ->post(route('admin.banners.store'), $this->payload(['title' => 'Second', 'is_active' => 1]));

        $this->assertFalse($first->fresh()->is_active);
        $this->assertTrue(Banner::where('title', 'Second')->first()->is_active);
        $this->assertSame(1, Banner::where('is_active', true)->count());
    }

    public function test_admin_can_update_a_banner(): void
    {
        $banner = Banner::create($this->payload(['title' => 'Old Title', 'stats' => []]));

        $this->actingAs($this->admin())
            ->put(route('admin.banners.update', $banner), $this->payload(['title' => 'New Title']))
            ->assertRedirect(route('admin.banners.index'));

        $this->assertSame('New Title', $banner->fresh()->title);
    }

    public function test_admin_can_delete_a_banner(): void
    {
        $banner = Banner::create($this->payload(['stats' => []]));

        $this->actingAs($this->admin())
            ->delete(route('admin.banners.destroy', $banner))
            ->assertRedirect(route('admin.banners.index'));

        $this->assertDatabaseCount('banners', 0);
    }

    public function test_activate_endpoint_makes_a_banner_sole_active(): void
    {
        $admin = $this->admin();
        $live = Banner::create($this->payload(['title' => 'Currently Live', 'is_active' => true, 'stats' => []]));
        $draft = Banner::create($this->payload(['title' => 'Draft', 'is_active' => false, 'stats' => []]));

        $this->actingAs($admin)
            ->patch(route('admin.banners.activate', $draft))
            ->assertRedirect(route('admin.banners.index'));

        $this->assertTrue($draft->fresh()->is_active);
        $this->assertFalse($live->fresh()->is_active);
    }

    public function test_title_is_required_when_creating(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.banners.store'), $this->payload(['title' => '']))
            ->assertSessionHasErrors('title');
    }
}
