@props([
    'heading' => null,
    'duration' => '40s',
])

@php
    // Auto-discover every image dropped into public/uploads/marque image.
    // These are "on dark background" logo versions, so the strip uses the brand navy.
    $dir = public_path('uploads/marque image');
    $logos = [];
    if (is_dir($dir)) {
        foreach (scandir($dir) as $file) {
            if (preg_match('/\.(png|jpe?g|webp|svg|gif)$/i', $file)) {
                $logos[] = asset('uploads/'.rawurlencode('marque image').'/'.rawurlencode($file));
            }
        }
    }
@endphp

@if (! empty($logos))
    <section class="bg-[#1e395f] py-8 md:py-10">
        @if ($heading)
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-8">
                <p class="text-xs font-semibold tracking-[0.25em] uppercase text-white/60">{{ $heading }}</p>
            </div>
        @endif

        {{-- The set is duplicated so the loop is perfectly seamless. --}}
        <div class="cg-marquee cg-marquee-fade" style="--cg-marquee-duration: {{ $duration }};">
            <div class="cg-marquee-track">
                @foreach (array_merge($logos, $logos) as $i => $logo)
                    <div class="cg-marquee-item" @if ($i >= count($logos)) aria-hidden="true" @endif>
                        <img src="{{ $logo }}" alt="Certification logo" loading="lazy"
                             class="h-28 md:h-40 w-auto object-contain select-none pointer-events-none">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
