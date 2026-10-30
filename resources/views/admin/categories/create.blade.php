@extends('layouts.admin')

@section('title', 'New Category')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Back to categories
        </a>
    </div>

    @include('admin.categories._form', [
        'action' => route('admin.categories.store'),
        'method' => 'POST',
        'submitLabel' => 'Create Category',
    ])
@endsection
