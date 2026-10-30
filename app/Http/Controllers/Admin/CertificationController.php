<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class CertificationController extends Controller
{
    public function index(): View
    {
        return view('admin.certifications.index', [
            'certifications' => Certification::orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.certifications.create', ['certification' => new Certification()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) $request->input('sort_order', 0);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'));
        }

        Certification::create($data);

        return redirect()->route('admin.certifications.index')->with('status', 'Certification created.');
    }

    public function edit(Certification $certification): View
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification): RedirectResponse
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) $request->input('sort_order', 0);

        if ($request->hasFile('image')) {
            $this->deleteImage($certification->image);
            $data['image'] = $this->storeImage($request->file('image'));
        } elseif ($request->boolean('remove_image')) {
            $this->deleteImage($certification->image);
            $data['image'] = null;
        }

        $certification->update($data);

        return redirect()->route('admin.certifications.index')->with('status', 'Certification updated.');
    }

    public function destroy(Certification $certification): RedirectResponse
    {
        $this->deleteImage($certification->image);
        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('status', 'Certification deleted.');
    }

    /**
     * @return array<string, mixed>
     */
    protected function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'link' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif,svg', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    protected function storeImage(UploadedFile $file): string
    {
        $dir = public_path('uploads/certifications');

        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = 'cert_'.uniqid().'.'.strtolower($file->getClientOriginalExtension());
        $file->move($dir, $name);

        return 'uploads/certifications/'.$name;
    }

    protected function deleteImage(?string $path): void
    {
        // Only delete files we manage (never the shared marquee logos).
        if ($path && str_starts_with($path, 'uploads/certifications/') && is_file(public_path($path))) {
            @unlink(public_path($path));
        }
    }
}
