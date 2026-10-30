@extends('layouts.admin')

@section('title', 'Our Promise')

@php
    $pillarRows = ! empty($promise->pillars) ? $promise->pillars : [[]];
    $milestoneRows = ! empty($promise->milestones) ? $promise->milestones : [[]];
    $statRows = ! empty($promise->stats) ? $promise->stats : [[]];
@endphp

@section('content')
    <p class="text-slate-500 text-sm mb-6">The content shown on the public "Our Promise" page.</p>

    <form method="POST" action="{{ route('admin.promise.update') }}" class="space-y-6 max-w-4xl">
        @csrf
        @method('PUT')

        {{-- Intros --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
            <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-align-left text-emerald-600"></i> Values &amp; Vision</h3>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Our Values — intro</label>
                <textarea name="values_intro" rows="3" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('values_intro', $promise->values_intro) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Our Vision — intro</label>
                <textarea name="vision_intro" rows="2" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('vision_intro', $promise->vision_intro) }}</textarea>
            </div>
        </div>

        {{-- Pillars --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6" data-repeater>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-shapes text-emerald-600"></i> Vision Pillars</h3>
                <button type="button" data-repeater-add class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-lg px-3 py-1.5 transition-colors"><i class="fa-solid fa-plus"></i> Add pillar</button>
            </div>
            <p class="text-xs text-slate-400 mb-3">Icon uses a FontAwesome class, e.g. <code>fa-award</code>, <code>fa-leaf</code>, <code>fa-handshake</code>.</p>
            <div data-repeater-list class="space-y-3">
                @foreach ($pillarRows as $row)
                    @include('admin.promise._pillar_row')
                @endforeach
            </div>
            <template data-repeater-template>@include('admin.promise._pillar_row', ['row' => []])</template>
        </div>

        {{-- Milestones --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6" data-repeater>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-timeline text-emerald-600"></i> Milestones (timeline)</h3>
                <button type="button" data-repeater-add class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-lg px-3 py-1.5 transition-colors"><i class="fa-solid fa-plus"></i> Add milestone</button>
            </div>
            <div data-repeater-list class="space-y-3">
                @foreach ($milestoneRows as $row)
                    @include('admin.promise._milestone_row')
                @endforeach
            </div>
            <template data-repeater-template>@include('admin.promise._milestone_row', ['row' => []])</template>
        </div>

        {{-- Stats --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6" data-repeater>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-chart-simple text-emerald-600"></i> Progress Stats</h3>
                <button type="button" data-repeater-add class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-lg px-3 py-1.5 transition-colors"><i class="fa-solid fa-plus"></i> Add stat</button>
            </div>
            <div data-repeater-list class="space-y-3">
                @foreach ($statRows as $row)
                    @include('admin.promise._stat_row')
                @endforeach
            </div>
            <template data-repeater-template>@include('admin.promise._stat_row', ['row' => []])</template>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-3 rounded-lg transition-colors shadow-sm">
                <i class="fa-solid fa-floppy-disk"></i> Save Our Promise
            </button>
            <a href="{{ route('promise') }}" target="_blank" class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 text-sm font-medium px-4 py-2.5">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Preview on site
            </a>
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
            if (list.querySelectorAll('.repeater-row').length > 1) {
                row.remove();
            } else {
                row.querySelectorAll('input, textarea').forEach(el => el.value = '');
            }
        }
    });
</script>
@endpush
