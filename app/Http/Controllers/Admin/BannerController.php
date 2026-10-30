<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * List all banners in the admin data table.
     */
    public function index(): View
    {
        $banners = Banner::orderByDesc('is_active')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the "create banner" form.
     */
    public function create(): View
    {
        return view('admin.banners.create', ['banner' => new Banner()]);
    }

    /**
     * Persist a new banner.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['stats'] = $this->buildStats($request);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) $request->input('sort_order', 0);

        if ($request->hasFile('background_image')) {
            $data['background_image'] = $this->storeImage($request->file('background_image'));
        }

        $banner = Banner::create($data);

        if ($banner->is_active) {
            $this->makeSoleActive($banner);
        }

        return redirect()
            ->route('admin.banners.index')
            ->with('status', 'Banner created successfully.');
    }

    /**
     * Show the "edit banner" form.
     */
    public function edit(Banner $banner): View
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update an existing banner.
     */
    public function update(Request $request, Banner $banner): RedirectResponse
    {
        $data = $this->validated($request);
        $data['stats'] = $this->buildStats($request);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) $request->input('sort_order', 0);

        // Replace image if a new one was uploaded.
        if ($request->hasFile('background_image')) {
            $this->deleteImage($banner->background_image);
            $data['background_image'] = $this->storeImage($request->file('background_image'));
        } elseif ($request->boolean('remove_background')) {
            // Or drop the current image if requested.
            $this->deleteImage($banner->background_image);
            $data['background_image'] = null;
        }

        $banner->update($data);

        if ($banner->is_active) {
            $this->makeSoleActive($banner);
        }

        return redirect()
            ->route('admin.banners.index')
            ->with('status', 'Banner updated successfully.');
    }

    /**
     * Delete a banner (and its image file).
     */
    public function destroy(Banner $banner): RedirectResponse
    {
        $this->deleteImage($banner->background_image);
        $banner->delete();

        return redirect()
            ->route('admin.banners.index')
            ->with('status', 'Banner deleted.');
    }

    /**
     * Make a banner the one shown on the homepage.
     */
    public function activate(Banner $banner): RedirectResponse
    {
        $banner->update(['is_active' => true]);
        $this->makeSoleActive($banner);

        return redirect()
            ->route('admin.banners.index')
            ->with('status', '"'.$banner->title.'" is now live on the homepage.');
    }

    /**
     * Validate the incoming banner fields.
     *
     * @return array<string, mixed>
     */
    protected function validated(Request $request): array
    {
        return $request->validate([
            'badge_text' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'highlight_text' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sub_description' => ['nullable', 'string', 'max:2000'],
            'primary_button_text' => ['nullable', 'string', 'max:255'],
            'primary_button_link' => ['nullable', 'string', 'max:255'],
            'secondary_button_text' => ['nullable', 'string', 'max:255'],
            'secondary_button_link' => ['nullable', 'string', 'max:255'],
            'background_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    /**
     * Zip the parallel stat inputs into a clean array, dropping empty rows.
     *
     * @return array<int, array<string, string>>
     */
    protected function buildStats(Request $request): array
    {
        $numbers = (array) $request->input('stats.number', []);
        $suffixes = (array) $request->input('stats.suffix', []);
        $labels = (array) $request->input('stats.label', []);

        $stats = [];

        foreach ($labels as $i => $label) {
            $number = trim((string) ($numbers[$i] ?? ''));
            $label = trim((string) $label);

            if ($number === '' && $label === '') {
                continue;
            }

            $stats[] = [
                'number' => $number,
                'suffix' => trim((string) ($suffixes[$i] ?? '')),
                'label' => $label,
            ];
        }

        return $stats;
    }

    /**
     * Move an uploaded image into public/uploads/banners and return its path.
     */
    protected function storeImage(UploadedFile $file): string
    {
        $dir = public_path('uploads/banners');

        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = 'banner_'.uniqid().'.'.strtolower($file->getClientOriginalExtension());
        $file->move($dir, $name);

        return 'uploads/banners/'.$name;
    }

    /**
     * Remove a stored image file if it exists.
     */
    protected function deleteImage(?string $path): void
    {
        if ($path && is_file(public_path($path))) {
            @unlink(public_path($path));
        }
    }

    /**
     * Ensure only the given banner is flagged active.
     */
    protected function makeSoleActive(Banner $banner): void
    {
        Banner::where('id', '!=', $banner->id)
            ->where('is_active', true)
            ->update(['is_active' => false]);
    }
}
