@extends('layouts.app')

@section('title', 'Dashboard Kelola Menu - Admin Warung Mbak Puji')

@section('content')
<section class="py-10 bg-darkwood min-h-[85vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Top Header Dashboard -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900 border border-blue-500/20 p-6 rounded-3xl shadow-xl">
            <div>
                <span class="text-blue-400 text-xs font-bold uppercase tracking-wider">Dashboard Admin</span>
                <h1 class="font-heading font-black text-2xl text-white">Kelola Katalog Menu & Harga</h1>
                <p class="text-xs text-gray-400 mt-1">Tambah, edit, hapus, dan atur ketersediaan stok menu Mbak Puji</p>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.menu.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-extrabold text-xs px-5 py-3 rounded-xl shadow-lg shadow-blue-600/30 transition flex items-center space-x-2">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Menu Baru</span>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-slate-800 hover:bg-red-600 text-gray-300 hover:text-white text-xs font-bold px-4 py-3 rounded-xl border border-slate-700 transition" title="Logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Success Toast Alert -->
        @if(session('success'))
        <div class="bg-emerald-600/20 border border-emerald-500/30 text-emerald-300 text-xs p-4 rounded-2xl font-bold flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <!-- Stats Bar & Filter Search -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
            <div class="md:col-span-4 flex space-x-3">
                <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl flex-1 text-center">
                    <span class="text-[10px] text-gray-400 block font-bold">Total Item Menu</span>
                    <span class="font-heading font-black text-xl text-blue-400">{{ $totalItems }}</span>
                </div>
                <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl flex-1 text-center">
                    <span class="text-[10px] text-gray-400 block font-bold">Stok Ready</span>
                    <span class="font-heading font-black text-xl text-emerald-400">{{ $availableItems }}</span>
                </div>
            </div>

            <!-- Search Filter Form -->
            <div class="md:col-span-8">
                <form action="{{ route('admin.menu.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2">
                    <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama menu..." class="flex-1 bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                    <select name="category_id" class="bg-slate-900 border border-slate-800 rounded-xl px-3 py-2.5 text-xs text-gray-300 focus:outline-none focus:border-blue-500 transition">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $categoryId == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition">
                        Filter
                    </button>
                </form>
            </div>
        </div>

        <!-- Menu Table List -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-slate-950 text-blue-400 font-heading uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="px-6 py-4">Menu</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4">Status Stok</th>
                            <th class="px-6 py-4 text-right">Aksi (CRUD)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @forelse($menuItems as $m)
                        <tr class="hover:bg-slate-800/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-cover bg-center border border-slate-700 flex-shrink-0" style="background-image: url('{{ $m->image_url }}')"></div>
                                    <div>
                                        <div class="font-bold text-white text-xs flex items-center space-x-2">
                                            <span>{{ $m->name }}</span>
                                            @if($m->is_bestseller)
                                            <span class="bg-amber-500 text-black text-[9px] font-black px-1.5 py-0.2 rounded uppercase">Best</span>
                                            @endif
                                        </div>
                                        <span class="text-[10px] text-gray-500 line-clamp-1 max-w-xs">{{ $m->description }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-slate-950 text-blue-400 px-2.5 py-1 rounded-lg text-[10px] font-bold border border-blue-500/20">
                                    {{ $m->category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-heading font-bold text-white text-sm">
                                {{ $m->formatted_price }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.menu.toggle', $m->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if($m->is_available)
                                    <button type="submit" class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-3 py-1 rounded-full text-[10px] font-bold hover:bg-emerald-600 hover:text-white transition">
                                        ● Ready Stok
                                    </button>
                                    @else
                                    <button type="submit" class="bg-red-500/20 text-red-400 border border-red-500/30 px-3 py-1 rounded-full text-[10px] font-bold hover:bg-red-600 hover:text-white transition">
                                        ✕ Habis / Sold Out
                                    </button>
                                    @endif
                                </form>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.menu.edit', $m->id) }}" class="p-2 bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white rounded-lg border border-blue-500/30 transition text-xs" title="Edit Menu">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.menu.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu {{ addslashes($m->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-600/20 text-red-400 hover:bg-red-600 hover:text-white rounded-lg border border-red-500/30 transition text-xs" title="Hapus Menu">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                Belum ada menu yang terdaftar. Silakan klik "Tambah Menu Baru".
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-800">
                {{ $menuItems->links() }}
            </div>
        </div>

    </div>
</section>
@endsection
