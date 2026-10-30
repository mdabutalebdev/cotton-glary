<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us · Cotton Galary</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/banners/fav.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="antialiased bg-white">

    <x-site-navbar />

    {{-- Page header --}}
    <section class="relative bg-[#1e395f] pt-28 pb-14 md:pt-32 md:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.06]" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 22px 22px;"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white tracking-tight mb-4">About Us</h1>
            <p class="text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Get to know Cotton Galary — our story, our promise, and the people behind our premium cotton apparel.
            </p>
        </div>
    </section>

    {{-- About company (same block as the homepage) --}}
    <x-about-section :about="$about" />

    {{-- Owner / founder profile --}}
    <x-owner-section :owner="$owner" />

    {{-- Progress --}}
    @php
        $aboutProgressTitle = $about?->progress_title ?: 'Our Progress So Far';
        $aboutProgressStats = ($about && ! empty($about->progress_stats)) ? $about->progress_stats : [
            ['value' => '120+', 'label' => 'Partner Factories'],
            ['value' => '25+', 'label' => 'Countries Served'],
            ['value' => '800+', 'label' => 'Skilled Team Members'],
            ['value' => '15', 'label' => 'Years of Excellence'],
        ];
    @endphp
    @if (! empty($aboutProgressStats))
        <section class="bg-white py-20 md:py-24 border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">Our Progress</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">{{ $aboutProgressTitle }}</h2>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach ($aboutProgressStats as $s)
                        <div class="bg-slate-50 rounded-2xl border border-slate-100 p-6 md:p-7 text-center">
                            <div class="text-3xl md:text-4xl font-bold text-[#1e395f]">{{ $s['value'] ?? '' }}</div>
                            <div class="text-slate-500 text-sm mt-2 leading-snug">{{ $s['label'] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Certifications --}}
    @if ($certifications->isNotEmpty())
        <section class="cg-slider-wrap bg-[#1e395f] py-20 md:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between gap-4 mb-8">
                    <div>
                        <span class="inline-block text-[#e2c88a] bg-white/10 ring-1 ring-white/15 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-4">Certifications</span>
                        <h2 class="text-2xl md:text-4xl font-bold text-white tracking-tight">Certifications &amp; Standards</h2>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <button type="button" class="cg-slider-prev h-10 w-10 grid place-items-center rounded-full border border-white/25 text-white hover:bg-white hover:text-[#1e395f] transition-colors" aria-label="Previous"><i class="fa-solid fa-chevron-left text-sm"></i></button>
                        <button type="button" class="cg-slider-next h-10 w-10 grid place-items-center rounded-full border border-white/25 text-white hover:bg-white hover:text-[#1e395f] transition-colors" aria-label="Next"><i class="fa-solid fa-chevron-right text-sm"></i></button>
                    </div>
                </div>
            </div>

            <div class="cg-slider flex gap-5 overflow-x-auto snap-x scroll-smooth pb-3 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @foreach ($certifications as $cert)
                    <div class="snap-start shrink-0 w-72 bg-white/5 border border-white/10 rounded-2xl p-6 text-center backdrop-blur">
                        <div class="h-20 flex items-center justify-center mb-5">
                            @if ($cert->imageUrl())
                                <img src="{{ $cert->imageUrl() }}" alt="{{ $cert->name }}" loading="lazy" class="max-h-16 max-w-[75%] object-contain">
                            @else
                                <i class="fa-solid fa-certificate text-5xl text-[#e2c88a]"></i>
                            @endif
                        </div>
                        <h3 class="font-bold text-white mb-2">{{ $cert->name }}</h3>
                        @if ($cert->description)
                            <p class="text-sm text-slate-300 leading-relaxed line-clamp-4">{{ $cert->description }}</p>
                        @endif
                        @if ($cert->link)
                            <a href="{{ $cert->link }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#e2c88a] hover:text-white mt-4 transition-colors">Read More <i class="fa-solid fa-arrow-right text-xs"></i></a>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <x-site-footer />

    {{-- Slider arrow navigation --}}
    <script>
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.cg-slider-prev, .cg-slider-next');
            if (!btn) return;
            const wrap = btn.closest('.cg-slider-wrap');
            const slider = wrap && wrap.querySelector('.cg-slider');
            if (!slider) return;
            const amount = Math.max(slider.clientWidth * 0.8, 260);
            slider.scrollBy({ left: btn.classList.contains('cg-slider-prev') ? -amount : amount, behavior: 'smooth' });
        });
    </script>
</body>
</html>
