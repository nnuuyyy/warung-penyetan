<header class="sticky top-0 z-40 bg-slate-950/90 backdrop-blur-md border-b border-blue-500/20 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-600 to-blue-700 flex items-center justify-center text-white shadow-lg shadow-blue-600/30 group-hover:scale-105 transition transform border border-blue-400/30">
                    <i class="fa-solid fa-utensils text-xl group-hover:rotate-12 transition"></i>
                </div>
                <div>
                    <div class="font-heading font-extrabold text-lg leading-none text-white group-hover:text-blue-400 transition tracking-wide">
                        penyetan.<span class="text-blue-500">mbakpuji</span>
                    </div>
                    <span class="text-[10px] tracking-widest uppercase text-blue-400/80 font-bold block mt-0.5">warunk maem • nyoto • ngopi</span>
                </div>
            </a>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-400 font-bold border-b-2 border-blue-500' : 'text-gray-300 hover:text-blue-400' }} py-2 text-xs uppercase tracking-wider transition">
                    Beranda
                </a>
                <a href="{{ route('menu.index') }}" class="{{ request()->routeIs('menu.index') ? 'text-blue-400 font-bold border-b-2 border-blue-500' : 'text-gray-300 hover:text-blue-400' }} py-2 text-xs uppercase tracking-wider transition flex items-center space-x-1">
                    <span>Menu & Harga</span>
                    <span class="bg-blue-600 text-white text-[9px] px-1.5 py-0.5 rounded-full font-extrabold">Menu Sheets</span>
                </a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-blue-400 font-bold border-b-2 border-blue-500' : 'text-gray-300 hover:text-blue-400' }} py-2 text-xs uppercase tracking-wider transition">
                    Tentang Warung
                </a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-blue-400 font-bold border-b-2 border-blue-500' : 'text-gray-300 hover:text-blue-400' }} py-2 text-xs uppercase tracking-wider transition">
                    Lokasi
                </a>
            </nav>

            <!-- Actions Right -->
            <div class="flex items-center space-x-3">
                <!-- Cart Button Navbar -->
                <button onclick="toggleCartDrawer()" class="relative p-2.5 text-gray-300 hover:text-blue-400 transition bg-slate-900 rounded-xl border border-blue-500/20 hover:border-blue-500/50">
                    <i class="fa-solid fa-cart-shopping text-base"></i>
                    <span id="nav-cart-count" class="absolute -top-2 -right-2 bg-red-600 text-white text-[10px] font-extrabold w-4 h-4 rounded-full flex items-center justify-center border border-slate-950">0</span>
                </button>

                <!-- Admin Link -->
                @auth
                <a href="{{ route('admin.menu.index') }}" class="hidden sm:inline-flex items-center space-x-1.5 bg-blue-600 hover:bg-blue-500 text-white px-3.5 py-2 rounded-xl text-xs font-bold transition shadow-md">
                    <i class="fa-solid fa-gauge-high"></i>
                    <span>Dashboard Admin</span>
                </a>
                @else
                <a href="{{ route('admin.login') }}" class="hidden sm:inline-flex items-center space-x-1 bg-slate-900 hover:bg-slate-800 text-gray-400 hover:text-white px-3 py-2 rounded-xl text-xs font-semibold border border-slate-800 transition">
                    <i class="fa-solid fa-user-lock text-xs"></i>
                    <span>Admin</span>
                </a>
                @endauth

                <!-- Direct WA button -->
                <a href="https://wa.me/{{ env('WA_PHONE_NUMBER', '6285641225009') }}?text=Halo%20Mbak%20Puji,%20saya%20mau%20tanya%20menu%20warung" target="_blank" class="hidden lg:inline-flex items-center space-x-2 bg-emerald-600/20 hover:bg-emerald-600 text-emerald-400 hover:text-white px-4 py-2 rounded-xl text-xs font-bold border border-emerald-500/30 transition duration-300">
                    <i class="fa-brands fa-whatsapp text-sm"></i>
                    <span>085641225009</span>
                </a>

                <!-- Mobile Menu Toggle Button -->
                <button id="mobile-menu-btn" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="md:hidden p-2 text-gray-300 hover:text-white focus:outline-none">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-6 pt-2 border-t border-slate-800 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-xl text-xs font-bold text-gray-200 hover:bg-blue-600/10 hover:text-blue-400">
                <i class="fa-solid fa-house w-6 text-blue-500"></i> Beranda
            </a>
            <a href="{{ route('menu.index') }}" class="block px-3 py-2 rounded-xl text-xs font-bold text-gray-200 hover:bg-blue-600/10 hover:text-blue-400">
                <i class="fa-solid fa-utensils w-6 text-blue-500"></i> Menu & Harga
            </a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-xl text-xs font-bold text-gray-200 hover:bg-blue-600/10 hover:text-blue-400">
                <i class="fa-solid fa-store w-6 text-blue-500"></i> Tentang Warung
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-xl text-xs font-bold text-gray-200 hover:bg-blue-600/10 hover:text-blue-400">
                <i class="fa-solid fa-location-dot w-6 text-blue-500"></i> Lokasi Ngawen
            </a>
            @auth
            <a href="{{ route('admin.menu.index') }}" class="block px-3 py-2 rounded-xl text-xs font-bold text-blue-400 bg-blue-600/20">
                <i class="fa-solid fa-gauge-high w-6"></i> Dashboard Admin
            </a>
            @else
            <a href="{{ route('admin.login') }}" class="block px-3 py-2 rounded-xl text-xs font-bold text-gray-400 hover:text-white">
                <i class="fa-solid fa-user-lock w-6"></i> Login Admin
            </a>
            @endauth
        </div>
    </div>
</header>
