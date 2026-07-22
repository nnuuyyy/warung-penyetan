@extends('layouts.app')

@section('title', 'Warung Penyetan & Soto Mbak Puji - @penyetan.mbakpuji (Warunk Maem, Nyoto, Ngopi)')

@section('content')
<!-- Instagram Bio Profile Header Section (Compact & Separated CTA) -->
<section class="py-6 sm:py-8 bg-slate-950 border-b border-blue-500/20 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        
        <!-- Instagram Card Box (Separated from CTA Button) -->
        <div class="bg-slate-900/90 border border-blue-500/30 rounded-3xl p-5 sm:p-6 shadow-2xl backdrop-blur-md relative">
            
            <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                <!-- Avatar Mascot Circle -->
                <div class="relative flex-shrink-0">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full p-1 bg-gradient-to-tr from-blue-600 via-sky-400 to-red-500 shadow-xl shadow-blue-600/30">
                        <div class="w-full h-full rounded-full bg-white flex items-center justify-center p-2 overflow-hidden border-2 border-slate-900">
                            <!-- Chicken mascot illustration logo -->
                            <div class="text-center">
                                <div class="text-2xl sm:text-3xl">🐔🌶️</div>
                                <div class="font-heading font-extrabold text-[9px] text-red-600 uppercase tracking-tighter leading-none mt-0.5">Mbak Puji</div>
                            </div>
                        </div>
                    </div>
                    <span class="absolute bottom-1 right-1 w-4 h-4 rounded-full bg-emerald-500 border-2 border-slate-900" title="Buka 17.00 - 01.00 WIB"></span>
                </div>

                <!-- Profile Bio Info -->
                <div class="flex-1 text-center sm:text-left space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <div>
                            <h1 class="font-heading font-extrabold text-xl sm:text-2xl text-white tracking-tight flex items-center justify-center sm:justify-start space-x-2">
                                <span>penyetan.mbakpuji</span>
                                <i class="fa-solid fa-circle-check text-blue-500 text-base" title="Official Account"></i>
                            </h1>
                            <span class="text-xs text-blue-400 font-bold block mt-0.5">warunk maem, nyoto, ngopi</span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-center space-x-2">
                            <a href="https://wa.me/{{ env('WA_PHONE_NUMBER', '6285641225009') }}" target="_blank" class="bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs px-4 py-2 rounded-xl shadow-md transition flex items-center space-x-1.5">
                                <i class="fa-brands fa-whatsapp text-sm"></i>
                                <span>Pesan WA</span>
                            </a>
                            <a href="https://www.instagram.com/penyetan.mbakpuji/" target="_blank" class="bg-slate-800 hover:bg-slate-700 text-gray-200 font-semibold text-xs px-3.5 py-2 rounded-xl border border-slate-700 transition">
                                <i class="fa-brands fa-instagram text-sm"></i>
                                <span>Instagram</span>
                            </a>
                        </div>
                    </div>

                    <!-- Follower Stats Badge -->
                    <div class="flex justify-center sm:justify-start space-x-6 text-xs text-gray-300 border-y border-slate-800/80 py-2">
                        <div><strong class="text-white font-bold">penyetan & soto</strong></div>
                    </div>

                    <!-- Bio Bullet Details -->
                    <div class="text-xs space-y-1 text-gray-300 leading-relaxed font-sans">
                        <div class="font-bold text-blue-400 italic">" tempat maemmu "</div>
                        <div>makan ditempat - bungkus - delivery - online food</div>
                        <div class="flex items-center justify-center sm:justify-start space-x-2">
                            <span class="text-amber-400 font-bold">buka:</span>
                            <span class="bg-blue-900/60 text-blue-300 px-2 py-0.5 rounded text-[11px] font-mono border border-blue-500/30">17.00 - 01.00 WIB</span>
                        </div>
                        <div class="flex items-center justify-center sm:justify-start space-x-2">
                            <span class="text-emerald-400 font-bold">cp:</span>
                            <span class="text-white font-mono font-bold">085641225009</span>
                        </div>
                        <div class="flex items-start justify-center sm:justify-start space-x-1.5 text-gray-400 pt-0.5">
                            <i class="fa-solid fa-location-dot text-red-500 mt-0.5"></i>
                            <span>lok: (bawah ps.sapi stlh jembatan, ngawen)</span>
                        </div>
                    </div>

                    <!-- Maps Direct Link Button -->
                    <div class="pt-0.5">
                        <a href="https://maps.app.goo.gl/qa57Zc7FrrN9nJsMA" target="_blank" class="inline-flex items-center space-x-1.5 text-blue-400 hover:text-blue-300 text-xs font-bold transition">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            <span class="underline">Buka Petunjuk Lokasi Google Maps</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- SEPARATE PROMINENT BIG CTA HOOK (OUTSIDE CONTAINER) -->
        <div class="text-center">
            <a href="{{ route('menu.index') }}" class="inline-flex items-center justify-center space-x-3 w-full bg-gradient-to-r from-emerald-500 via-emerald-600 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white font-heading font-black text-xl sm:text-2xl py-4 px-6 rounded-2xl shadow-2xl shadow-emerald-500/40 hover:scale-[1.01] transition-all duration-300 border-2 border-emerald-400/40">
                <i class="fa-solid fa-utensils text-xl sm:text-2xl"></i>
                <span>PESAN SEKARANG 🛵</span>
            </a>
            <div class="flex items-center justify-center space-x-2 text-xs text-emerald-400 font-bold mt-2">
                <span>Makan Di Tempat • Bungkus • Delivery Order</span>
                <i class="fa-solid fa-chevron-down text-blue-400 animate-bounce"></i>
            </div>
        </div>

    </div>
</section>

<!-- Official Menu Sheets Banner Style Section (Visible above the fold) -->
<section class="pt-8 pb-16 bg-slate-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header Banner Menu Blue Style -->
        <div class="bg-blue-600 rounded-3xl p-6 sm:p-8 text-center text-white space-y-2 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 opacity-10 text-white text-9xl font-extrabold select-none">MENU</div>
            <span class="inline-block bg-white/20 backdrop-blur-md text-white text-xs font-black px-4 py-1 rounded-full uppercase tracking-widest border border-white/30">
                Penyet Mbak Puji
            </span>
            <h2 class="font-heading font-black text-3xl sm:text-5xl tracking-tight uppercase">DAFTAR MENU</h2>
            <p class="text-xs sm:text-sm text-blue-100 font-medium">Buka Setiap Hari 17.00 - 01.00 WIB | Menerima Delivery Order & Pesanan</p>
        </div>

        <!-- Menu Notice Highlights -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="bg-slate-950 p-4 rounded-2xl border border-blue-500/20 flex items-center space-x-3 text-xs text-gray-300">
                <span class="w-8 h-8 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold flex-shrink-0 text-base">✓</span>
                <div>
                    <strong class="text-white block font-bold">Include Sambal & Lalapan</strong>
                    <span>Pembelian penyetan sudah include lalapan segar & sambal.</span>
                </div>
            </div>
            <div class="bg-slate-950 p-4 rounded-2xl border border-blue-500/20 flex items-center space-x-3 text-xs text-gray-300">
                <span class="w-8 h-8 rounded-xl bg-chili-500/20 text-chili-400 flex items-center justify-center font-bold flex-shrink-0 text-base">🌶️</span>
                <div>
                    <strong class="text-white block font-bold">Pilih Sambal Bawang / Tomat / Campur</strong>
                    <span>Sambal bisa dicampur atau dipisah sesuai selera.</span>
                </div>
            </div>
        </div>

        <!-- Featured Best Sellers Grid -->
        <div class="space-y-6">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <h3 class="font-heading font-extrabold text-2xl text-white tracking-wide uppercase flex items-center space-x-2">
                    <span class="text-blue-500">Paling Favorit</span>
                    <span class="text-xs bg-amber-500 text-black px-2.5 py-0.5 rounded-full font-black">Best Sellers</span>
                </h3>
                <a href="{{ route('menu.index') }}" class="text-xs font-bold text-blue-400 hover:text-blue-300 flex items-center space-x-1">
                    <span>Lihat Semua Menu</span>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bestsellers as $item)
                <div class="bg-slate-950 rounded-2xl border border-blue-500/20 p-5 space-y-4 hover:border-blue-500/50 transition duration-300 flex flex-col justify-between shadow-xl">
                    <div class="space-y-3">
                        <div class="flex justify-between items-start">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-blue-400 bg-blue-900/40 px-2.5 py-1 rounded-lg border border-blue-500/30">
                                {{ $item->category->name }}
                            </span>
                            <span class="font-heading font-black text-lg text-blue-400">{{ $item->formatted_price }}</span>
                        </div>
                        <h4 class="font-heading font-bold text-lg text-white leading-snug">{{ $item->name }}</h4>
                        <p class="text-xs text-gray-400 leading-relaxed line-clamp-2">{{ $item->description }}</p>
                    </div>

                    <div class="pt-3 border-t border-slate-800 flex items-center justify-between">
                        <span class="text-[11px] text-gray-500">⭐ Best Seller</span>
                        <button onclick="addToCart({ id: {{ $item->id }}, name: '{{ addslashes($item->name) }}', price: {{ $item->price }}, image_url: '{{ $item->image_url }}' })" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-xl text-xs transition flex items-center space-x-1.5 shadow-md">
                            <i class="fa-solid fa-plus text-xs"></i>
                            <span>Tambah Pesanan</span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection
