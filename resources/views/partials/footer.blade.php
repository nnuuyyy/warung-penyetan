<footer class="bg-slate-950 border-t border-blue-500/20 pt-16 pb-12 mt-20 text-gray-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
            <!-- Brand Info -->
            <div class="space-y-4 md:col-span-1">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-sky-500 flex items-center justify-center text-white font-bold shadow-md shadow-blue-600/30">
                        <i class="fa-solid fa-utensils text-lg"></i>
                    </div>
                    <div class="font-heading font-extrabold text-lg text-white">
                        penyetan.<span class="text-blue-500">mbakpuji</span>
                    </div>
                </div>
                <p class="text-xs leading-relaxed text-gray-400">
                    Spesialis penyetan sambal ulek & soto kuah gurih.
                </p>
                <div class="flex space-x-3 pt-2">
                    <a href="https://www.instagram.com/penyetan.mbakpuji/" target="_blank" class="w-9 h-9 rounded-xl bg-slate-900 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition border border-slate-800">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/{{ env('WA_PHONE_NUMBER', '6285641225009') }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-900 flex items-center justify-center text-emerald-400 hover:bg-emerald-600 hover:text-white transition border border-slate-800">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Jam Buka -->
            <div class="space-y-3">
                <h4 class="font-heading font-bold text-white text-xs uppercase tracking-wider text-blue-400">Jam Operasional</h4>
                <ul class="text-xs space-y-2">
                    <li class="flex justify-between border-b border-slate-900 pb-1">
                        <span>Setiap Hari</span>
                        <span class="text-white font-bold font-mono">17:00 - 01:00 WIB</span>
                    </li>
                    <li class="text-emerald-400 text-[11px] font-bold flex items-center space-x-1.5 pt-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Menerima Delivery Order & Pesanan</span>
                    </li>
                </ul>
            </div>

            <!-- Link Navigasi -->
            <div class="space-y-3">
                <h4 class="font-heading font-bold text-white text-xs uppercase tracking-wider text-blue-400">Navigasi Utama</h4>
                <ul class="text-xs space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda Utama</a></li>
                    <li><a href="{{ route('menu.index') }}" class="hover:text-blue-400 transition">Daftar Menu & Harga</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-400 transition">Tentang Warung Mbak Puji</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition">Lokasi Warung Ngawen</a></li>
                </ul>
            </div>

            <!-- Kontak & Alamat -->
            <div class="space-y-3">
                <h4 class="font-heading font-bold text-white text-xs uppercase tracking-wider text-blue-400">Kontak & Lokasi</h4>
                <ul class="text-xs space-y-3">
                    <li class="flex items-start space-x-3">
                        <i class="fa-solid fa-location-dot text-red-500 mt-0.5"></i>
                        <span class="text-gray-300">bawah ps.sapi stlh jembatan, ngawen</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fa-brands fa-whatsapp text-emerald-400 text-sm"></i>
                        <span class="text-white font-bold font-mono">085641225009</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fa-brands fa-instagram text-blue-400"></i>
                        <span>@penyetan.mbakpuji</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pt-8 text-center text-xs text-gray-500 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p>&copy; {{ date('Y') }} penyetan.mbakpuji - tempat maemmu.</p>
            <p class="text-[11px]">Warung Penyetan & Soto Mbak Puji 🌶️🍲</p>
        </div>
    </div>
</footer>
