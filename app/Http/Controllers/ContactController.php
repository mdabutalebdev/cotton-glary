<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact', ['contact' => Contact::current()]);
    }

    public function submit(Request $request): RedirectResponse
    {
        // Honeypot — bots fill this hidden field; humans never see it.
        if ($request->filled('website')) {
            return redirect()->to(route('contact').'#contact')->with('contact_status', 'Thank you for reaching out!');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:60'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($data);

        return redirect()->to(route('contact').'#contact')
            ->with('contact_status', 'Thank you for reaching out! We have received your message and will get back to you soon.');
    }
}
