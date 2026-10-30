<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function edit(): View
    {
        return view('admin.contact.edit', ['contact' => Contact::firstOrNew([])]);
    }

    public function update(Request $request): RedirectResponse
    {
        $contact = Contact::firstOrNew([]);

        $data = $request->validate([
            'intro' => ['nullable', 'string', 'max:1000'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'hours' => ['nullable', 'string', 'max:255'],
            'map_embed' => ['nullable', 'string', 'max:2000'],
        ]);

        $contact->fill($data)->save();

        return redirect()->route('admin.contact.edit')->with('status', 'Contact info updated.');
    }
}
