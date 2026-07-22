@extends('layouts.app')

@section('title', 'Daftar Menu & Harga - Warung Penyetan & Soto Mbak Puji')

@section('content')
<!-- Header Banner Menu Blue Style -->
<section class="py-12 bg-slate-950 border-b border-blue-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-blue-500 text-xs font-extrabold uppercase tracking-widest">Resmi @penyetan.mbakpuji</span>
        <h1 class="font-heading font-black text-4xl sm:text-5xl text-white tracking-tight uppercase">DAFTAR MENU</h1>
        <p class="text-xs sm:text-sm text-gray-400 max-w-xl mx-auto">
            Buka 17.00 - 01.00 WIB • Makan Ditempat, Bungkus, Delivery & Online Food
        </p>

        <!-- Search Bar -->
        <form action="{{ route('menu.index') }}" method="GET" class="max-w-xl mx-auto pt-4 flex items-center space-x-2">
            <input type="hidden" name="category" value="{{ $selectedCategory }}">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-3.5 text-gray-500 text-sm"></i>
                <input type="text" name="q" value="{{ $searchQuery }}" placeholder="Cari menu: Nasi Paha, Soto, Lele, Teh..." class="w-full bg-slate-900 border border-slate-800 rounded-2xl pl-11 pr-4 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-3 rounded-2xl text-xs transition">
                Cari
            </button>
        </form>
    </div>
</section>

<!-- Category Filter Tabs & Item Grid -->
<section class="py-16 bg-darkwood">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- Category Filter Tabs -->
        <div class="flex items-center space-x-2 overflow-x-auto pb-3 border-b border-slate-800 scrollbar-none">
            <a href="{{ route('menu.index', ['category' => 'all', 'q' => $searchQuery]) }}" class="px-5 py-2.5 rounded-xl text-xs font-bold whitespace-nowrap transition {{ $selectedCategory === 'all' ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-slate-900 text-gray-400 hover:text-white' }}">
                🔥 Semua Menu
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('menu.index', ['category' => $cat->slug, 'q' => $searchQuery]) }}" class="px-5 py-2.5 rounded-xl text-xs font-bold whitespace-nowrap transition flex items-center space-x-2 {{ $selectedCategory === $cat->slug ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-slate-900 text-gray-400 hover:text-white' }}">
                <i class="fa-solid {{ $cat->icon }}"></i>
                <span>{{ $cat->name }}</span>
            </a>
            @endforeach
        </div>

        <!-- Menu Grid -->
        @if($items->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
            <div class="bg-slate-900/90 rounded-2xl border border-blue-500/20 p-5 space-y-4 hover:border-blue-500/50 transition duration-300 flex flex-col justify-between shadow-xl group">
                <div class="space-y-3">
                    <div class="flex justify-between items-start">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-blue-400 bg-blue-950 px-2.5 py-1 rounded-lg border border-blue-500/30">
                            {{ $item->category->name }}
                        </span>
                        <span class="font-heading font-black text-lg text-blue-400">{{ $item->formatted_price }}</span>
                    </div>

                    <h3 class="font-heading font-bold text-lg text-white group-hover:text-blue-400 transition leading-snug">{{ $item->name }}</h3>
                    <p class="text-xs text-gray-400 leading-relaxed line-clamp-2">{{ $item->description }}</p>
                </div>

                <div class="pt-3 border-t border-slate-800 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-gray-500">Mbak Puji Menu</span>
                    </div>

                    <button onclick="addToCart({ id: {{ $item->id }}, name: '{{ addslashes($item->name) }}', price: {{ $item->price }}, image_url: '{{ $item->image_url }}' })" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-bold py-2 px-4 rounded-xl text-xs shadow transition flex items-center space-x-1.5">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah</span>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20 bg-slate-900 rounded-3xl border border-slate-800 space-y-4">
            <div class="text-4xl">🔍</div>
            <h3 class="font-bold text-white text-lg">Menu Tidak Ditemukan</h3>
            <p class="text-xs text-gray-400">Maaf, menu dengan kata kunci "{{ $searchQuery }}" tidak ditemukan.</p>
            <a href="{{ route('menu.index') }}" class="inline-block bg-blue-600 text-white text-xs font-bold px-5 py-2.5 rounded-xl">
                Reset Filter
            </a>
        </div>
        @endif

    </div>
</section>
@endsection
