@extends('layouts.app')

@section('title', 'Tentang Warung Mbak Puji - penyetan.mbakpuji')

@section('content')
<section class="py-12 bg-slate-950 border-b border-blue-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-blue-400 text-xs font-bold uppercase tracking-widest">Tentang Mbak Puji</span>
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl text-white">Tentang Warung Mbak Puji</h1>
        <p class="text-xs sm:text-sm text-gray-400 max-w-xl mx-auto">
            Resep keluarga dengan dedikasi menyajikan cita rasa penyetan dan soto khas salatiga.
        </p>
    </div>
</section>

<section class="py-16 bg-darkwood">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <!-- Visual Story -->
        <div class="lg:col-span-6">
            <div class="relative">
                <div class="absolute -inset-2 bg-gradient-to-r from-blue-600 to-sky-500 rounded-3xl blur-xl opacity-30"></div>
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=800&q=80" alt="Suasana Warung Mbak Puji" class="relative rounded-3xl border border-blue-500/30 shadow-2xl w-full h-80 object-cover">
            </div>
        </div>

        <!-- Story Content -->
        <div class="lg:col-span-6 space-y-5">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-600/20 text-blue-400 text-xs font-bold border border-blue-500/30">
                <span>❤️ Penyetan & Soto Salatiga</span>
            </div>

            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white leading-tight">
                "Bumbu Rempah Segar & Sambal Ulek yang Tak Pernah Kompromi"
            </h2>

            <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                Di <strong class="text-white">Warung Penyetan & Soto Mbak Puji</strong>, kami percaya bahwa makanan yang lezat bersumber dari bahan-bahan paling segar dan ketulusan dalam mengolah bumbu. Setiap porsi penyetan kami disajikan dengan sambal ulek yang mantap.
            </p>

            <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                Kuah soto kami diracik dengan bumbu rempah pilihan yang direbus perlahan bersama kaldu ayam, menciptakan rasa gurih alami.
            </p>

            <div class="grid grid-cols-2 gap-4 pt-3 border-t border-slate-800">
                <div class="p-4 bg-slate-900 rounded-2xl border border-blue-500/20">
                    <h4 class="font-bold text-blue-400 text-xs">Resep Otentik</h4>
                    <p class="text-[11px] text-gray-400 mt-1">Bumbu ungkep rempah meresap mendalam ke tiap serat daging.</p>
                </div>
                <div class="p-4 bg-slate-900 rounded-2xl border border-blue-500/20">
                    <h4 class="font-bold text-blue-400 text-xs">Higienis & Segar</h4>
                    <p class="text-[11px] text-gray-400 mt-1">Bahan dipilah setiap hari tanpa pengawet buatan.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
