@php
    // Build the initial stat rows: old input first, then the banner's saved stats.
    $statRows = [];
    if (old('stats.label')) {
        $on = old('stats.number', []);
        $os = old('stats.suffix', []);
        $ol = old('stats.label', []);
        foreach ($ol as $i => $l) {
            $statRows[] = ['number' => $on[$i] ?? '', 'suffix' => $os[$i] ?? '', 'label' => $l];
        }
    } elseif (! empty($banner->stats)) {
        $statRows = $banner->stats;
    }
    if (empty($statRows)) {
        $statRows = [['number' => '', 'suffix' => '', 'label' => '']];
    }
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if (($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    <div class="grid lg:grid-cols-3 gap-6">

        {{-- Main content column --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Text content card --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-align-left text-emerald-600"></i> Hero Content
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Badge text</label>
                        <input type="text" name="badge_text" value="{{ old('badge_text', $banner->badge_text) }}"
                               placeholder="e.g. Sustainable Apparel"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        <p class="text-xs text-slate-400 mt-1">The small pill above the heading.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $banner->title) }}" required
                               placeholder="e.g. Your Global Partner for Premium Cotton Apparel"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Highlighted words</label>
                        <input type="text" name="highlight_text" value="{{ old('highlight_text', $banner->highlight_text) }}"
                               placeholder="e.g. Premium Cotton"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        <p class="text-xs text-slate-400 mt-1">A part of the title shown in <span class="text-emerald-600 font-semibold">green</span>. Must match text inside the title.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Description</label>
                        <textarea name="description" rows="3"
                                  placeholder="Main paragraph under the title"
                                  class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('description', $banner->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Secondary description</label>
                        <textarea name="sub_description" rows="2"
                                  placeholder="Optional smaller paragraph below the description"
                                  class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('sub_description', $banner->sub_description) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Buttons card --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-hand-pointer text-emerald-600"></i> Call-to-action Buttons
                </h3>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Primary button text</label>
                        <input type="text" name="primary_button_text" value="{{ old('primary_button_text', $banner->primary_button_text) }}"
                               placeholder="e.g. Explore Collections"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Primary button link</label>
                        <input type="text" name="primary_button_link" value="{{ old('primary_button_link', $banner->primary_button_link) }}"
                               placeholder="e.g. /collections or #"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Secondary button text</label>
                        <input type="text" name="secondary_button_text" value="{{ old('secondary_button_text', $banner->secondary_button_text) }}"
                               placeholder="e.g. Contact Sales"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Secondary button link</label>
                        <input type="text" name="secondary_button_link" value="{{ old('secondary_button_link', $banner->secondary_button_link) }}"
                               placeholder="e.g. /contact or #"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>
                </div>
            </div>

            {{-- Stats repeater card --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-chart-simple text-emerald-600"></i> Statistics
                    </h3>
                    <button type="button" id="add-stat"
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-lg px-3 py-1.5 transition-colors">
                        <i class="fa-solid fa-plus"></i> Add stat
                    </button>
                </div>

                <div class="hidden sm:grid grid-cols-12 gap-3 px-1 mb-2 text-xs font-semibold text-slate-400 uppercase tracking-wide">
                    <div class="col-span-3">Number</div>
                    <div class="col-span-2">Suffix</div>
                    <div class="col-span-6">Label</div>
                    <div class="col-span-1"></div>
                </div>

                <div id="stats-list" class="space-y-3">
                    @foreach ($statRows as $row)
                        <div class="stat-row grid grid-cols-12 gap-3 items-center">
                            <input type="text" name="stats[number][]" value="{{ $row['number'] ?? '' }}" placeholder="120"
                                   class="col-span-4 sm:col-span-3 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                            <input type="text" name="stats[suffix][]" value="{{ $row['suffix'] ?? '' }}" placeholder="+"
                                   class="col-span-3 sm:col-span-2 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                            <input type="text" name="stats[label][]" value="{{ $row['label'] ?? '' }}" placeholder="Partner Factories"
                                   class="col-span-4 sm:col-span-6 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                            <button type="button" class="remove-stat col-span-1 text-slate-400 hover:text-red-600 transition-colors" title="Remove">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
                <p class="text-xs text-slate-400 mt-3">Around 4 stats look best. Leave empty rows blank — they are ignored.</p>
            </div>
        </div>

        {{-- Sidebar column --}}
        <div class="space-y-6">

            {{-- Publish card --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-toggle-on text-emerald-600"></i> Visibility
                </h3>

                <label class="flex items-start gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}
                           class="mt-0.5 h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 accent-emerald-600">
                    <span>
                        <span class="block text-sm font-medium text-slate-800">Show on homepage</span>
                        <span class="block text-xs text-slate-400">Makes this the live hero. Any other live banner is switched off.</span>
                    </span>
                </label>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $banner->sort_order ?? 0) }}" min="0"
                           class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                </div>
            </div>

            {{-- Background image card --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-image text-emerald-600"></i> Background Image
                </h3>

                @if ($banner->background_image)
                    <div class="mb-3 rounded-lg overflow-hidden border border-slate-200">
                        <img src="{{ $banner->backgroundUrl() }}" alt="Current background" class="w-full h-32 object-cover">
                    </div>
                    <label class="flex items-center gap-2 text-xs text-slate-600 mb-3 cursor-pointer">
                        <input type="checkbox" name="remove_background" value="1" class="h-4 w-4 rounded border-slate-300 text-red-600 accent-red-600">
                        Remove current image
                    </label>
                @endif

                <label class="block">
                    <span class="sr-only">Choose image</span>
                    <input type="file" name="background_image" accept="image/*"
                           class="block w-full text-sm text-slate-500
                                  file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0
                                  file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700
                                  hover:file:bg-emerald-100 cursor-pointer">
                </label>
                <p class="text-xs text-slate-400 mt-2">JPG, PNG, WEBP or GIF · max 4 MB. Leave empty to keep the default gradient.</p>
            </div>

            {{-- Actions --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-3 rounded-lg transition-colors shadow-sm">
                    <i class="fa-solid fa-floppy-disk"></i> {{ $submitLabel ?? 'Save Banner' }}
                </button>
                <a href="{{ route('admin.banners.index') }}"
                   class="mt-3 w-full inline-flex items-center justify-center gap-2 text-slate-600 hover:text-slate-900 text-sm font-medium px-4 py-2.5 rounded-lg transition-colors">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    (function () {
        const list = document.getElementById('stats-list');
        const addBtn = document.getElementById('add-stat');

        function rowTemplate() {
            const row = document.createElement('div');
            row.className = 'stat-row grid grid-cols-12 gap-3 items-center';
            row.innerHTML =
                '<input type="text" name="stats[number][]" placeholder="120" class="col-span-4 sm:col-span-3 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">' +
                '<input type="text" name="stats[suffix][]" placeholder="+" class="col-span-3 sm:col-span-2 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">' +
                '<input type="text" name="stats[label][]" placeholder="Partner Factories" class="col-span-4 sm:col-span-6 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">' +
                '<button type="button" class="remove-stat col-span-1 text-slate-400 hover:text-red-600 transition-colors" title="Remove"><i class="fa-solid fa-circle-xmark"></i></button>';
            return row;
        }

        addBtn.addEventListener('click', function () {
            list.appendChild(rowTemplate());
        });

        list.addEventListener('click', function (e) {
            const btn = e.target.closest('.remove-stat');
            if (!btn) return;
            const rows = list.querySelectorAll('.stat-row');
            if (rows.length > 1) {
                btn.closest('.stat-row').remove();
            } else {
                // Keep at least one row: just clear it.
                btn.closest('.stat-row').querySelectorAll('input').forEach(i => i.value = '');
            }
        });
    })();
</script>
@endpush
