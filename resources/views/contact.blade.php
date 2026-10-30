<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us · Cotton Galary</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/banners/fav.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="antialiased bg-white">

    <x-site-navbar />

    @php
        $cIntro = $contact ? $contact->intro : 'Have a question or a project in mind? We would love to hear from you.';
        $cAddress = $contact?->address;
        $cPhone = $contact?->phone;
        $cEmail = $contact?->email;
        $cHours = $contact?->hours;
        $cMap = $contact?->map_embed;
        $mapSrc = $cMap ?: 'https://maps.google.com/maps?q=Dhaka%2C%20Bangladesh&z=12&output=embed';
    @endphp

    {{-- Header --}}
    <section class="relative bg-[#1e395f] pt-28 pb-14 md:pt-32 md:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.06]" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 22px 22px;"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white tracking-tight mb-4">Contact Us</h1>
            <p class="text-slate-300 max-w-2xl mx-auto leading-relaxed">{{ $cIntro }}</p>
        </div>
    </section>

    <section id="contact" class="bg-white pt-20 md:pt-24 pb-12 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">

                {{-- Left: info --}}
                <div>
                    <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">Get in Touch</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-4">We'd love to hear from you</h2>
                    <p class="text-slate-600 leading-relaxed mb-8">{{ $cIntro }}</p>

                    <div class="space-y-5">
                        @if ($cAddress)
                            <div class="flex items-start gap-4">
                                <span class="h-11 w-11 rounded-xl bg-[#be9b62]/10 text-[#a07d3d] grid place-items-center flex-shrink-0"><i class="fa-solid fa-location-dot"></i></span>
                                <div><div class="text-sm font-semibold text-slate-900">Address</div><div class="text-slate-600">{{ $cAddress }}</div></div>
                            </div>
                        @endif
                        @if ($cPhone)
                            <div class="flex items-start gap-4">
                                <span class="h-11 w-11 rounded-xl bg-[#be9b62]/10 text-[#a07d3d] grid place-items-center flex-shrink-0"><i class="fa-solid fa-phone"></i></span>
                                <div><div class="text-sm font-semibold text-slate-900">Phone</div><a href="tel:{{ preg_replace('/[^0-9+]/', '', $cPhone) }}" class="text-slate-600 hover:text-[#a07d3d]">{{ $cPhone }}</a></div>
                            </div>
                        @endif
                        @if ($cEmail)
                            <div class="flex items-start gap-4">
                                <span class="h-11 w-11 rounded-xl bg-[#be9b62]/10 text-[#a07d3d] grid place-items-center flex-shrink-0"><i class="fa-solid fa-envelope"></i></span>
                                <div><div class="text-sm font-semibold text-slate-900">Email</div><a href="mailto:{{ $cEmail }}" class="text-slate-600 hover:text-[#a07d3d]">{{ $cEmail }}</a></div>
                            </div>
                        @endif
                        @if ($cHours)
                            <div class="flex items-start gap-4">
                                <span class="h-11 w-11 rounded-xl bg-[#be9b62]/10 text-[#a07d3d] grid place-items-center flex-shrink-0"><i class="fa-solid fa-clock"></i></span>
                                <div><div class="text-sm font-semibold text-slate-900">Business Hours</div><div class="text-slate-600">{{ $cHours }}</div></div>
                            </div>
                        @endif
                    </div>

                </div>

                {{-- Right: form --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 md:p-8 shadow-[0_8px_28px_-20px_rgba(30,57,95,0.15)]">
                    <h3 class="text-xl font-bold text-slate-900 mb-1">Send us a message</h3>
                    <p class="text-sm text-slate-500 mb-6">We usually reply within one business day.</p>

                    @if (session('contact_status'))
                        <div class="mb-5 flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl px-4 py-3 text-sm">
                            <i class="fa-solid fa-circle-check mt-0.5"></i>
                            <span>{{ session('contact_status') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-5 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
                            <div class="font-semibold mb-1"><i class="fa-solid fa-triangle-exclamation mr-1"></i>Please check the form:</div>
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
                        @csrf
                        {{-- Honeypot (hidden from humans) --}}
                        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Name <span class="text-[#be9b62]">*</span></label>
                                <div class="relative">
                                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"><i class="fa-solid fa-user text-sm"></i></span>
                                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Your name"
                                           class="w-full rounded-xl border bg-slate-50/60 pl-10 pr-4 py-3 text-sm outline-none transition focus:bg-white focus:ring-4 focus:ring-[#1e395f]/10 focus:border-[#1e395f] @error('name') border-red-400 @else border-slate-200 @enderror">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Email <span class="text-[#be9b62]">*</span></label>
                                <div class="relative">
                                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"><i class="fa-solid fa-envelope text-sm"></i></span>
                                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@email.com"
                                           class="w-full rounded-xl border bg-slate-50/60 pl-10 pr-4 py-3 text-sm outline-none transition focus:bg-white focus:ring-4 focus:ring-[#1e395f]/10 focus:border-[#1e395f] @error('email') border-red-400 @else border-slate-200 @enderror">
                                </div>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Phone</label>
                                <div class="relative">
                                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"><i class="fa-solid fa-phone text-sm"></i></span>
                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Optional"
                                           class="w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-10 pr-4 py-3 text-sm outline-none transition focus:bg-white focus:ring-4 focus:ring-[#1e395f]/10 focus:border-[#1e395f]">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Subject</label>
                                <div class="relative">
                                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"><i class="fa-solid fa-tag text-sm"></i></span>
                                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Optional"
                                           class="w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-10 pr-4 py-3 text-sm outline-none transition focus:bg-white focus:ring-4 focus:ring-[#1e395f]/10 focus:border-[#1e395f]">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Message <span class="text-[#be9b62]">*</span></label>
                            <textarea name="message" rows="5" required placeholder="How can we help you?"
                                      class="w-full rounded-xl border bg-slate-50/60 px-4 py-3 text-sm outline-none transition focus:bg-white focus:ring-4 focus:ring-[#1e395f]/10 focus:border-[#1e395f] @error('message') border-red-400 @else border-slate-200 @enderror">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="inline-flex items-center justify-center gap-2 w-full bg-[#1e395f] hover:bg-[#16304a] text-white font-semibold px-6 py-4 rounded-xl transition-colors shadow-lg shadow-[#1e395f]/20">
                            <i class="fa-solid fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    {{-- Map --}}
    <section class="bg-white pb-16 md:pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-2xl overflow-hidden shadow-xl ring-1 ring-slate-900/5">
                <iframe src="{{ $mapSrc }}" width="100%" height="460" style="border:0; display:block;"
                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        title="Our location" class="w-full grayscale-[0.25]"></iframe>

                @if ($cAddress || $cPhone)
                    <div class="absolute top-5 left-5 right-5 sm:right-auto sm:max-w-xs bg-white/95 backdrop-blur rounded-xl shadow-lg p-4">
                        <div class="flex items-start gap-3">
                            <span class="h-10 w-10 rounded-lg bg-[#1e395f] text-[#e2c88a] grid place-items-center flex-shrink-0"><i class="fa-solid fa-location-dot"></i></span>
                            <div class="min-w-0">
                                <div class="font-bold text-slate-900 text-sm">Cotton Galary</div>
                                @if ($cAddress)<div class="text-xs text-slate-500 mt-0.5">{{ $cAddress }}</div>@endif
                                @if ($cPhone)<div class="text-xs text-[#a07d3d] font-semibold mt-1"><i class="fa-solid fa-phone mr-1"></i>{{ $cPhone }}</div>@endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-site-footer />
</body>
</html>
