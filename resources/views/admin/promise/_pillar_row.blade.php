<div class="repeater-row bg-slate-50 border border-slate-200 rounded-lg p-4 space-y-3">
    <div class="flex items-center justify-between">
        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Pillar</span>
        <button type="button" data-repeater-remove class="text-slate-400 hover:text-red-600" title="Remove"><i class="fa-solid fa-circle-xmark"></i></button>
    </div>
    <div class="grid sm:grid-cols-3 gap-3">
        <input type="text" name="pillars[icon][]" value="{{ $row['icon'] ?? '' }}" placeholder="Icon e.g. fa-award"
               class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
        <input type="text" name="pillars[title][]" value="{{ $row['title'] ?? '' }}" placeholder="Title e.g. Quality"
               class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
        <input type="text" name="pillars[subtitle][]" value="{{ $row['subtitle'] ?? '' }}" placeholder="Subtitle e.g. Product Promise"
               class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
    </div>
    <textarea name="pillars[description][]" rows="2" placeholder="Description"
              class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ $row['description'] ?? '' }}</textarea>
</div>
