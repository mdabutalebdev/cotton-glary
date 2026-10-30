@extends('layouts.admin')

@section('title', 'Message')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Back to messages
        </a>
    </div>

    <div class="max-w-3xl bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100 flex items-start justify-between gap-4">
            <div>
                <div class="text-lg font-bold text-slate-900">{{ $message->name }}</div>
                <div class="text-sm text-slate-500">
                    <a href="mailto:{{ $message->email }}" class="hover:text-emerald-700">{{ $message->email }}</a>
                    @if ($message->phone) · {{ $message->phone }} @endif
                </div>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">{{ $message->created_at->format('d M Y, g:i A') }}</span>
        </div>

        <div class="px-6 py-5 space-y-4">
            @if ($message->subject)
                <div>
                    <div class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-1">Subject</div>
                    <div class="text-slate-800 font-medium">{{ $message->subject }}</div>
                </div>
            @endif
            <div>
                <div class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-1">Message</div>
                <p class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $message->message }}</p>
            </div>
        </div>

        <div class="px-6 py-4 border-t border-slate-100 flex items-center gap-3">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject ?? 'Your enquiry') }}" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
                <i class="fa-solid fa-reply"></i> Reply by email
            </a>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-2 text-slate-600 hover:text-red-600 border border-slate-200 hover:border-red-300 text-sm font-medium px-4 py-2.5 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
@endsection
