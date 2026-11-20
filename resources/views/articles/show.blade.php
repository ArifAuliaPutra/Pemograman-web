@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="max-w-195 mx-auto">
    <a href="{{ route('articles.index') }}"
       class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#6C9BCF] hover:text-[#4A7C9B] transition-colors mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="m15 18-6-6 6-6"/></svg>
        Kembali ke semua artikel
    </a>

    <article class="bg-white border border-[#E6E4DD] rounded-2xl overflow-hidden shadow-[0_1px_3px_rgba(45,55,72,0.05)]">
        <img src="{{ $article->image_url }}"
             alt="Gambar untuk {{ $article->title }}"
             class="w-full max-h-105 object-cover">

        <div class="px-6 sm:px-10 py-8 sm:py-10">
            <div class="flex flex-wrap items-center gap-2 mb-5">
                <span class="px-3 py-1 rounded-full bg-[#EBF3FA] text-[#3B6998] text-xs font-bold">
                    {{ $article->created_at->format('d M Y') }}
                </span>
                <span class="text-sm text-[#8A94A6] font-medium">
                    oleh {{ $article->user->name }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold text-[#2D3748] leading-tight tracking-tight mb-8">
                {{ $article->title }}
            </h1>

            <div class="article-body">
                {!! nl2br(e($article->body)) !!}
            </div>

            <div class="mt-10 pt-6 border-t border-[#F1EFE9] flex flex-wrap items-center gap-3">
                <a href="{{ route('home') }}"
                   class="px-4 py-2 rounded-xl bg-[#EBF3FA] text-[#3B6998] text-sm font-bold hover:bg-[#DFEAF5] transition-colors">
                    &larr; Ke Home
                </a>
                <a href="{{ route('articles.index') }}"
                   class="px-4 py-2 rounded-xl border border-[#E6E4DD] text-[#4A5568] text-sm font-bold hover:border-[#6C9BCF] hover:text-[#3B6998] transition-colors">
                    Semua Artikel
                </a>
                @auth
                    @if ($article->user_id === auth()->id())
                        <a href="{{ route('articles.edit', $article) }}"
                           class="px-4 py-2 rounded-xl bg-[#E08E79] text-white text-sm font-bold hover:bg-[#C9735C] transition-colors">
                            Edit Artikel
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </article>
</div>
@endsection
