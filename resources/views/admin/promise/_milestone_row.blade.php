<div class="repeater-row flex gap-3 items-start">
    <input type="text" name="milestones[year][]" value="{{ $row['year'] ?? '' }}" placeholder="Year"
           class="w-24 flex-shrink-0 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
    <textarea name="milestones[description][]" rows="1" placeholder="What happened"
              class="flex-1 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ $row['description'] ?? '' }}</textarea>
    <button type="button" data-repeater-remove class="mt-2 text-slate-400 hover:text-red-600" title="Remove"><i class="fa-solid fa-circle-xmark"></i></button>
</div>
