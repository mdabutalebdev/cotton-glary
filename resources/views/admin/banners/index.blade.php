@extends('layouts.admin')

@section('title', 'Hero Banners')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <p class="text-slate-500 text-sm">Manage the content shown in the homepage hero section.</p>
        </div>
        <a href="{{ route('admin.banners.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors shadow-sm">
            <i class="fa-solid fa-plus"></i> New Banner
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-left text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-semibold">Banner</th>
                        <th class="px-5 py-3 font-semibold">Stats</th>
                        <th class="px-5 py-3 font-semibold">Status</th>
                        <th class="px-5 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($banners as $banner)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            {{-- Banner preview + title --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="h-14 w-24 rounded-lg overflow-hidden flex-shrink-0 border border-slate-200
                                                {{ $banner->background_image ? '' : 'bg-gradient-to-br from-amber-100 via-slate-50 to-teal-200' }}">
                                        @if ($banner->background_image)
                                            <img src="{{ $banner->backgroundUrl() }}" alt="" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        @if ($banner->badge_text)
                                            <span class="inline-block text-[11px] font-semibold text-emerald-700 bg-emerald-50 rounded-full px-2 py-0.5 mb-1">
                                                {{ $banner->badge_text }}
                                            </span>
                                        @endif
                                        <div class="font-semibold text-slate-900 truncate max-w-xs">{{ $banner->title }}</div>
                                        <div class="text-xs text-slate-400 mt-0.5">Order: {{ $banner->sort_order }}</div>
                                    </div>
                                </div>
                            </td>

                            {{-- Stats count --}}
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-1.5 text-slate-600">
                                    <i class="fa-solid fa-chart-simple text-slate-400"></i>
                                    {{ count($banner->stats ?? []) }} stat{{ count($banner->stats ?? []) === 1 ? '' : 's' }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-4">
                                @if ($banner->is_active)
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full px-2.5 py-1">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Live
                                    </span>
                                @else
                                    <form method="POST" action="{{ route('admin.banners.activate', $banner) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-emerald-700 bg-slate-50 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-200 rounded-full px-2.5 py-1 transition-colors">
                                            <i class="fa-regular fa-circle"></i> Set live
                                        </button>
                                    </form>
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.banners.edit', $banner) }}"
                                       class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-emerald-700 border border-slate-200 hover:border-emerald-300 rounded-lg px-3 py-2 transition-colors">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.banners.destroy', $banner) }}"
                                          onsubmit="return confirm('Delete this banner? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-red-600 border border-slate-200 hover:border-red-300 rounded-lg px-3 py-2 transition-colors">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-16 text-center">
                                <div class="text-slate-300 text-5xl mb-3"><i class="fa-regular fa-images"></i></div>
                                <p class="text-slate-500 font-medium">No banners yet.</p>
                                <p class="text-slate-400 text-sm mb-4">Create your first hero banner to get started.</p>
                                <a href="{{ route('admin.banners.create') }}"
                                   class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
                                    <i class="fa-solid fa-plus"></i> New Banner
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($banners->isNotEmpty())
        <p class="text-xs text-slate-400 mt-4">
            <i class="fa-solid fa-circle-info mr-1"></i>
            Only the banner marked <span class="font-semibold text-emerald-600">Live</span> is shown on the homepage.
        </p>
    @endif
@endsection
