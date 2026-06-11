<nav class="bg-slate-900 border-b border-emerald-900 text-slate-100 px-4 py-3 sticky top-0 z-50">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        
        <a href="{{ url('/') }}" class="text-amber-400 font-bold text-lg tracking-wider flex items-center gap-2">
            <span class="text-white"></span>Paguyuban Baraya Hadroh Jabar
        </a>

        <button id="menu-btn" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-slate-400 rounded-lg md:hidden hover:bg-slate-800 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <div id="menu-list" class="hidden w-full md:block md:w-auto mt-2 md:mt-0">
            <ul class="flex flex-col md:flex-row gap-2 md:gap-6 text-sm font-medium pt-2 md:pt-0 border-t border-slate-800 md:border-none">
                <li>
                    <a href="{{ route('pengunjung.list') }}" class="block py-2 px-3 text-slate-300 hover:text-amber-400 transition">Cari Grup</a>
                </li>
                <li>
                    <a href="{{ url('/') }}" class="block py-2 px-3 bg-emerald-800 text-white rounded md:bg-transparent md:text-amber-400 md:p-0 hover:bg-emerald-700 md:hover:bg-transparent">Login Admin</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu-list');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>