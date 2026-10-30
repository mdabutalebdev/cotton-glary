@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-900">Welcome back, {{ auth()->user()->name }} 👋</h2>
        <p class="text-slate-500 text-sm">Here's a quick overview of your site content.</p>
    </div>

    {{-- Stat cards --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-slate-900">{{ $totalBanners }}</div>
                    <div class="text-sm text-slate-500 mt-1">Hero Banners</div>
                </div>
                <span class="h-12 w-12 grid place-items-center rounded-xl bg-emerald-50 text-emerald-600 text-xl">
                    <i class="fa-solid fa-images"></i>
                </span>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <div class="text-sm font-semibold text-slate-900 truncate">
                        {{ $activeBanner?->title ?? 'None' }}
                    </div>
                    <div class="text-sm text-slate-500 mt-1">Live Banner</div>
                </div>
                <span class="h-12 w-12 grid place-items-center rounded-xl bg-amber-50 text-amber-500 text-xl">
                    <i class="fa-solid fa-bolt"></i>
                </span>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-slate-900">{{ $totalUsers }}</div>
                    <div class="text-sm text-slate-500 mt-1">Registered Users</div>
                </div>
                <span class="h-12 w-12 grid place-items-center rounded-xl bg-sky-50 text-sky-600 text-xl">
                    <i class="fa-solid fa-users"></i>
                </span>
            </div>
        </div>
    </div>

    {{-- Quick actions --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <h3 class="text-sm font-bold text-slate-900 mb-4">Quick actions</h3>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.banners.index') }}"
               class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
                <i class="fa-solid fa-images"></i> Manage Hero Banners
            </a>
            <a href="{{ route('admin.banners.create') }}"
               class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
                <i class="fa-solid fa-plus"></i> New Banner
            </a>
            <a href="{{ route('home') }}" target="_blank"
               class="inline-flex items-center gap-2 border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Website
            </a>
        </div>
    </div>
@endsection
