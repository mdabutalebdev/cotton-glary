@extends('layouts.admin')

@section('title', 'Certifications')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <p class="text-slate-500 text-sm">Certifications shown on the About Us page.</p>
        <a href="{{ route('admin.certifications.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors shadow-sm">
            <i class="fa-solid fa-plus"></i> New Certification
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-left text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 font-semibold">Certification</th>
                        <th class="px-5 py-3 font-semibold">Description</th>
                        <th class="px-5 py-3 font-semibold">Status</th>
                        <th class="px-5 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($certifications as $certification)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-12 w-12 rounded-lg overflow-hidden flex-shrink-0 border border-slate-200 bg-slate-50 grid place-items-center p-1">
                                        @if ($certification->imageUrl())
                                            <img src="{{ $certification->imageUrl() }}" alt="" class="max-h-full max-w-full object-contain">
                                        @else
                                            <i class="fa-solid fa-certificate text-slate-300"></i>
                                        @endif
                                    </div>
                                    <div class="font-semibold text-slate-900">{{ $certification->name }}</div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-slate-500 max-w-md"><span class="line-clamp-2">{{ $certification->description }}</span></td>
                            <td class="px-5 py-4">
                                @if ($certification->is_active)
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full px-2.5 py-1"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active</span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 bg-slate-50 border border-slate-200 rounded-full px-2.5 py-1">Hidden</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.certifications.edit', $certification) }}" class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-600 hover:text-emerald-700 border border-slate-200 hover:border-emerald-300 rounded-lg px-3 py-2 transition-colors"><i class="fa-solid fa-pen"></i> Edit</a>
                                    <form method="POST" action="{{ route('admin.certifications.destroy', $certification) }}" onsubmit="return confirm('Delete this certification?');">
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
                                <div class="text-slate-300 text-5xl mb-3"><i class="fa-solid fa-certificate"></i></div>
                                <p class="text-slate-500 font-medium">No certifications yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
