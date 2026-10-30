{{--
    "Our Services" — 6 service offerings. NAVY cards on a WHITE section background
    (user's chosen look): solid navy `#1e395f` cards with a soft shadow, gold icon
    badge, centered white title / slate-300 description. Same card layout as the
    About Us "Certifications & Standards" cards. Static (no product lists).
--}}
@php
    $services = [
        [
            'icon'  => 'fa-pen-ruler',
            'title' => 'Design & Development',
            'desc'  => 'From tech packs to trend-led concepts, we turn your ideas into production-ready garment designs.',
        ],
        [
            'icon'  => 'fa-earth-americas',
            'title' => 'Global Sourcing',
            'desc'  => 'We source sustainable fabrics, trims and accessories from a trusted worldwide supplier network.',
        ],
        [
            'icon'  => 'fa-industry',
            'title' => 'Manufacturing & Production',
            'desc'  => 'Bulk garment production across 120+ fully compliant partner factories, built for scale and consistency.',
        ],
        [
            'icon'  => 'fa-shield-halved',
            'title' => 'Quality & Compliance',
            'desc'  => 'Rigorous quality control and ethical, certified compliance at every stage of manufacturing.',
        ],
        [
            'icon'  => 'fa-tags',
            'title' => 'Private Label & Branding',
            'desc'  => 'End-to-end private-label production with custom labelling, packaging and premium finishing.',
        ],
        [
            'icon'  => 'fa-truck-fast',
            'title' => 'Logistics & Export',
            'desc'  => 'Dependable warehousing and on-time global shipping with complete export documentation.',
        ],
    ];
@endphp

<section class="bg-white py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="max-w-2xl mx-auto text-center mb-8 md:mb-10">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 tracking-tight mb-4">Our Services</h2>
            <p class="text-slate-600 text-lg leading-relaxed">
                We provide diversified services to support your business growth with reliability and excellence.
            </p>
        </div>

        {{-- Navy cards on white --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <div class="bg-[#1e395f] rounded-2xl p-8 text-center shadow-[0_12px_30px_-12px_rgba(15,23,42,0.3)]">
                    <div class="w-16 h-16 mx-auto mb-5 rounded-full bg-white/10 ring-1 ring-white/15 grid place-items-center">
                        <i class="fa-solid {{ $service['icon'] }} text-2xl text-[#e2c88a]"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2.5">{{ $service['title'] }}</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">{{ $service['desc'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
