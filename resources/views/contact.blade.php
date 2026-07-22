@extends('layouts.app')

@section('title', 'Lokasi & Jam Buka - penyetan.mbakpuji')

@section('content')
<section class="py-12 bg-slate-950 border-b border-blue-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-blue-400 text-xs font-bold uppercase tracking-widest">Kunjungi Warung Kami</span>
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl text-white">Lokasi & Jam Operasional</h1>
        <p class="text-xs sm:text-sm text-gray-400 max-w-xl mx-auto">
            Makan di tempat, bungkus, delivery, & online food
        </p>
    </div>
</section>

<section class="py-16 bg-darkwood">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Contact Information Cards -->
        <div class="lg:col-span-5 space-y-6">
            <div class="p-8 bg-slate-900 rounded-3xl border border-blue-500/20 space-y-6 shadow-2xl">
                <h3 class="font-heading font-extrabold text-xl text-white border-b border-slate-800 pb-4">Info Warung Mbak Puji</h3>
                
                <div class="space-y-5">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-600/20 flex items-center justify-center text-blue-400 flex-shrink-0">
                            <i class="fa-solid fa-location-dot text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-xs">Alamat Warung</h4>
                            <p class="text-xs text-gray-300 mt-0.5 leading-relaxed">
                                (bawah ps.sapi stlh jembatan, ngawen)
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 flex-shrink-0">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-xs">WhatsApp / Contact Person</h4>
                            <p class="text-xs text-gray-200 mt-0.5 font-bold font-mono">
                                085641225009
                            </p>
                            <span class="text-[10px] text-emerald-400 font-semibold">Order / Tanya Menu</span>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-600/20 flex items-center justify-center text-blue-400 flex-shrink-0">
                            <i class="fa-solid fa-clock text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-xs">Jam Buka</h4>
                            <p class="text-xs text-gray-300 mt-0.5 font-semibold">Setiap Hari: 17:00 - 01:00 WIB</p>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-800">
                    <a href="https://wa.me/{{ $waPhone }}?text=Halo%20Mbak%20Puji,%20saya%20mau%20pesan" target="_blank" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-extrabold py-3.5 px-4 rounded-2xl text-xs transition flex items-center justify-center space-x-2 shadow-lg shadow-emerald-900/40">
                        <i class="fa-brands fa-whatsapp text-base"></i>
                        <span>Chat WhatsApp Mbak Puji</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Google Maps Embed Placeholder -->
        <div class="lg:col-span-7">
            <div class="bg-slate-900 rounded-3xl border border-blue-500/20 overflow-hidden shadow-2xl h-full min-h-[380px] relative flex items-center justify-center">
                <div class="absolute inset-0 bg-cover bg-center opacity-30 filter blur-sm" style="background-image: url('https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&w=1000&q=80')"></div>
                <div class="relative z-10 text-center p-8 space-y-4 max-w-md bg-slate-950/90 backdrop-blur-md rounded-3xl border border-blue-500/30 shadow-2xl">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-blue-600/20 flex items-center justify-center text-blue-400 text-3xl">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-xl text-white">Petunjuk Arah Google Maps</h3>
                        <p class="text-xs text-gray-300 mt-1">bawah ps.sapi stlh jembatan, ngawen</p>
                    </div>
                    <a href="https://maps.app.goo.gl/qa57Zc7FrrN9nJsMA" target="_blank" class="inline-flex items-center space-x-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-3 rounded-2xl text-xs shadow-lg transition">
                        <i class="fa-solid fa-directions"></i>
                        <span>Buka di Google Maps</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
