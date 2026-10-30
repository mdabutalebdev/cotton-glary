@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
    <p class="text-slate-500 text-sm mb-6">Messages submitted through the Contact Us form.</p>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-left text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-semibold">From</th>
                        <th class="px-5 py-3 font-semibold">Subject</th>
                        <th class="px-5 py-3 font-semibold">Received</th>
                        <th class="px-5 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($messages as $message)
                        <tr class="hover:bg-slate-50/70 transition-colors {{ $message->is_read ? '' : 'bg-[#be9b62]/5' }}">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    @unless ($message->is_read)
                                        <span class="h-2 w-2 rounded-full bg-[#be9b62] flex-shrink-0" title="Unread"></span>
                                    @endunless
                                    <div>
                                        <div class="font-semibold text-slate-900">{{ $message->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $message->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $message->subject ?: '—' }}</td>
                            <td class="px-5 py-4 text-slate-500 text-xs">{{ $message->created_at->diffForHumans() }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.messages.show', $message) }}" class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-emerald-700 border border-slate-200 hover:border-emerald-300 rounded-lg px-3 py-2 transition-colors"><i class="fa-solid fa-eye"></i> View</a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-red-600 border border-slate-200 hover:border-red-300 rounded-lg px-3 py-2 transition-colors"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-16 text-center">
                                <div class="text-slate-300 text-5xl mb-3"><i class="fa-regular fa-envelope"></i></div>
                                <p class="text-slate-500 font-medium">No messages yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">{{ $messages->links() }}</div>
@endsection
