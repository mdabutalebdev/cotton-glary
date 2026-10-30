<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cotton Galary - Premium Garments</title>
        <link rel="icon" type="image/png" href="{{ asset('uploads/banners/fav.png') }}">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-50">
        
        <!-- Navbar -->
        <x-site-navbar />

        <!-- Hero Section -->
        @php
            $badge         = $banner ? $banner->badge_text            : 'Sustainable Apparel';
            $title         = $banner ? $banner->title                 : 'Your Global Partner for Premium Cotton Apparel';
            $highlight     = $banner ? $banner->highlight_text        : 'Premium Cotton';
            $desc          = $banner ? $banner->description           : 'We offer sustainable garment product development and specialised global sourcing, combined with compliance excellence and intuitive customer service.';
            $subDesc       = $banner ? $banner->sub_description       : 'We bring newness and innovation to every thread — an extensive multi-category range, manufactured in over 100 fully compliant partner factories.';
            $primaryText   = $banner ? $banner->primary_button_text   : 'Explore Collections';
            $primaryLink   = ($banner ? $banner->primary_button_link : '#') ?: '#';
            $secondaryText = $banner ? $banner->secondary_button_text : 'Contact Sales';
            $secondaryLink = ($banner ? $banner->secondary_button_link : '#') ?: '#';
            $bgImage       = $banner?->backgroundUrl();
            $stats = ($banner && ! empty($banner->stats)) ? $banner->stats : [
                ['number' => '120', 'suffix' => '+', 'label' => 'Partner Factories'],
                ['number' => '25',  'suffix' => '',  'label' => 'Countries Served'],
                ['number' => '800', 'suffix' => '+', 'label' => 'Team Members'],
                ['number' => '15',  'suffix' => '',  'label' => 'Years of Excellence'],
            ];

            // Colours adapt when a background image is used (light text on a dark overlay).
            $hasImage         = ! empty($bgImage);
            $badgeClasses     = $hasImage ? 'text-[#e6cf9a] bg-white/10 ring-1 ring-white/20' : 'text-[#a07d3d] bg-white/70';
            $headingClass     = $hasImage ? 'text-white' : 'text-slate-900';
            $descClass        = $hasImage ? 'text-slate-100' : 'text-slate-700';
            $subDescClass     = $hasImage ? 'text-slate-200/90' : 'text-slate-600';
            $highlightClass   = $hasImage ? 'text-[#e2c88a]' : 'text-[#a07d3d]';
            $primaryBtnClass  = 'text-[#1e395f] bg-[#be9b62] hover:bg-[#a8864c]';
            $secondaryBtnClass = $hasImage ? 'text-white bg-white/15 hover:bg-white/25 border border-white/30 backdrop-blur' : 'text-slate-900 bg-white/80 hover:bg-white border border-slate-200';
            $statCardClass    = $hasImage ? 'bg-white/95 border-white/60' : 'bg-white/60 border-white/70';
            $statLabelClass   = $hasImage ? 'text-slate-500' : 'text-slate-600';

            // Wrap the highlighted words in the title with a green span.
            $titleHtml = e($title);
            if (! empty($highlight)) {
                $h = e($highlight);
                $titleHtml = str_replace($h, '<span class="'.$highlightClass.'">'.$h.'</span>', $titleHtml);
            }
        @endphp
        <section class="relative overflow-hidden pt-20">
            @if ($bgImage)
                <!-- Custom background image -->
                <div class="absolute inset-0 -z-20 bg-cover bg-center" style="background-image: url('{{ $bgImage }}');"></div>
                <!-- Navy gradient for legibility (heavier on the text side, lighter over the image) -->
                <div class="absolute inset-0 -z-10 bg-gradient-to-r from-[#0b1a30]/92 via-[#132845]/72 to-[#1e395f]/35"></div>
                <!-- Depth from the bottom -->
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#0b1a30]/55 via-transparent to-transparent"></div>
            @else
                <!-- Gradient background -->
                <div class="absolute inset-0 -z-20 bg-gradient-to-br from-amber-100 via-slate-50 to-teal-200"></div>
                <!-- Soft glow blobs -->
                <div class="absolute -top-32 -left-24 w-[28rem] h-[28rem] rounded-full bg-amber-300/40 blur-3xl -z-10"></div>
                <div class="absolute -bottom-24 -right-16 w-[32rem] h-[32rem] rounded-full bg-teal-400/30 blur-3xl -z-10"></div>
                <!-- Subtle dot texture -->
                <div class="absolute inset-0 -z-10 opacity-[0.12]" style="background-image: radial-gradient(circle, #0f766e 1px, transparent 1px); background-size: 26px 26px;"></div>
            @endif

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12 md:pt-24 md:pb-16">
                <div class="grid lg:grid-cols-2 gap-14 items-center">

                    <!-- Left: copy -->
                    <div>
                        @if (! empty($badge))
                            <span class="inline-flex items-center gap-2 {{ $badgeClasses }} backdrop-blur px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide mb-6 shadow-sm">
                                <i class="fa-solid fa-leaf"></i> {{ $badge }}
                            </span>
                        @endif
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight {{ $headingClass }} leading-[1.1] mb-6 {{ $hasImage ? 'drop-shadow-sm' : '' }}">
                            {!! $titleHtml !!}
                        </h1>
                        @if (! empty($desc))
                            <p class="text-lg {{ $descClass }} leading-relaxed mb-4 max-w-xl">
                                {{ $desc }}
                            </p>
                        @endif
                        @if (! empty($subDesc))
                            <p class="text-base {{ $subDescClass }} leading-relaxed mb-8 max-w-xl">
                                {{ $subDesc }}
                            </p>
                        @endif
                        <div class="flex flex-col sm:flex-row gap-4">
                            @if (! empty($primaryText))
                                <a href="{{ $primaryLink }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-full {{ $primaryBtnClass }} text-base font-medium shadow-lg transition-colors">
                                    {{ $primaryText }}
                                </a>
                            @endif
                            @if (! empty($secondaryText))
                                <a href="{{ $secondaryLink }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-full {{ $secondaryBtnClass }} text-base font-medium shadow-sm transition-colors">
                                    {{ $secondaryText }} <i class="fa-solid fa-arrow-right ml-2"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Right: stat cards -->
                    @if (! empty($stats))
                        <div class="grid grid-cols-2 gap-4 sm:gap-5">
                            @foreach ($stats as $stat)
                                <div class="{{ $statCardClass }} backdrop-blur-md border rounded-2xl p-6 md:p-8 shadow-lg">
                                    <div class="text-4xl md:text-5xl font-bold text-slate-900" data-count="{{ $stat['number'] ?? '' }}" data-suffix="{{ $stat['suffix'] ?? '' }}">{{ $stat['number'] ?? '' }}{{ $stat['suffix'] ?? '' }}</div>
                                    <div class="{{ $statLabelClass }} mt-1.5">{{ $stat['label'] ?? '' }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </section>

        <!-- About Company Section -->
        <x-about-section :about="$about" />

        <!-- Our Services (product range) -->
        <x-services-section />

        <!-- How We Work (process) -->
        <x-how-we-work />

        <!-- Certifications marquee (reusable component) -->
        <x-logo-marquee duration="40s" />

        <!-- Footer -->
        <x-site-footer />

        <!-- Count-up animation for hero stats -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const animate = function (el) {
                    const target = parseFloat(el.dataset.count);
                    const suffix = el.dataset.suffix || '';
                    // Non-numeric values (e.g. text) are shown as-is, no count animation.
                    if (isNaN(target)) return;
                    const duration = 1400;
                    let startTime = null;
                    const step = function (now) {
                        if (!startTime) startTime = now;
                        const p = Math.min((now - startTime) / duration, 1);
                        const eased = 1 - Math.pow(1 - p, 3);
                        el.textContent = Math.round(target * eased) + suffix;
                        if (p < 1) requestAnimationFrame(step);
                    };
                    requestAnimationFrame(step);
                };

                const counters = document.querySelectorAll('[data-count]');
                if ('IntersectionObserver' in window) {
                    const io = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                                animate(entry.target);
                                io.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.4 });
                    counters.forEach(function (c) { io.observe(c); });
                } else {
                    counters.forEach(animate);
                }
            });
        </script>
    </body>
</html>
