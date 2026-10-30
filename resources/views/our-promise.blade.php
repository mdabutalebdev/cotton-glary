<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Promise · Cotton Galary</title>
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
        $valuesIntro = $promise ? $promise->values_intro : 'Creating a positive impact has always been at the heart of Cotton Galary. From ethical sourcing to responsible manufacturing, our promise is simple — to deliver premium cotton apparel while caring for the people and the planet behind every garment.';
        $visionIntro = $promise ? $promise->vision_intro : 'Our vision is built on three commitments that guide everything we do.';
        $pillars = ($promise && ! empty($promise->pillars)) ? $promise->pillars : [
            ['icon' => 'fa-award', 'title' => 'Quality', 'subtitle' => 'Product Promise', 'description' => 'We take pride in every stitch — developing durable, comfortable and beautifully finished garments built to last.'],
            ['icon' => 'fa-leaf', 'title' => 'Responsibility', 'subtitle' => 'Planet Promise', 'description' => 'We work to reduce our environmental footprint through preferred sustainable fibres and responsible resource management.'],
            ['icon' => 'fa-handshake', 'title' => 'Partnership', 'subtitle' => 'People Promise', 'description' => 'We champion fair, safe and ethical workplaces hand in hand with our compliant partner factories.'],
        ];
        $milestones = ($promise && ! empty($promise->milestones)) ? $promise->milestones : [
            ['year' => '2010', 'description' => 'Cotton Galary is founded in Bangladesh.'],
            ['year' => '2017', 'description' => 'Expanded exports across international markets.'],
            ['year' => '2023', 'description' => 'Grew to 120+ partner factories across 25 countries.'],
        ];
        $pStats = ($promise && ! empty($promise->stats)) ? $promise->stats : [
            ['value' => '100%', 'label' => 'Compliant Partner Factories'],
            ['value' => '25+', 'label' => 'Countries Served'],
            ['value' => '120+', 'label' => 'Partner Factories'],
            ['value' => '15', 'label' => 'Years of Excellence'],
        ];
    @endphp

    {{-- Page header --}}
    <section class="relative bg-[#1e395f] pt-28 pb-14 md:pt-32 md:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.06]" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 22px 22px;"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white tracking-tight mb-4">Our Promise</h1>
            <p class="text-slate-300 max-w-2xl mx-auto leading-relaxed">
                The values, vision and commitments behind every Cotton Galary garment.
            </p>
        </div>
    </section>

    {{-- Our Values --}}
    <section class="bg-white py-20 md:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">Our Values</span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-6">Creating a positive impact, together</h2>
            <p class="text-lg text-slate-600 leading-relaxed">{{ $valuesIntro }}</p>
        </div>
    </section>

    {{-- Our Vision (pillars) --}}
    <section class="bg-slate-50 py-20 md:py-24 border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center mb-12">
                <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">Our Vision</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-4">What we promise</h2>
                <p class="text-slate-600 leading-relaxed">{{ $visionIntro }}</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($pillars as $p)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8 text-center hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="h-16 w-16 mx-auto rounded-2xl bg-[#be9b62]/10 text-[#a07d3d] grid place-items-center text-2xl mb-5">
                            <i class="fa-solid {{ $p['icon'] ?? 'fa-star' }}"></i>
                        </div>
                        @if (! empty($p['subtitle']))
                            <div class="text-[#a07d3d] font-semibold text-xs uppercase tracking-wider mb-1">{{ $p['subtitle'] }}</div>
                        @endif
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $p['title'] ?? '' }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $p['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Milestones --}}
    @if (! empty($milestones))
        <section class="bg-white py-20 md:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto text-center mb-12">
                    <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">Our Journey</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Milestones along the way</h2>
                </div>

                <div class="max-w-2xl mx-auto">
                    @foreach ($milestones as $m)
                        <div class="flex gap-5">
                            <div class="flex flex-col items-center">
                                <span class="h-4 w-4 rounded-full bg-[#be9b62] ring-4 ring-[#be9b62]/15 mt-1.5 flex-shrink-0"></span>
                                @unless ($loop->last)
                                    <span class="w-px flex-1 bg-[#be9b62]/30 my-1"></span>
                                @endunless
                            </div>
                            <div class="pb-8">
                                <div class="text-[#a07d3d] font-bold text-xl leading-none">{{ $m['year'] ?? '' }}</div>
                                <p class="text-slate-600 mt-2 leading-relaxed">{{ $m['description'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Progress + Certifications (navy) --}}
    @if (! empty($pStats))
        <section class="bg-[#1e395f] py-20 md:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="inline-block text-[#e2c88a] bg-white/10 ring-1 ring-white/15 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">Our Progress</span>
                <h2 class="text-3xl md:text-4xl font-bold text-white tracking-tight mb-12">Where we stand today</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach ($pStats as $s)
                        <div>
                            <div class="text-4xl md:text-5xl font-bold text-[#e2c88a]">{{ $s['value'] ?? '' }}</div>
                            <div class="text-slate-300 text-sm mt-2 leading-snug">{{ $s['label'] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Certifications --}}
    <x-logo-marquee heading="Certifications &amp; Standards" duration="40s" />

    <x-site-footer />
</body>
</html>
