@extends('layouts.admin')

@section('title', 'New Banner')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.banners.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Back to banners
        </a>
    </div>

    @include('admin.banners._form', [
        'action' => route('admin.banners.store'),
        'method' => 'POST',
        'submitLabel' => 'Create Banner',
    ])
@endsection
