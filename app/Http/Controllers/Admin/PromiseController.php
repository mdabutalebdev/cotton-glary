<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promise;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromiseController extends Controller
{
    public function edit(): View
    {
        return view('admin.promise.edit', ['promise' => Promise::firstOrNew([])]);
    }

    public function update(Request $request): RedirectResponse
    {
        $promise = Promise::firstOrNew([]);

        $data = $request->validate([
            'values_intro' => ['nullable', 'string', 'max:3000'],
            'vision_intro' => ['nullable', 'string', 'max:2000'],
        ]);

        $data['pillars'] = $this->zip($request, 'pillars', ['icon', 'title', 'subtitle', 'description']);
        $data['milestones'] = $this->zip($request, 'milestones', ['year', 'description']);
        $data['stats'] = $this->zip($request, 'stats', ['value', 'label']);

        $promise->fill($data)->save();

        return redirect()->route('admin.promise.edit')->with('status', 'Our Promise page updated.');
    }

    /**
     * Zip parallel repeater inputs into an array of rows, dropping empty ones.
     *
     * @param  array<int, string>  $fields
     * @return array<int, array<string, string>>
     */
    protected function zip(Request $request, string $key, array $fields): array
    {
        $columns = [];
        foreach ($fields as $field) {
            $columns[$field] = (array) $request->input("$key.$field", []);
        }

        $count = max(array_map('count', $columns) ?: [0]);
        $rows = [];

        for ($i = 0; $i < $count; $i++) {
            $row = [];
            $empty = true;

            foreach ($fields as $field) {
                $value = trim((string) ($columns[$field][$i] ?? ''));
                $row[$field] = $value;
                if ($value !== '') {
                    $empty = false;
                }
            }

            if (! $empty) {
                $rows[] = $row;
            }
        }

        return $rows;
    }
}
