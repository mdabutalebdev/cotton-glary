<?php

namespace Tests\Feature;

use App\Models\About;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutSectionTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'a2@test.test', 'role' => 'admin', 'password' => bcrypt('x')]);
    }

    private function customer(): User
    {
        return User::create(['name' => 'User', 'email' => 'u2@test.test', 'role' => 'user', 'password' => bcrypt('x')]);
    }

    public function test_homepage_renders_the_about_section(): void
    {
        About::create([
            'eyebrow' => 'About Us Label',
            'title' => 'About Title Here',
            'paragraph_1' => 'First paragraph.',
            'button_text' => 'About Us',
            'button_link' => '#',
        ]);

        $this->get('/')->assertOk()->assertSee('About Title Here')->assertSee('About Us Label');
    }

    public function test_homepage_works_without_an_about_row(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_guests_cannot_edit_about(): void
    {
        $this->get(route('admin.about.edit'))->assertRedirect(route('login'));
    }

    public function test_non_admins_are_forbidden(): void
    {
        $this->actingAs($this->customer())->get(route('admin.about.edit'))->assertForbidden();
    }

    public function test_admin_can_view_and_update_about(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.about.edit'))->assertOk();

        $this->actingAs($admin)
            ->put(route('admin.about.update'), [
                'title' => 'New About Title',
                'paragraph_1' => 'Updated paragraph.',
                'button_text' => 'Learn More',
                'button_link' => '#',
            ])
            ->assertRedirect(route('admin.about.edit'));

        $this->assertDatabaseHas('about_sections', ['title' => 'New About Title']);
        $this->assertDatabaseCount('about_sections', 1);
    }

    public function test_updating_twice_keeps_a_single_row(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->put(route('admin.about.update'), ['title' => 'First']);
        $this->actingAs($admin)->put(route('admin.about.update'), ['title' => 'Second']);

        $this->assertDatabaseCount('about_sections', 1);
        $this->assertDatabaseHas('about_sections', ['title' => 'Second']);
    }

    public function test_about_title_is_required(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.about.update'), ['title' => ''])
            ->assertSessionHasErrors('title');
    }
}
