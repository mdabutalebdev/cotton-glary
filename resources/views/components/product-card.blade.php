@props(['product'])

<article class="cg-product-card snap-start shrink-0 w-52 sm:w-60 bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all overflow-hidden">
    <div class="relative aspect-[4/5] bg-gradient-to-br from-[#f7f2e8] to-[#eceff3]">
        @if ($product->imageUrl())
            <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover">
        @else
            <div class="absolute inset-0 flex items-center justify-center text-[#cdb98f]">
                <i class="fa-solid fa-shirt text-6xl"></i>
            </div>
        @endif

        <button type="button"
                class="fav-btn absolute top-3 right-3 h-9 w-9 grid place-items-center rounded-full bg-white/90 backdrop-blur shadow-sm text-slate-400 hover:text-[#be9b62] transition-colors"
                data-id="{{ $product->id }}"
                data-name="{{ $product->name }}"
                data-code="{{ $product->design_code }}"
                data-image="{{ $product->imageUrl() }}"
                aria-label="Add {{ $product->name }} to favorites">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>

    <div class="p-4 text-center">
        <h3 class="font-semibold text-slate-800 text-sm truncate" title="{{ $product->name }}">{{ $product->name }}</h3>
        @if ($product->design_code)
            <p class="text-xs text-slate-400 mt-1 tracking-wide">{{ $product->design_code }}</p>
        @endif
    </div>
</article>
