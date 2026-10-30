<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if (($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Category <span class="text-red-500">*</span></label>
                    <select name="category_id" required
                            class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        <option value="">Select a category…</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Product name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                           placeholder="e.g. Chef Shirt"
                           class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Design code</label>
                    <input type="text" name="design_code" value="{{ old('design_code', $product->design_code) }}"
                           placeholder="e.g. CG_DESIGN_00123"
                           class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    <p class="text-xs text-slate-400 mt-1">Shown under the product name on the card.</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2"><i class="fa-solid fa-toggle-on text-emerald-600"></i> Visibility</h3>
                <label class="flex items-start gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                           class="mt-0.5 h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 accent-emerald-600">
                    <span>
                        <span class="block text-sm font-medium text-slate-800">Active</span>
                        <span class="block text-xs text-slate-400">Show this product on the page.</span>
                    </span>
                </label>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}" min="0"
                           class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2"><i class="fa-solid fa-image text-emerald-600"></i> Product Image</h3>
                @if ($product->imageUrl())
                    <div class="mb-3 rounded-lg overflow-hidden border border-slate-200">
                        <img src="{{ $product->imageUrl() }}" alt="Current image" class="w-full h-40 object-cover">
                    </div>
                    <label class="flex items-center gap-2 text-xs text-slate-600 mb-3 cursor-pointer">
                        <input type="checkbox" name="remove_image" value="1" class="h-4 w-4 rounded border-slate-300 text-red-600 accent-red-600"> Remove current image
                    </label>
                @endif
                <input type="file" name="image" accept="image/*"
                       class="block w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                <p class="text-xs text-slate-400 mt-2">JPG, PNG, WEBP or GIF · max 4 MB. Leave empty to show a placeholder.</p>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-3 rounded-lg transition-colors shadow-sm">
                    <i class="fa-solid fa-floppy-disk"></i> {{ $submitLabel ?? 'Save Product' }}
                </button>
                <a href="{{ route('admin.products.index') }}" class="mt-3 w-full inline-flex items-center justify-center text-slate-600 hover:text-slate-900 text-sm font-medium px-4 py-2.5">Cancel</a>
            </div>
        </div>
    </div>
</form>
