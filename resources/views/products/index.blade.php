<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product &amp; Service · Cotton Galary</title>
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
            <h1 class="text-3xl md:text-5xl font-bold text-white tracking-tight mb-4">Product &amp; Service</h1>
            <p class="text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Explore the full range of garments we develop and manufacture — organised by category.
                Tap the <i class="fa-regular fa-heart text-[#be9b62]"></i> to save your favourites.
            </p>
        </div>
    </section>

    {{-- Category sections --}}
    @forelse ($categories as $category)
        <div id="{{ $category->slug }}" class="scroll-mt-36 {{ $loop->even ? 'bg-slate-50' : 'bg-white' }}">
            <x-product-slider :heading="$category->name" :products="$category->products" />
        </div>
    @empty
        <div class="max-w-7xl mx-auto px-4 py-24 text-center">
            <div class="text-slate-300 text-5xl mb-3"><i class="fa-solid fa-box-open"></i></div>
            <p class="text-slate-500 font-medium">No products to show yet.</p>
        </div>
    @endforelse

    <x-site-footer />

    {{-- Slider arrow navigation --}}
    <script>
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.cg-slider-prev, .cg-slider-next');
            if (!btn) return;
            const wrap = btn.closest('.cg-slider-wrap');
            const slider = wrap && wrap.querySelector('.cg-slider');
            if (!slider) return;
            const amount = Math.max(slider.clientWidth * 0.8, 240);
            slider.scrollBy({ left: btn.classList.contains('cg-slider-prev') ? -amount : amount, behavior: 'smooth' });
        });
    </script>
</body>
</html>
