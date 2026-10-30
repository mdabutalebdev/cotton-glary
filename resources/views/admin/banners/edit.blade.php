@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.banners.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Back to banners
        </a>
        @if ($banner->is_active)
            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full px-2.5 py-1">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Currently live
            </span>
        @endif
    </div>

    @include('admin.banners._form', [
        'action' => route('admin.banners.update', $banner),
        'method' => 'PUT',
        'submitLabel' => 'Update Banner',
    ])
@endsection
