<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'a5@test.test', 'role' => 'admin', 'password' => bcrypt('x')]);
    }

    private function customer(): User
    {
        return User::create(['name' => 'User', 'email' => 'u5@test.test', 'role' => 'user', 'password' => bcrypt('x')]);
    }

    public function test_contact_page_renders_with_info(): void
    {
        Contact::create(['email' => 'hello@cottongalary.test', 'address' => 'Some Street, Dhaka']);

        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('hello@cottongalary.test')
            ->assertSee('Some Street, Dhaka');
    }

    public function test_visitor_can_submit_a_message(): void
    {
        $this->post(route('contact.submit'), [
            'name' => 'Jane Buyer',
            'email' => 'jane@example.com',
            'phone' => '12345',
            'subject' => 'Bulk order',
            'message' => 'I would like a quote for 500 t-shirts.',
        ])->assertRedirect();

        $this->assertDatabaseHas('contact_messages', ['email' => 'jane@example.com', 'subject' => 'Bulk order', 'is_read' => false]);
    }

    public function test_honeypot_blocks_bot_submissions(): void
    {
        $this->post(route('contact.submit'), [
            'name' => 'Bot',
            'email' => 'bot@example.com',
            'message' => 'spam',
            'website' => 'http://spam.example',
        ])->assertRedirect();

        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $this->post(route('contact.submit'), ['name' => '', 'email' => 'not-an-email', 'message' => ''])
            ->assertSessionHasErrors(['name', 'email', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_guests_and_non_admins_cannot_reach_admin_contact(): void
    {
        $this->get(route('admin.contact.edit'))->assertRedirect(route('login'));
        $this->get(route('admin.messages.index'))->assertRedirect(route('login'));
        $this->actingAs($this->customer())->get(route('admin.messages.index'))->assertForbidden();
    }

    public function test_admin_can_edit_contact_info(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.contact.update'), ['email' => 'new@cottongalary.test', 'phone' => '+880 111'])
            ->assertRedirect(route('admin.contact.edit'));

        $this->assertDatabaseHas('contacts', ['email' => 'new@cottongalary.test']);
    }

    public function test_admin_can_view_read_and_delete_messages(): void
    {
        $admin = $this->admin();
        $message = ContactMessage::create(['name' => 'Sam', 'email' => 'sam@example.com', 'message' => 'Hi there', 'is_read' => false]);

        $this->actingAs($admin)->get(route('admin.messages.index'))->assertOk()->assertSee('Sam');

        // Viewing marks it read.
        $this->actingAs($admin)->get(route('admin.messages.show', $message))->assertOk()->assertSee('Hi there');
        $this->assertTrue($message->fresh()->is_read);

        $this->actingAs($admin)->delete(route('admin.messages.destroy', $message))->assertRedirect(route('admin.messages.index'));
        $this->assertDatabaseCount('contact_messages', 0);
    }
}
