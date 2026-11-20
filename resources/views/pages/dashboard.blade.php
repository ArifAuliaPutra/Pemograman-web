@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <span class="inline-block px-3 py-1 rounded-full bg-[#EBF3FA] text-[#3B6998] text-xs font-bold tracking-wide uppercase mb-3">Ringkasan</span>
    <h1 class="text-3xl sm:text-4xl font-extrabold text-[#2D3748] tracking-tight">Dashboard</h1>
    <p class="mt-2 text-[#8A94A6]">
        Selamat datang, <strong class="text-[#2D3748]">{{ $user->name }}</strong>. Ini ringkasan singkat aktivitas artikel kamu.
    </p>
</div>

<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">
    <div class="bg-white border border-[#E6E4DD] rounded-2xl p-6 shadow-[0_1px_3px_rgba(45,55,72,0.05)]">
        <div class="w-10 h-10 rounded-xl bg-[#EBF3FA] text-[#6C9BCF] flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h3 class="text-sm font-bold text-[#8A94A6] uppercase tracking-wide mb-1">Total Artikel</h3>
        <p class="text-4xl font-extrabold text-[#2D3748]">{{ $totalArticles }}</p>
        <p class="mt-2 text-xs text-[#8A94A6]">Jumlah seluruh artikel yang ada di sistem.</p>
    </div>

    <div class="bg-white border border-[#E6E4DD] rounded-2xl p-6 shadow-[0_1px_3px_rgba(45,55,72,0.05)]">
        <div class="w-10 h-10 rounded-xl bg-[#EBF3FA] text-[#6C9BCF] flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <h3 class="text-sm font-bold text-[#8A94A6] uppercase tracking-wide mb-1">Artikel Kamu</h3>
        <p class="text-4xl font-extrabold text-[#2D3748]">{{ $myArticles }}</p>
        <p class="mt-2 text-xs text-[#8A94A6]">Artikel yang dibuat oleh akun kamu.</p>
    </div>

    <div class="bg-white border border-[#E6E4DD] rounded-2xl p-6 shadow-[0_1px_3px_rgba(45,55,72,0.05)]">
        <h3 class="text-sm font-bold text-[#8A94A6] uppercase tracking-wide mb-4">Aksi Cepat</h3>
        <ul class="space-y-2.5 text-sm font-semibold">
            <li>
                <a href="{{ route('articles.create') }}" class="text-[#3B6998] hover:text-[#4A7C9B] transition-colors">+ Tambah Artikel Baru</a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}" class="text-[#3B6998] hover:text-[#4A7C9B] transition-colors">Lihat Semua Artikel</a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="text-[#3B6998] hover:text-[#4A7C9B] transition-colors">Lihat Halaman Home</a>
            </li>
        </ul>
    </div>
</div>

<div class="bg-white border border-[#E6E4DD] rounded-2xl shadow-[0_1px_3px_rgba(45,55,72,0.05)] p-6 sm:p-8 mb-8">
    <h2 class="text-xl font-extrabold text-[#2D3748] tracking-tight mb-5">Artikel Terbaru</h2>

    @if ($latestArticles->isNotEmpty())
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($latestArticles as $article)
                <a href="{{ route('articles.show', $article) }}"
                   class="group flex gap-3 p-3 rounded-xl border border-[#E6E4DD] hover:border-[#6C9BCF] hover:shadow-sm transition-all">
                    <img src="{{ $article->image_url }}"
                         alt="Thumbnail {{ $article->title }}"
                         class="w-20 h-16 object-cover rounded-lg shrink-0">
                    <div class="min-w-0">
                        <h4 class="text-sm font-bold text-[#2D3748] leading-snug group-hover:text-[#3B6998] transition-colors line-clamp-2">
                            {{ $article->title }}
                        </h4>
                        <p class="mt-1 text-xs text-[#8A94A6] font-medium">
                            {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-[#8A94A6] text-sm">Belum ada artikel yang bisa ditampilkan.</p>
    @endif
</div>

<div class="bg-white border border-[#E6E4DD] rounded-2xl shadow-[0_1px_3px_rgba(45,55,72,0.05)] p-6 sm:p-8">
    <h2 class="text-xl font-extrabold text-[#2D3748] tracking-tight mb-4">Info Akun</h2>
    <ul class="space-y-2 text-sm">
        <li><strong class="text-[#2D3748]">Nama:</strong> <span class="text-[#4A5568]">{{ $user->name }}</span></li>
        <li><strong class="text-[#2D3748]">Email:</strong> <span class="text-[#4A5568]">{{ $user->email }}</span></li>
    </ul>
    <p class="mt-4 text-sm text-[#8A94A6]">
        Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.
    </p>
</div>
@endsection
