@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <form method="GET" class="flex items-center gap-2">
            <select name="category" onchange="this.form.submit()"
                    class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @if (request('category'))
                <a href="{{ route('admin.products.index') }}" class="text-sm text-slate-500 hover:text-slate-800">Clear</a>
            @endif
        </form>
        <a href="{{ route('admin.products.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors shadow-sm">
            <i class="fa-solid fa-plus"></i> New Product
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-left text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-semibold">Product</th>
                        <th class="px-5 py-3 font-semibold">Category</th>
                        <th class="px-5 py-3 font-semibold">Design Code</th>
                        <th class="px-5 py-3 font-semibold">Status</th>
                        <th class="px-5 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($products as $product)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-12 w-12 rounded-lg overflow-hidden flex-shrink-0 border border-slate-200 bg-slate-50 grid place-items-center">
                                        @if ($product->imageUrl())
                                            <img src="{{ $product->imageUrl() }}" alt="" class="h-full w-full object-cover">
                                        @else
                                            <i class="fa-solid fa-shirt text-slate-300"></i>
                                        @endif
                                    </div>
                                    <div class="font-semibold text-slate-900">{{ $product->name }}</div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $product->category?->name ?? '—' }}</td>
                            <td class="px-5 py-4 text-slate-400 text-xs">{{ $product->design_code ?: '—' }}</td>
                            <td class="px-5 py-4">
                                @if ($product->is_active)
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full px-2.5 py-1"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active</span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 bg-slate-50 border border-slate-200 rounded-full px-2.5 py-1">Hidden</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-emerald-700 border border-slate-200 hover:border-emerald-300 rounded-lg px-3 py-2 transition-colors"><i class="fa-solid fa-pen"></i> Edit</a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete this product?');">
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
                                <div class="text-slate-300 text-5xl mb-3"><i class="fa-solid fa-box-open"></i></div>
                                <p class="text-slate-500 font-medium">No products found.</p>
                                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 mt-4 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors"><i class="fa-solid fa-plus"></i> New Product</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $products->links() }}
    </div>
@endsection
