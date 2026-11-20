@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white border border-[#E6E4DD] rounded-2xl shadow-[0_1px_3px_rgba(45,55,72,0.05)] p-6 sm:p-8">
        <span class="inline-block px-3 py-1 rounded-full bg-[#EBF3FA] text-[#3B6998] text-xs font-bold tracking-wide uppercase mb-3">Akun Baru</span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#2D3748] tracking-tight mb-2">Register</h1>
        <p class="text-sm text-[#8A94A6] mb-8">Buat akun untuk mulai menulis berita.</p>

        <form method="POST" action="{{ url('/register') }}" novalidate class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-bold text-[#2D3748] mb-1.5">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E6E4DD] bg-[#FAF9F6] text-[#2D3748] placeholder-[#B6BDC9] text-sm focus:outline-none focus:ring-2 focus:ring-[#6C9BCF]/40 focus:border-[#6C9BCF] transition">
            </div>

            <div>
                <label for="email" class="block text-sm font-bold text-[#2D3748] mb-1.5">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E6E4DD] bg-[#FAF9F6] text-[#2D3748] placeholder-[#B6BDC9] text-sm focus:outline-none focus:ring-2 focus:ring-[#6C9BCF]/40 focus:border-[#6C9BCF] transition">
            </div>

            <div>
                <label for="password" class="block text-sm font-bold text-[#2D3748] mb-1.5">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E6E4DD] bg-[#FAF9F6] text-[#2D3748] placeholder-[#B6BDC9] text-sm focus:outline-none focus:ring-2 focus:ring-[#6C9BCF]/40 focus:border-[#6C9BCF] transition">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-[#2D3748] mb-1.5">Ulangi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E6E4DD] bg-[#FAF9F6] text-[#2D3748] placeholder-[#B6BDC9] text-sm focus:outline-none focus:ring-2 focus:ring-[#6C9BCF]/40 focus:border-[#6C9BCF] transition">
            </div>

            <button type="submit"
                    class="w-full px-6 py-2.5 rounded-xl bg-[#6C9BCF] text-white text-sm font-bold shadow-sm hover:bg-[#4A7C9B] transition-colors">
                Daftar
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-[#8A94A6]">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-bold text-[#3B6998] hover:text-[#4A7C9B]">Login</a>
        </p>
    </div>
</div>
@endsection
