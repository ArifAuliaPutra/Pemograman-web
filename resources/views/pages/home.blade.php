@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="max-w-3xl mb-12">
    <span class="inline-block px-3 py-1 rounded-full bg-[#EBF3FA] text-[#3B6998] text-xs font-bold tracking-wide uppercase mb-4">Portal Berita</span>
    <h1 class="text-4xl sm:text-5xl font-extrabold text-[#2D3748] tracking-tight leading-tight mb-4">
        Portal Berita Sederhana
    </h1>
    <p class="text-lg text-[#6B7280] leading-relaxed">
        Selamat datang di portal berita sederhana berbasis Laravel.
        Berita di bawah ini diambil dari tabel <code class="bg-[#EBF3FA] text-[#3B6998] px-1.5 py-0.5 rounded text-sm">articles</code>.
    </p>

    @guest
        <div class="mt-6 flex flex-wrap items-center gap-3">
            <p class="text-sm text-[#8A94A6]">Kamu belum login. Untuk mengelola berita:</p>
            <a href="{{ route('login') }}"
               class="px-4 py-2 rounded-xl bg-[#6C9BCF] text-white text-sm font-bold hover:bg-[#4A7C9B] transition-colors">Login</a>
            <a href="{{ route('register') }}"
               class="px-4 py-2 rounded-xl bg-[#E08E79] text-white text-sm font-bold hover:bg-[#C9735C] transition-colors">Register</a>
        </div>
    @endguest

    @auth
        <p class="mt-6 text-sm text-[#8A94A6]">
            Kamu login sebagai <strong class="text-[#2D3748]">{{ auth()->user()->name }}</strong>.
            Kelola berita kamu di menu
            <a href="{{ route('articles.index') }}" class="font-bold text-[#3B6998] hover:text-[#4A7C9B]">Artikel</a>.
        </p>
    @endauth
</section>

<section>
    <div class="flex items-end justify-between mb-6">
        <h2 class="text-2xl font-extrabold text-[#2D3748] tracking-tight">Berita Terbaru</h2>
        <a href="{{ route('articles.index') }}" class="text-sm font-bold text-[#3B6998] hover:text-[#4A7C9B] transition-colors">
            Lihat semua &rarr;
        </a>
    </div>

    @if ($articles->isNotEmpty())
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)
                <article class="group bg-white border border-[#E6E4DD] rounded-2xl overflow-hidden shadow-[0_1px_3px_rgba(45,55,72,0.05)] hover:shadow-[0_8px_24px_rgba(45,55,72,0.08)] hover:-translate-y-0.5 transition-all duration-200 flex flex-col">
                    <a href="{{ route('articles.show', $article) }}" class="block overflow-hidden">
                        <img src="{{ $article->image_url }}"
                             alt="Gambar {{ $article->title }}"
                             class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300">
                    </a>

                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 rounded-full bg-[#EBF3FA] text-[#3B6998] text-xs font-bold">
                                {{ $article->created_at->format('d M Y') }}
                            </span>
                            <span class="text-xs text-[#8A94A6] font-medium truncate">{{ $article->user->name }}</span>
                        </div>

                        <h3 class="text-lg font-bold text-[#2D3748] leading-snug mb-2">
                            <a href="{{ route('articles.show', $article) }}" class="hover:text-[#3B6998] transition-colors">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="text-sm text-[#6B7280] leading-relaxed mb-4 flex-1">
                            {{ \Illuminate\Support\Str::limit($article->body, 110) }}
                        </p>

                        <a href="{{ route('articles.show', $article) }}"
                           class="text-sm font-bold text-[#3B6998] hover:text-[#4A7C9B] transition-colors">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="bg-white border border-[#E6E4DD] rounded-2xl p-10 text-center shadow-[0_1px_3px_rgba(45,55,72,0.05)]">
            <p class="text-[#8A94A6]">
                Belum ada berita yang tersedia.
                @auth
                    Silakan buat berita baru di menu
                    <a href="{{ route('articles.create') }}" class="font-bold text-[#3B6998] hover:text-[#4A7C9B]">Tambah Artikel</a>.
                @endauth
            </p>
        </div>
    @endif
</section>
@endsection
