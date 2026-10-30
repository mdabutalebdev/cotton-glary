@extends('layouts.admin')

@section('title', 'Contact Info')

@section('content')
    <p class="text-slate-500 text-sm mb-6">The contact details shown on the public Contact Us page.</p>

    <form method="POST" action="{{ route('admin.contact.update') }}" class="space-y-6 max-w-3xl">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
            <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-address-book text-emerald-600"></i> Details</h3>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Intro line</label>
                <textarea name="intro" rows="2" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">{{ old('intro', $contact->intro) }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Address</label>
                    <input type="text" name="address" value="{{ old('address', $contact->address) }}" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Business hours</label>
                    <input type="text" name="hours" value="{{ old('hours', $contact->hours) }}" placeholder="e.g. Sat – Thu, 9 AM – 6 PM" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Map embed URL</label>
                <input type="text" name="map_embed" value="{{ old('map_embed', $contact->map_embed) }}" placeholder="Google Maps embed src URL (optional)" class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none">
                <p class="text-xs text-slate-400 mt-1">In Google Maps → Share → Embed a map → copy only the <code>src="..."</code> URL. Leave blank for no map.</p>
            </div>
        </div>

        <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-3 rounded-lg transition-colors shadow-sm">
            <i class="fa-solid fa-floppy-disk"></i> Save Contact Info
        </button>
        <a href="{{ route('contact') }}" target="_blank" class="ml-2 inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 text-sm font-medium px-4 py-2.5">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> Preview
        </a>
    </form>
@endsection
