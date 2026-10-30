<form method="POST" action="{{ $action }}" class="space-y-6 max-w-2xl">
    @csrf
    @if (($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Category name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                   placeholder="e.g. Chefwear"
                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}" min="0"
                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
            <p class="text-xs text-slate-400 mt-1">Lower numbers appear first on the page.</p>
        </div>

        <label class="flex items-start gap-3 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}
                   class="mt-0.5 h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 accent-emerald-600">
            <span>
                <span class="block text-sm font-medium text-slate-800">Active</span>
                <span class="block text-xs text-slate-400">Show this category (and its products) on the Product &amp; Service page.</span>
            </span>
        </label>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors shadow-sm">
            <i class="fa-solid fa-floppy-disk"></i> {{ $submitLabel ?? 'Save Category' }}
        </button>
        <a href="{{ route('admin.categories.index') }}" class="text-slate-600 hover:text-slate-900 text-sm font-medium px-4 py-2.5">Cancel</a>
    </div>
</form>
