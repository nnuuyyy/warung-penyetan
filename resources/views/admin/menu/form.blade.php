@extends('layouts.app')

@section('title', ($isEdit ? 'Edit Menu' : 'Tambah Menu Baru') . ' - Admin Warung Mbak Puji')

@section('content')
<section class="py-12 bg-darkwood min-h-[85vh]">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Top Header Form -->
        <div class="flex items-center justify-between bg-slate-900 border border-blue-500/20 p-6 rounded-3xl shadow-xl">
            <div>
                <a href="{{ route('admin.menu.index') }}" class="text-xs text-blue-400 font-bold hover:text-blue-300 transition flex items-center space-x-1 mb-1">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali ke Dashboard</span>
                </a>
                <h1 class="font-heading font-black text-2xl text-white">
                    {{ $isEdit ? 'Edit Menu: ' . $item->name : 'Tambah Menu Baru' }}
                </h1>
            </div>
        </div>

        @if($errors->any())
        <div class="bg-red-500/20 border border-red-500/30 text-red-300 text-xs p-4 rounded-2xl font-bold">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Card -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl">
            <form action="{{ $isEdit ? route('admin.menu.update', $item->id) : route('admin.menu.store') }}" method="POST" class="space-y-6">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <!-- Name & Category -->
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                    <div class="sm:col-span-8">
                        <label for="name" class="block text-xs font-bold text-gray-300 mb-1">Nama Menu *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}" required placeholder="Contoh: Nasi Paha Bawah" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                    </div>

                    <div class="sm:col-span-4">
                        <label for="category_id" class="block text-xs font-bold text-gray-300 mb-1">Kategori *</label>
                        <select name="category_id" id="category_id" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-3 text-xs text-white focus:outline-none focus:border-blue-500 transition">
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $item->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-xs font-bold text-gray-300 mb-1">Harga (Rupiah) *</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3 text-xs font-bold text-gray-400">Rp</span>
                        <input type="number" name="price" id="price" value="{{ old('price', $item->price) }}" required min="0" placeholder="15000" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-10 pr-4 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-bold text-gray-300 mb-1">Deskripsi Menu</label>
                    <textarea name="description" id="description" rows="3" placeholder="Tulis rincian isi menu..." class="w-full bg-slate-950 border border-slate-800 rounded-xl p-4 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">{{ old('description', $item->description) }}</textarea>
                </div>

                <!-- Image URL -->
                <div>
                    <label for="image_url" class="block text-xs font-bold text-gray-300 mb-1">URL Gambar / Foto Menu</label>
                    <input type="url" name="image_url" id="image_url" value="{{ old('image_url', $item->image_url) }}" placeholder="https://images.unsplash.com/..." class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                    <span class="text-[10px] text-gray-500 block mt-1">Kosongkan untuk menggunakan gambar sampel otomatis.</span>
                </div>

                <!-- Checkboxes Flags -->
                <div class="pt-2 border-t border-slate-800 space-y-3">
                    <label class="flex items-center space-x-3 text-xs text-gray-300">
                        <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller', $item->is_bestseller) ? 'checked' : '' }} class="w-4 h-4 rounded bg-slate-950 border-slate-800 text-blue-600 focus:ring-0">
                        <span>Tandai sebagai <strong>Menu Best Seller ⭐</strong></span>
                    </label>

                    <label class="flex items-center space-x-3 text-xs text-gray-300">
                        <input type="checkbox" name="is_recommended" value="1" {{ old('is_recommended', $item->is_recommended) ? 'checked' : '' }} class="w-4 h-4 rounded bg-slate-950 border-slate-800 text-blue-600 focus:ring-0">
                        <span>Tandai sebagai <strong>Rekomendasi Mbak Puji</strong></span>
                    </label>

                    <label class="flex items-center space-x-3 text-xs text-gray-300">
                        <input type="checkbox" name="is_available" value="1" {{ old('is_available', $isEdit ? $item->is_available : true) ? 'checked' : '' }} class="w-4 h-4 rounded bg-slate-950 border-slate-800 text-emerald-500 focus:ring-0">
                        <span>Stok Ready / Tersedia (Dapat Dipesan)</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center space-x-3">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-extrabold py-3.5 px-8 rounded-xl text-xs shadow-lg shadow-blue-600/30 transition">
                        {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Menu Baru' }}
                    </button>
                    <a href="{{ route('admin.menu.index') }}" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-semibold py-3.5 px-6 rounded-xl text-xs transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</section>
@endsection
