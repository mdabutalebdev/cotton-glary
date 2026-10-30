@props(['about' => null])

@php
    $aboutEyebrow = $about ? $about->eyebrow : 'About Cotton Galary';
    $aboutTitle   = $about ? $about->title : 'Your Trusted Partner in Premium Cotton Apparel';
    $aboutP1      = $about ? $about->paragraph_1 : 'Cotton Galary is a global apparel development and sourcing partner, delivering sustainable, high-quality garments to leading brands across 25 countries.';
    $aboutP2      = $about ? $about->paragraph_2 : 'With 800+ skilled team members and 120+ fully compliant partner factories, we combine craftsmanship with responsible manufacturing.';
    $aboutBtnText = $about ? $about->button_text : 'About Us';
    $aboutBtnLink = ($about ? $about->button_link : '#') ?: '#';
    $aboutImg     = $about?->imageUrl();
@endphp

<section class="bg-white py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Left: copy -->
            <div>
                @if (! empty($aboutEyebrow))
                    <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">
                        {{ $aboutEyebrow }}
                    </span>
                @endif
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight leading-tight mb-6">{{ $aboutTitle }}</h2>
                @if (! empty($aboutP1))
                    <p class="text-slate-600 leading-relaxed mb-4">{{ $aboutP1 }}</p>
                @endif
                @if (! empty($aboutP2))
                    <p class="text-slate-600 leading-relaxed mb-8">{{ $aboutP2 }}</p>
                @endif
                @if (! empty($aboutBtnText))
                    <a href="{{ $aboutBtnLink }}" class="inline-flex items-center gap-2 bg-[#1e395f] hover:bg-[#16304a] text-white font-semibold px-7 py-3.5 rounded-full transition-colors shadow-sm">
                        {{ $aboutBtnText }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
                @endif
            </div>

            <!-- Right: image -->
            <div>
                @if ($aboutImg)
                    <img src="{{ $aboutImg }}" alt="{{ $aboutTitle }}" class="w-full aspect-[4/3] object-contain rounded-2xl">
                @else
                    <div class="w-full aspect-[4/3] rounded-2xl bg-gradient-to-br from-[#1e395f] to-[#0b1a30] grid place-items-center">
                        <i class="fa-solid fa-industry text-white/15 text-7xl"></i>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
