<?php

namespace Tests\Feature;

use App\Models\Promise;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OurPromisePageTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'a4@test.test', 'role' => 'admin', 'password' => bcrypt('x')]);
    }

    private function customer(): User
    {
        return User::create(['name' => 'User', 'email' => 'u4@test.test', 'role' => 'user', 'password' => bcrypt('x')]);
    }

    public function test_our_promise_page_renders_all_sections(): void
    {
        Promise::create([
            'values_intro' => 'Our values statement here.',
            'vision_intro' => 'Vision line.',
            'pillars' => [['icon' => 'fa-star', 'title' => 'PillarOne', 'subtitle' => 'Sub', 'description' => 'Pillar desc.']],
            'milestones' => [['year' => '2011', 'description' => 'A milestone event.']],
            'stats' => [['value' => '99%', 'label' => 'StatLabelOne']],
        ]);

        $this->get(route('promise'))
            ->assertOk()
            ->assertSee('Our values statement here.')
            ->assertSee('PillarOne')
            ->assertSee('2011')
            ->assertSee('StatLabelOne');
    }

    public function test_page_works_without_a_promise_row(): void
    {
        $this->get(route('promise'))->assertOk();
    }

    public function test_guests_cannot_edit_promise(): void
    {
        $this->get(route('admin.promise.edit'))->assertRedirect(route('login'));
    }

    public function test_non_admins_are_forbidden(): void
    {
        $this->actingAs($this->customer())->get(route('admin.promise.edit'))->assertForbidden();
    }

    public function test_admin_can_view_and_update_promise(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.promise.edit'))->assertOk();

        $this->actingAs($admin)->put(route('admin.promise.update'), [
            'values_intro' => 'New values intro',
            'vision_intro' => 'New vision intro',
            'pillars' => ['icon' => ['fa-award'], 'title' => ['Quality'], 'subtitle' => ['Product'], 'description' => ['Great quality.']],
            'milestones' => ['year' => ['2020'], 'description' => ['We were founded.']],
            'stats' => ['value' => ['50+'], 'label' => ['Clients']],
        ])->assertRedirect(route('admin.promise.edit'));

        $promise = Promise::first();
        $this->assertSame('New values intro', $promise->values_intro);
        $this->assertCount(1, $promise->pillars);
        $this->assertSame('Quality', $promise->pillars[0]['title']);
        $this->assertSame('2020', $promise->milestones[0]['year']);
        $this->assertSame('50+', $promise->stats[0]['value']);
    }

    public function test_empty_repeater_rows_are_dropped(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->put(route('admin.promise.update'), [
            'pillars' => ['icon' => ['fa-award', ''], 'title' => ['Quality', ''], 'subtitle' => ['', ''], 'description' => ['Desc', '']],
        ]);

        $promise = Promise::first();
        $this->assertCount(1, $promise->pillars);
    }
}
