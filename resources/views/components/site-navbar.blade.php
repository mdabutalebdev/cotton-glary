<nav class="bg-white shadow-sm fixed w-full z-50 top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            {{-- Logo (click -> home). Cropped inside a fixed h-20 box so it looks bigger without changing the header height. --}}
            <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center h-20 overflow-hidden cursor-pointer">
                <img src="{{ asset('uploads/banners/logo.png') }}" alt="Cotton Galary" class="h-24 w-auto max-w-none">
            </a>

            {{-- Desktop menu --}}
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-gray-900' : 'text-gray-600' }} hover:text-gray-900 font-medium transition-colors">Home</a>
                <a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'text-gray-900' : 'text-gray-600' }} hover:text-gray-900 font-medium transition-colors">Product &amp; Service</a>
                <a href="{{ route('promise') }}" class="{{ request()->routeIs('promise') ? 'text-gray-900' : 'text-gray-600' }} hover:text-gray-900 font-medium transition-colors">Our Promise</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-gray-900' : 'text-gray-600' }} hover:text-gray-900 font-medium transition-colors">About Us</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-gray-900' : 'text-gray-600' }} hover:text-gray-900 font-medium transition-colors">Contact Us</a>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-2 md:gap-4">
                {{-- Favorites --}}
                <div class="relative">
                    <button type="button" id="fav-toggle" class="relative h-10 w-10 grid place-items-center rounded-full hover:bg-gray-100 text-gray-700 transition-colors" aria-label="Favorites">
                        <i class="fa-regular fa-heart text-lg"></i>
                        <span id="fav-count" class="hidden absolute -top-0.5 -right-0.5 min-w-[1.25rem] h-5 px-1 grid place-items-center rounded-full bg-[#be9b62] text-white text-[11px] font-bold leading-none">0</span>
                    </button>

                    <div id="fav-panel" class="hidden absolute right-0 mt-2 w-80 max-w-[calc(100vw-2rem)] bg-white rounded-2xl shadow-2xl border border-slate-100 z-50 overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <span class="font-semibold text-slate-800 text-sm">My Favorites</span>
                            <span id="fav-panel-count" class="text-xs text-slate-400">0 items</span>
                        </div>
                        <div id="fav-list" class="max-h-80 overflow-y-auto"></div>
                        <div id="fav-empty" class="px-4 py-10 text-center text-slate-400 text-sm">
                            <i class="fa-regular fa-heart text-2xl mb-2 block"></i>
                            No favorites yet.
                        </div>
                    </div>
                </div>

                <a href="{{ route('login') }}" class="hidden md:inline-flex items-center justify-center px-6 py-2.5 border border-transparent text-sm font-medium rounded-full text-white bg-gray-900 hover:bg-gray-800 transition-colors shadow-sm">
                    Login
                </a>

                <button type="button" id="mobile-menu-btn" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" aria-label="Menu">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">Home</a>
            <a href="{{ route('products') }}" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">Product &amp; Service</a>
            <a href="{{ route('promise') }}" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">Our Promise</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">About Us</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">Contact Us</a>
            <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg bg-gray-900 text-white font-medium text-center">Login</a>
        </div>
    </div>
</nav>

{{-- Favorites + mobile menu behaviour (localStorage based, works on every public page) --}}
<script>
(function () {
    const KEY = 'cg_favorites';
    const read = () => { try { return JSON.parse(localStorage.getItem(KEY)) || []; } catch (e) { return []; } };
    const write = (v) => localStorage.setItem(KEY, JSON.stringify(v));
    const has = (id) => read().some(f => String(f.id) === String(id));

    function toggle(item) {
        const favs = read();
        const i = favs.findIndex(f => String(f.id) === String(item.id));
        if (i >= 0) favs.splice(i, 1);
        else favs.unshift(item);
        write(favs);
        render();
    }

    function esc(s) {
        return String(s == null ? '' : s).replace(/[&<>"']/g, c => ({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' }[c]));
    }

    function render() {
        const favs = read();

        const count = document.getElementById('fav-count');
        if (count) { count.textContent = favs.length; count.classList.toggle('hidden', favs.length === 0); }
        const pc = document.getElementById('fav-panel-count');
        if (pc) pc.textContent = favs.length + ' item' + (favs.length === 1 ? '' : 's');

        const list = document.getElementById('fav-list');
        const empty = document.getElementById('fav-empty');
        if (list) {
            if (!favs.length) {
                list.innerHTML = '';
                if (empty) empty.classList.remove('hidden');
            } else {
                if (empty) empty.classList.add('hidden');
                list.innerHTML = favs.map(f => {
                    const thumb = f.image
                        ? '<div class="h-12 w-12 rounded-lg bg-slate-100 bg-cover bg-center flex-shrink-0" style="background-image:url(\'' + esc(f.image) + '\')"></div>'
                        : '<div class="h-12 w-12 rounded-lg bg-[#f4efe4] flex-shrink-0 grid place-items-center text-[#cdb98f]"><i class="fa-solid fa-shirt"></i></div>';
                    return '<div class="flex items-center gap-3 px-4 py-3 border-b border-slate-50 last:border-0">' + thumb +
                        '<div class="min-w-0 flex-1"><div class="text-sm font-medium text-slate-800 truncate">' + esc(f.name) + '</div>' +
                        '<div class="text-xs text-slate-400 truncate">' + esc(f.code) + '</div></div>' +
                        '<button type="button" data-remove="' + esc(f.id) + '" class="text-slate-300 hover:text-red-500" aria-label="Remove"><i class="fa-solid fa-xmark"></i></button></div>';
                }).join('');
            }
        }

        document.querySelectorAll('.fav-btn').forEach(btn => {
            const on = has(btn.dataset.id);
            btn.classList.toggle('is-fav', on);
            const icon = btn.querySelector('i');
            if (icon) icon.className = on ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
        });
    }

    document.addEventListener('click', function (e) {
        const favBtn = e.target.closest('.fav-btn');
        if (favBtn) {
            e.preventDefault();
            toggle({ id: favBtn.dataset.id, name: favBtn.dataset.name, code: favBtn.dataset.code || '', image: favBtn.dataset.image || '' });
            return;
        }
        const rm = e.target.closest('[data-remove]');
        if (rm) { toggle({ id: rm.dataset.remove }); return; }

        const panel = document.getElementById('fav-panel');
        if (e.target.closest('#fav-toggle')) { if (panel) panel.classList.toggle('hidden'); return; }
        if (panel && !panel.classList.contains('hidden') && !e.target.closest('#fav-panel')) panel.classList.add('hidden');

        if (e.target.closest('#mobile-menu-btn')) {
            const m = document.getElementById('mobile-menu');
            if (m) m.classList.toggle('hidden');
        }
    });

    document.addEventListener('DOMContentLoaded', render);
    render();
})();
</script>
