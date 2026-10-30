<div class="repeater-row flex gap-3 items-center">
    <input type="text" name="progress_stats[value][]" value="{{ $row['value'] ?? '' }}" placeholder="Value e.g. 120+"
           class="w-32 flex-shrink-0 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
    <input type="text" name="progress_stats[label][]" value="{{ $row['label'] ?? '' }}" placeholder="Label e.g. Partner Factories"
           class="flex-1 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
    <button type="button" data-repeater-remove class="text-slate-400 hover:text-red-600" title="Remove"><i class="fa-solid fa-circle-xmark"></i></button>
</div>
