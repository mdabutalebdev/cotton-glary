<?php

namespace Tests\Feature;

use App\Models\About;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OwnerProfileTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'a3@test.test', 'role' => 'admin', 'password' => bcrypt('x')]);
    }

    private function customer(): User
    {
        return User::create(['name' => 'User', 'email' => 'u3@test.test', 'role' => 'user', 'password' => bcrypt('x')]);
    }

    public function test_about_us_page_shows_about_and_owner(): void
    {
        About::create(['title' => 'Company About Title', 'paragraph_1' => 'About para.']);
        Owner::create(['name' => 'Owner Person Name', 'designation' => 'CEO Role', 'paragraph_1' => 'Owner bio.']);

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Company About Title')
            ->assertSee('Owner Person Name')
            ->assertSee('CEO Role');
    }

    public function test_about_us_page_works_without_rows(): void
    {
        $this->get(route('about'))->assertOk();
    }

    public function test_navbar_links_to_about_page(): void
    {
        $this->get('/')->assertOk()->assertSee(route('about'));
    }

    public function test_guests_cannot_edit_owner(): void
    {
        $this->get(route('admin.owner.edit'))->assertRedirect(route('login'));
    }

    public function test_non_admins_are_forbidden(): void
    {
        $this->actingAs($this->customer())->get(route('admin.owner.edit'))->assertForbidden();
    }

    public function test_admin_can_view_and_update_owner(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.owner.edit'))->assertOk();

        $this->actingAs($admin)
            ->put(route('admin.owner.update'), [
                'name' => 'New Owner Name',
                'designation' => 'Managing Director',
                'paragraph_1' => 'Bio text.',
                'phone' => '+880 111',
                'email' => 'owner@example.com',
            ])
            ->assertRedirect(route('admin.owner.edit'));

        $this->assertDatabaseHas('owners', ['name' => 'New Owner Name']);
        $this->assertDatabaseCount('owners', 1);
    }

    public function test_owner_name_is_required(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.owner.update'), ['name' => ''])
            ->assertSessionHasErrors('name');
    }
}
