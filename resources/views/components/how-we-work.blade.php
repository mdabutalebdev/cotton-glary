{{--
    "How We Work" — a 4-step process timeline: a gold connector line links four
    gradient gold nodes (icon + navy number badge), each hanging a soft white card
    with the step title + description. Pairs with the Our Services section.
    Gold (#be9b62) / navy (#1e395f) public theme.
--}}
@php
    $steps = [
        [
            'icon'  => 'fa-pen-ruler',
            'title' => 'Consult & Design',
            'desc'  => 'Share your concept, tech pack or sketch — our team refines it into a production-ready design.',
        ],
        [
            'icon'  => 'fa-flask',
            'title' => 'Source & Sample',
            'desc'  => 'We source sustainable fabrics and trims, then produce samples for fit, feel and finish sign-off.',
        ],
        [
            'icon'  => 'fa-industry',
            'title' => 'Manufacture & QC',
            'desc'  => 'Bulk production across 120+ compliant partner factories, with quality checks at every stage.',
        ],
        [
            'icon'  => 'fa-truck-fast',
            'title' => 'Deliver & Support',
            'desc'  => 'On-time global shipping with full compliance documentation and dedicated after-sales support.',
        ],
    ];
@endphp

<section class="relative bg-gradient-to-b from-slate-50 to-white py-10 md:py-14 overflow-hidden">
    {{-- Faint warm glow for depth --}}
    <div class="pointer-events-none absolute -top-20 left-1/2 -translate-x-1/2 w-[40rem] h-[40rem] rounded-full bg-[#be9b62]/5 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="max-w-2xl mx-auto text-center mb-12 md:mb-14">
            <span class="inline-block text-[#a07d3d] bg-[#be9b62]/10 ring-1 ring-[#be9b62]/25 px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-5">
                How We Work
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight leading-tight mb-5">
                From first sketch to final delivery
            </h2>
            <p class="text-slate-600 leading-relaxed">
                A clear, proven process that carries your product from idea to your warehouse —
                transparent, compliant and on schedule at every step.
            </p>
        </div>

        {{-- Steps --}}
        <div class="relative">
            {{-- Connecting line (desktop only, behind the nodes) --}}
            <div class="hidden lg:block absolute top-8 left-[12.5%] right-[12.5%] h-0.5 bg-gradient-to-r from-[#be9b62]/30 via-[#be9b62]/70 to-[#be9b62]/30 z-0"></div>

            <div class="relative grid gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($steps as $i => $step)
                    <div class="relative flex flex-col items-center">
                        {{-- Node: gradient gold circle + navy step number --}}
                        <div class="relative z-10 w-16 h-16 rounded-full bg-gradient-to-br from-[#be9b62] to-[#a07d3d] text-white grid place-items-center text-xl shadow-lg ring-4 ring-white">
                            <i class="fa-solid {{ $step['icon'] }}"></i>
                            <span class="absolute -top-1.5 -right-1.5 w-7 h-7 rounded-full bg-[#1e395f] text-white text-[11px] font-extrabold grid place-items-center ring-2 ring-white">
                                {{ sprintf('%02d', $i + 1) }}
                            </span>
                        </div>

                        {{-- Card --}}
                        <div class="mt-5 w-full bg-white rounded-2xl border border-slate-100 shadow-[0_10px_30px_-15px_rgba(15,23,42,0.2)] px-6 py-6 text-center">
                            <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $step['title'] }}</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
