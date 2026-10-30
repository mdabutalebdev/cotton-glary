<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class OwnerController extends Controller
{
    public function edit(): View
    {
        return view('admin.owner.edit', ['owner' => Owner::firstOrNew([])]);
    }

    public function update(Request $request): RedirectResponse
    {
        $owner = Owner::firstOrNew([]);

        $data = $request->validate([
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'paragraph_1' => ['nullable', 'string', 'max:2000'],
            'paragraph_2' => ['nullable', 'string', 'max:2000'],
            'phone' => ['nullable', 'string', 'max:60'],
            'email' => ['nullable', 'email', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:4096'],
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($owner->image);
            $data['image'] = $this->storeImage($request->file('image'));
        } elseif ($request->boolean('remove_image')) {
            $this->deleteImage($owner->image);
            $data['image'] = null;
        }

        $owner->fill($data)->save();

        return redirect()->route('admin.owner.edit')->with('status', 'Owner profile updated.');
    }

    protected function storeImage(UploadedFile $file): string
    {
        $dir = public_path('uploads/owner');

        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = 'owner_'.uniqid().'.'.strtolower($file->getClientOriginalExtension());
        $file->move($dir, $name);

        return 'uploads/owner/'.$name;
    }

    protected function deleteImage(?string $path): void
    {
        if ($path && is_file(public_path($path))) {
            @unlink(public_path($path));
        }
    }
}
