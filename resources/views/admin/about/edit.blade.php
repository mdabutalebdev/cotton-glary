@extends('layouts.admin')

@section('title', 'About Section')

@php
    $progressRows = ! empty($about->progress_stats) ? $about->progress_stats : [[]];
@endphp

@section('content')
    <p class="text-slate-500 text-sm mb-6">The "About Company" block (homepage) and the "Progress" section on the About Us page.</p>

    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
                    <h3 class="text-sm font-bold text-slate-900 mb-2 flex items-center gap-2"><i class="fa-solid fa-align-left text-emerald-600"></i> Content</h3>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Eyebrow / small label</label>
                        <input type="text" name="eyebrow" value="{{ old('eyebrow', $about->eyebrow) }}"
                               placeholder="e.g. About Cotton Galary"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        <p class="text-xs text-slate-400 mt-1">The small gold label above the title.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $about->title) }}" required
                               placeholder="e.g. Your Trusted Partner in Premium Cotton Apparel"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Paragraph 1</label>
                        <textarea name="paragraph_1" rows="3"
                                  class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('paragraph_1', $about->paragraph_1) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Paragraph 2</label>
                        <textarea name="paragraph_2" rows="3"
                                  class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('paragraph_2', $about->paragraph_2) }}</textarea>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Button text</label>
                            <input type="text" name="button_text" value="{{ old('button_text', $about->button_text) }}"
                                   placeholder="e.g. About Us"
                                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Button link</label>
                            <input type="text" name="button_link" value="{{ old('button_link', $about->button_link) }}"
                                   placeholder="e.g. /about-us or #"
                                   class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                            <p class="text-xs text-slate-400 mt-1">Where the button goes (leave blank to hide the button).</p>
                        </div>
                    </div>
                </div>

                {{-- Progress stats (About Us page) --}}
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6" data-repeater>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-chart-simple text-emerald-600"></i> Progress Stats <span class="text-xs font-normal text-slate-400">· About Us page</span></h3>
                        <button type="button" data-repeater-add class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-lg px-3 py-1.5 transition-colors"><i class="fa-solid fa-plus"></i> Add stat</button>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Section title</label>
                        <input type="text" name="progress_title" value="{{ old('progress_title', $about->progress_title) }}" placeholder="e.g. Our Progress So Far"
                               class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                    </div>
                    <div data-repeater-list class="space-y-3">
                        @foreach ($progressRows as $row)
                            @include('admin.about._progress_row')
                        @endforeach
                    </div>
                    <template data-repeater-template>@include('admin.about._progress_row', ['row' => []])</template>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                    <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2"><i class="fa-solid fa-image text-emerald-600"></i> Image</h3>
                    @if ($about->imageUrl())
                        <div class="mb-3 rounded-lg overflow-hidden border border-slate-200">
                            <img src="{{ $about->imageUrl() }}" alt="Current image" class="w-full h-40 object-cover">
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
                        <i class="fa-solid fa-floppy-disk"></i> Save About Section
                    </button>
                    <a href="{{ route('home') }}" target="_blank" class="mt-3 w-full inline-flex items-center justify-center gap-2 text-slate-600 hover:text-slate-900 text-sm font-medium px-4 py-2.5">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Preview on site
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    document.addEventListener('click', function (e) {
        const add = e.target.closest('[data-repeater-add]');
        if (add) {
            const wrap = add.closest('[data-repeater]');
            const list = wrap.querySelector('[data-repeater-list]');
            const tpl = wrap.querySelector('[data-repeater-template]');
            list.appendChild(tpl.content.cloneNode(true));
            return;
        }
        const rem = e.target.closest('[data-repeater-remove]');
        if (rem) {
            const list = rem.closest('[data-repeater-list]');
            const row = rem.closest('.repeater-row');
            if (list.querySelectorAll('.repeater-row').length > 1) { row.remove(); }
            else { row.querySelectorAll('input, textarea').forEach(el => el.value = ''); }
        }
    });
</script>
@endpush
