<?php

namespace Tests\Feature;

use App\Models\About;
use App\Models\Certification;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertificationTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'a6@test.test', 'role' => 'admin', 'password' => bcrypt('x')]);
    }

    private function customer(): User
    {
        return User::create(['name' => 'User', 'email' => 'u6@test.test', 'role' => 'user', 'password' => bcrypt('x')]);
    }

    public function test_about_us_shows_progress_and_certifications(): void
    {
        About::create([
            'title' => 'About Title',
            'progress_title' => 'Progress Heading Here',
            'progress_stats' => [['value' => '99%', 'label' => 'Progress Stat Label']],
        ]);
        Certification::create(['name' => 'Test Certification Name', 'description' => 'A description.', 'is_active' => true, 'sort_order' => 1]);

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Progress Heading Here')
            ->assertSee('99%')
            ->assertSee('Test Certification Name');
    }

    public function test_inactive_certifications_are_hidden(): void
    {
        Certification::create(['name' => 'Hidden Cert', 'is_active' => false, 'sort_order' => 1]);

        $this->get(route('about'))->assertOk()->assertDontSee('Hidden Cert');
    }

    public function test_guests_and_non_admins_cannot_manage_certifications(): void
    {
        $this->get(route('admin.certifications.index'))->assertRedirect(route('login'));
        $this->actingAs($this->customer())->get(route('admin.certifications.index'))->assertForbidden();
    }

    public function test_admin_can_manage_certifications(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.certifications.index'))->assertOk();
        $this->actingAs($admin)->get(route('admin.certifications.create'))->assertOk();

        $this->actingAs($admin)
            ->post(route('admin.certifications.store'), ['name' => 'ISO 9001', 'description' => 'Quality standard', 'sort_order' => 1, 'is_active' => 1])
            ->assertRedirect(route('admin.certifications.index'));

        $this->assertDatabaseHas('certifications', ['name' => 'ISO 9001']);

        $cert = Certification::first();
        $this->actingAs($admin)->delete(route('admin.certifications.destroy', $cert))->assertRedirect(route('admin.certifications.index'));
        $this->assertDatabaseCount('certifications', 0);
    }

    public function test_admin_about_update_saves_progress_stats(): void
    {
        $this->actingAs($this->admin())->put(route('admin.about.update'), [
            'title' => 'About Title',
            'progress_title' => 'Our Progress So Far',
            'progress_stats' => ['value' => ['50+', ''], 'label' => ['Happy Clients', '']],
        ])->assertRedirect(route('admin.about.edit'));

        $about = About::first();
        $this->assertSame('Our Progress So Far', $about->progress_title);
        $this->assertCount(1, $about->progress_stats);
        $this->assertSame('50+', $about->progress_stats[0]['value']);
    }
}
