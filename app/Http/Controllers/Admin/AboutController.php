<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Show the single About-section edit form.
     */
    public function edit(): View
    {
        return view('admin.about.edit', ['about' => About::firstOrNew([])]);
    }

    /**
     * Save the About section.
     */
    public function update(Request $request): RedirectResponse
    {
        $about = About::firstOrNew([]);

        $data = $request->validate([
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'paragraph_1' => ['nullable', 'string', 'max:2000'],
            'paragraph_2' => ['nullable', 'string', 'max:2000'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_link' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:4096'],
            'progress_title' => ['nullable', 'string', 'max:255'],
        ]);

        $data['progress_stats'] = $this->buildProgressStats($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($about->image);
            $data['image'] = $this->storeImage($request->file('image'));
        } elseif ($request->boolean('remove_image')) {
            $this->deleteImage($about->image);
            $data['image'] = null;
        }

        $about->fill($data)->save();

        return redirect()->route('admin.about.edit')->with('status', 'About section updated.');
    }

    /**
     * Zip the parallel progress-stat inputs into an array of rows, dropping empty ones.
     *
     * @return array<int, array<string, string>>
     */
    protected function buildProgressStats(Request $request): array
    {
        $values = (array) $request->input('progress_stats.value', []);
        $labels = (array) $request->input('progress_stats.label', []);

        $rows = [];
        foreach ($values as $i => $value) {
            $value = trim((string) $value);
            $label = trim((string) ($labels[$i] ?? ''));

            if ($value === '' && $label === '') {
                continue;
            }

            $rows[] = ['value' => $value, 'label' => $label];
        }

        return $rows;
    }

    protected function storeImage(UploadedFile $file): string
    {
        $dir = public_path('uploads/about');

        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = 'about_'.uniqid().'.'.strtolower($file->getClientOriginalExtension());
        $file->move($dir, $name);

        return 'uploads/about/'.$name;
    }

    protected function deleteImage(?string $path): void
    {
        if ($path && is_file(public_path($path))) {
            @unlink(public_path($path));
        }
    }
}
