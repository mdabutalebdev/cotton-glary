@props(['heading' => null, 'products'])

<section class="cg-slider-wrap py-9 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 mb-6">
            <h2 class="text-xl md:text-2xl font-bold text-slate-900 flex items-center gap-2.5 min-w-0">
                <span class="inline-block w-1.5 h-6 rounded-full bg-[#be9b62] flex-shrink-0"></span>
                <span class="truncate">{{ $heading }}</span>
                <span class="text-sm font-normal text-slate-400 flex-shrink-0">({{ count($products) }})</span>
            </h2>
            <div class="flex items-center gap-2 flex-shrink-0">
                <button type="button" class="cg-slider-prev h-9 w-9 md:h-10 md:w-10 grid place-items-center rounded-full border border-slate-200 text-slate-500 hover:bg-[#1e395f] hover:text-white hover:border-[#1e395f] transition-colors" aria-label="Previous">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>
                <button type="button" class="cg-slider-next h-9 w-9 md:h-10 md:w-10 grid place-items-center rounded-full border border-slate-200 text-slate-500 hover:bg-[#1e395f] hover:text-white hover:border-[#1e395f] transition-colors" aria-label="Next">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="cg-slider flex gap-4 sm:gap-5 overflow-x-auto snap-x scroll-smooth pb-3 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
</section>
