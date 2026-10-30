@extends('layouts.admin')

@section('title', 'New Certification')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.certifications.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Back to certifications
        </a>
    </div>

    @include('admin.certifications._form', [
        'action' => route('admin.certifications.store'),
        'method' => 'POST',
        'submitLabel' => 'Create Certification',
    ])
@endsection
