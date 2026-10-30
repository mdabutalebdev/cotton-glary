@php
    $company = [
        'Home' => route('home'),
        'Product & Service' => route('products'),
        'Our Promise' => route('promise'),
        'About Us' => route('about'),
        'Contact Us' => route('contact'),
    ];
@endphp

<footer class="bg-[#faf8f3] text-slate-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid gap-10 md:grid-cols-12">

            {{-- Brand --}}
            <div class="md:col-span-4">
                <a href="{{ route('home') }}" class="inline-flex items-center h-20 overflow-hidden">
                    <img src="{{ asset('uploads/banners/logo.png') }}" alt="Cotton Galary" class="h-28 w-auto max-w-none mix-blend-multiply">
                </a>
                <p class="mt-4 text-sm leading-relaxed text-slate-500 max-w-xs">
                    Your global partner for premium, sustainable cotton apparel — crafted with compliance excellence across 100+ certified partner factories.
                </p>
                <div class="flex items-center gap-3 mt-6">
                    @foreach (['facebook-f', 'linkedin-in', 'instagram', 'x-twitter'] as $icon)
                        <a href="#" aria-label="Social link"
                           class="h-9 w-9 grid place-items-center rounded-full border border-slate-200 text-slate-500 hover:bg-[#be9b62] hover:border-[#be9b62] hover:text-white transition-colors">
                            <i class="fa-brands fa-{{ $icon }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Company links --}}
            <div class="md:col-span-3">
                <h4 class="text-sm font-bold text-slate-800 mb-4 tracking-wide">Company</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach ($company as $label => $url)
                        <li><a href="{{ $url }}" class="text-slate-500 hover:text-[#a07d3d] transition-colors">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Standards --}}
            <div class="md:col-span-2">
                <h4 class="text-sm font-bold text-slate-800 mb-4 tracking-wide">Standards</h4>
                <ul class="space-y-2.5 text-sm text-slate-500">
                    <li>ISO 9001:2015</li>
                    <li>GOTS</li>
                    <li>OEKO-TEX®</li>
                    <li>EcoVadis</li>
                    <li>Higg Index</li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="md:col-span-3">
                <h4 class="text-sm font-bold text-slate-800 mb-4 tracking-wide">Get in Touch</h4>
                <ul class="space-y-3 text-sm text-slate-500">
                    <li class="flex items-start gap-3"><i class="fa-solid fa-location-dot mt-1 text-[#be9b62]"></i><span>Dhaka, Bangladesh</span></li>
                    <li class="flex items-center gap-3"><i class="fa-solid fa-envelope text-[#be9b62]"></i><span>belal@cottonglary.com</span></li>
                    <li class="flex items-center gap-3"><i class="fa-solid fa-phone text-[#be9b62]"></i><span>+880 1772-500055</span></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="border-t border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400">
            <span>© {{ date('Y') }} Cotton Galary. All rights reserved.</span>
            <span>Created by <a href="https://www.extrainweb.com/" target="_blank" rel="noopener noreferrer" class="font-semibold text-[#a07d3d] hover:text-[#be9b62] transition-colors">Extrain Web</a></span>
        </div>
    </div>
</footer>
