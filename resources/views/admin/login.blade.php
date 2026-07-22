@extends('layouts.app')

@section('title', 'Login Admin - Warung Penyetan & Soto Mbak Puji')

@section('content')
<section class="py-20 min-h-[75vh] flex items-center justify-center bg-grid-pattern">
    <div class="max-w-md w-full mx-auto px-4">
        <div class="bg-slate-900 border border-blue-500/30 rounded-3xl p-8 shadow-2xl space-y-6 backdrop-blur-md">
            
            <div class="text-center space-y-2">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl font-bold shadow-lg shadow-blue-600/30">
                    <i class="fa-solid fa-user-lock"></i>
                </div>
                <h1 class="font-heading font-extrabold text-2xl text-white">Login Admin Mbak Puji</h1>
                <p class="text-xs text-gray-400">Masuk untuk mengelola katalog menu & harga</p>
            </div>

            @if($errors->any())
            <div class="bg-red-500/20 border border-red-500/30 text-red-300 text-xs p-3.5 rounded-xl font-semibold">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-300 mb-1">Email Admin</label>
                    <input type="email" name="email" id="email" value="{{ old('email', 'admin@mbakpuji.com') }}" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" id="password" value="admin123" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="flex items-center justify-between text-xs text-gray-400">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="rounded bg-slate-950 border-slate-800 text-blue-600 focus:ring-0">
                        <span>Ingat Saya</span>
                    </label>
                    <span class="text-[11px] text-blue-400">Default: admin@mbakpuji.com / admin123</span>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-extrabold py-3.5 rounded-xl text-xs shadow-lg shadow-blue-600/30 transition">
                    Masuk Ke Dashboard Admin
                </button>
            </form>

        </div>
    </div>
</section>
@endsection
