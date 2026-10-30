@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <p class="text-slate-500 text-sm">Garment categories shown as sections on the Product &amp; Service page.</p>
        <a href="{{ route('admin.categories.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors shadow-sm">
            <i class="fa-solid fa-plus"></i> New Category
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-left text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-semibold">Category</th>
                        <th class="px-5 py-3 font-semibold">Products</th>
                        <th class="px-5 py-3 font-semibold">Order</th>
                        <th class="px-5 py-3 font-semibold">Status</th>
                        <th class="px-5 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-5 py-4">
                                <div class="font-semibold text-slate-900">{{ $category->name }}</div>
                                <div class="text-xs text-slate-400">/{{ $category->slug }}</div>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $category->products_count }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $category->sort_order }}</td>
                            <td class="px-5 py-4">
                                @if ($category->is_active)
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full px-2.5 py-1"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active</span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 bg-slate-50 border border-slate-200 rounded-full px-2.5 py-1">Hidden</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-emerald-700 border border-slate-200 hover:border-emerald-300 rounded-lg px-3 py-2 transition-colors"><i class="fa-solid fa-pen"></i> Edit</a>
                                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Delete this category and ALL its products?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-red-600 border border-slate-200 hover:border-red-300 rounded-lg px-3 py-2 transition-colors"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-16 text-center">
                                <div class="text-slate-300 text-5xl mb-3"><i class="fa-solid fa-tags"></i></div>
                                <p class="text-slate-500 font-medium">No categories yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
