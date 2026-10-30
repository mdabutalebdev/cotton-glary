<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') · Cotton Galary</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/banners/fav.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased">

    @php
        $unread = \App\Models\ContactMessage::where('is_read', false)->count();
        $nav = [
            ['route' => 'admin.dashboard', 'active' => 'admin.dashboard', 'icon' => 'fa-gauge-high', 'label' => 'Dashboard'],
            ['route' => 'admin.banners.index', 'active' => 'admin.banners.*', 'icon' => 'fa-images', 'label' => 'Hero Banners'],
            ['route' => 'admin.categories.index', 'active' => 'admin.categories.*', 'icon' => 'fa-tags', 'label' => 'Categories'],
            ['route' => 'admin.products.index', 'active' => 'admin.products.*', 'icon' => 'fa-shirt', 'label' => 'Products'],
            ['route' => 'admin.about.edit', 'active' => 'admin.about.*', 'icon' => 'fa-circle-info', 'label' => 'About Section'],
            ['route' => 'admin.owner.edit', 'active' => 'admin.owner.*', 'icon' => 'fa-user-tie', 'label' => 'Owner / Founder'],
            ['route' => 'admin.certifications.index', 'active' => 'admin.certifications.*', 'icon' => 'fa-certificate', 'label' => 'Certifications'],
            ['route' => 'admin.promise.edit', 'active' => 'admin.promise.*', 'icon' => 'fa-seedling', 'label' => 'Our Promise'],
            ['route' => 'admin.contact.edit', 'active' => 'admin.contact.*', 'icon' => 'fa-address-book', 'label' => 'Contact Info'],
            ['route' => 'admin.messages.index', 'active' => 'admin.messages.*', 'icon' => 'fa-envelope', 'label' => 'Messages', 'badge' => $unread ?: null],
        ];
    @endphp

    <div class="min-h-screen md:flex">

        {{-- Sidebar (desktop) --}}
        <aside class="hidden md:flex md:flex-col md:w-64 md:fixed md:inset-y-0 bg-slate-900 text-slate-300">
            <a href="{{ route('home') }}" class="h-20 flex items-center justify-center px-6 border-b border-white/10" title="Go to website">
                <span class="bg-white rounded-xl px-3 py-2 inline-flex shadow-sm">
                    <img src="{{ asset('uploads/banners/logo.png') }}" alt="Cotton Galary" class="h-11 w-auto">
                </span>
            </a>

            <nav class="flex-1 px-3 py-6 space-y-1">
                @foreach ($nav as $item)
                    <a href="{{ route($item['route']) }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                              {{ request()->routeIs($item['active'])
                                    ? 'bg-emerald-600 text-white'
                                    : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid {{ $item['icon'] }} w-5 text-center"></i>
                        <span class="flex-1">{{ $item['label'] }}</span>
                        @if (! empty($item['badge']))
                            <span class="text-xs font-bold bg-[#be9b62] text-white rounded-full min-w-[1.25rem] h-5 px-1.5 grid place-items-center">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <div class="px-3 py-4 border-t border-white/10">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors">
                    <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center"></i>
                    View Website
                </a>
            </div>
        </aside>

        {{-- Main --}}
        <div class="flex-1 md:ml-64 flex flex-col min-h-screen">

            {{-- Top bar --}}
            <header class="h-16 md:h-20 bg-white border-b border-slate-200 flex items-center justify-between px-4 md:px-8 sticky top-0 z-30">
                <div class="flex items-center gap-3">
                    {{-- Mobile menu --}}
                    <details class="cg-menu md:hidden relative">
                        <summary class="list-none cursor-pointer h-10 w-10 grid place-items-center rounded-lg border border-slate-200 text-slate-600">
                            <i class="fa-solid fa-bars"></i>
                        </summary>
                        <div class="absolute left-0 mt-2 w-56 bg-white border border-slate-200 rounded-xl shadow-lg py-2 z-40">
                            @foreach ($nav as $item)
                                <a href="{{ route($item['route']) }}"
                                   class="flex items-center gap-3 px-4 py-2.5 text-sm {{ request()->routeIs($item['active']) ? 'text-emerald-700 font-semibold' : 'text-slate-600' }} hover:bg-slate-50">
                                    <i class="fa-solid {{ $item['icon'] }} w-5 text-center"></i>{{ $item['label'] }}
                                </a>
                            @endforeach
                            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 border-t border-slate-100 mt-1">
                                <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center"></i>View Website
                            </a>
                        </div>
                    </details>
                    <h1 class="text-lg md:text-xl font-bold text-slate-900">@yield('title', 'Admin')</h1>
                </div>

                <div class="flex items-center gap-3 md:gap-4">
                    {{-- Profile dropdown (click name / avatar) --}}
                    <details class="cg-menu relative">
                        <summary class="list-none cursor-pointer flex items-center gap-2.5 rounded-lg px-1.5 py-1 hover:bg-slate-50 transition-colors">
                            <div class="hidden sm:block text-right leading-tight">
                                <div class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-slate-500">Administrator</div>
                            </div>
                            <div class="h-9 w-9 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-700 text-white grid place-items-center font-semibold text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                        </summary>
                        <div class="absolute right-0 mt-2 w-60 bg-white border border-slate-200 rounded-xl shadow-lg py-2 z-40">
                            <div class="px-4 py-2.5 border-b border-slate-100">
                                <div class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</div>
                            </div>
                            <a href="{{ route('admin.password.edit') }}"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm {{ request()->routeIs('admin.password.*') ? 'text-emerald-700 font-semibold bg-emerald-50/60' : 'text-slate-700' }} hover:bg-slate-50">
                                <i class="fa-solid fa-key w-5 text-center text-slate-400"></i>Change Password
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="border-t border-slate-100 mt-1 pt-1">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                    <i class="fa-solid fa-right-from-bracket w-5 text-center text-slate-400"></i>Log out
                                </button>
                            </form>
                        </div>
                    </details>
                </div>
            </header>

            {{-- Content --}}
            <main class="flex-1 p-4 md:p-8">
                @if (session('status'))
                    <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl px-4 py-3 text-sm font-medium">
                        <i class="fa-solid fa-circle-check"></i>
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
                        <div class="font-semibold mb-1"><i class="fa-solid fa-triangle-exclamation mr-1"></i>Please fix the following:</div>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')

    {{-- Close dropdown menus (profile + mobile nav) when clicking outside them --}}
    <script>
        document.addEventListener('click', function (e) {
            document.querySelectorAll('details.cg-menu[open]').forEach(function (d) {
                if (! d.contains(e.target)) d.removeAttribute('open');
            });
        });
    </script>
</body>
</html>
