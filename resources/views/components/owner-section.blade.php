@props(['owner' => null])

@php
    $ownerEyebrow  = $owner ? $owner->eyebrow : 'Meet the Owner';
    $ownerName     = $owner ? $owner->name : 'Md. Abdul Karim';
    $ownerRole     = $owner ? $owner->designation : 'Proprietor & CEO, Cotton Galary';
    $ownerP1       = $owner ? $owner->paragraph_1 : 'Leading Cotton Galary with a clear vision — to deliver premium, sustainable cotton apparel that global brands can trust.';
    $ownerP2       = $owner ? $owner->paragraph_2 : 'A commitment to craftsmanship, fair manufacturing and lasting relationships continues to move the company forward.';
    $ownerPhone    = $owner ? $owner->phone : null;
    $ownerEmail    = $owner ? $owner->email : null;
    $ownerImg      = $owner?->imageUrl();
@endphp

<section class="bg-slate-50 py-20 md:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Right: bio -->
            <div class="order-2">
                @if (! empty($ownerEyebrow))
                    <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-4">
                        {{ $ownerEyebrow }}
                    </span>
                @endif
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-2">{{ $ownerName }}</h2>
                @if (! empty($ownerRole))
                    <p class="text-[#a07d3d] font-semibold text-sm uppercase tracking-wide mb-6">{{ $ownerRole }}</p>
                @endif
                @if (! empty($ownerP1))
                    <p class="text-slate-600 leading-relaxed mb-4">{{ $ownerP1 }}</p>
                @endif
                @if (! empty($ownerP2))
                    <p class="text-slate-600 leading-relaxed mb-8">{{ $ownerP2 }}</p>
                @endif

                @if ($ownerPhone || $ownerEmail)
                    <div class="flex flex-col sm:flex-row gap-4">
                        @if ($ownerPhone)
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $ownerPhone) }}"
                               class="inline-flex items-center justify-center gap-3 bg-[#1e395f] hover:bg-[#16304a] text-white font-semibold px-6 py-3.5 rounded-full transition-colors shadow-sm">
                                <i class="fa-solid fa-phone"></i> {{ $ownerPhone }}
                            </a>
                        @endif
                        @if ($ownerEmail)
                            <a href="mailto:{{ $ownerEmail }}"
                               class="inline-flex items-center justify-center gap-3 border border-[#1e395f]/25 text-[#1e395f] hover:bg-[#1e395f] hover:text-white font-semibold px-6 py-3.5 rounded-full transition-colors">
                                <i class="fa-solid fa-envelope"></i> {{ $ownerEmail }}
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Left: photo -->
            <div class="order-1 relative">
                <div class="absolute -bottom-5 -left-5 w-2/3 h-2/3 bg-[#be9b62]/15 rounded-3xl -z-10 hidden sm:block"></div>
                @if ($ownerImg)
                    <img src="{{ $ownerImg }}" alt="{{ $ownerName }}" class="relative w-full max-w-md lg:mr-auto aspect-[4/5] object-cover rounded-2xl shadow-md">
                @else
                    <div class="relative w-full max-w-md lg:mr-auto aspect-[4/5] rounded-2xl shadow-md bg-gradient-to-br from-[#1e395f] to-[#0b1a30] grid place-items-center">
                        <i class="fa-solid fa-user-tie text-white/15 text-8xl"></i>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
