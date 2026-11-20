@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
    <div>
        <span class="inline-block px-3 py-1 rounded-full bg-[#EBF3FA] text-[#3B6998] text-xs font-bold tracking-wide uppercase mb-3">Koleksi Berita</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#2D3748] tracking-tight">Daftar Artikel</h1>
        <p class="mt-2 text-[#8A94A6]">Jelajahi semua berita yang telah diterbitkan.</p>
    </div>
    <a href="{{ route('articles.create') }}"
       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#E08E79] text-white text-sm font-bold shadow-sm hover:bg-[#C9735C] transition-colors shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
        Artikel Baru
    </a>
</div>

@if (session('success'))
    <div class="bg-[#E7F6EC] border border-[#B7DFC3] text-[#276B3E] px-4 py-3 rounded-xl text-sm font-medium mb-6">
        {{ session('success') }}
    </div>
@endif

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
                        <span class="text-xs text-[#8A94A6] font-medium truncate">oleh {{ $article->user->name }}</span>
                    </div>

                    <h2 class="text-lg font-bold text-[#2D3748] leading-snug mb-2">
                        <a href="{{ route('articles.show', $article) }}" class="hover:text-[#3B6998] transition-colors">
                            {{ $article->title }}
                        </a>
                    </h2>

                    <p class="text-sm text-[#6B7280] leading-relaxed mb-4 flex-1">
                        {{ \Illuminate\Support\Str::limit($article->body, 110) }}
                    </p>

                    <div class="flex items-center justify-between gap-2 pt-4 border-t border-[#F1EFE9]">
                        <a href="{{ route('articles.show', $article) }}"
                           class="text-sm font-bold text-[#3B6998] hover:text-[#4A7C9B] transition-colors">
                            Baca Selengkapnya &rarr;
                        </a>

                        @if ($article->user_id === auth()->id())
                            <div class="flex items-center gap-1">
                                <a href="{{ route('articles.edit', $article) }}"
                                   class="px-3 py-1.5 rounded-lg text-xs font-bold text-[#4A5568] hover:bg-[#F1EFE9] transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('articles.destroy', $article) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1.5 rounded-lg text-xs font-bold text-[#C05656] hover:bg-[#FDECEA] transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    {{ $articles->links('pagination::bootstrap-5') }}
@else
    <div class="bg-white border border-[#E6E4DD] rounded-2xl p-12 text-center shadow-[0_1px_3px_rgba(45,55,72,0.05)]">
        <div class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-[#EBF3FA] text-[#6C9BCF] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
        </div>
        <h2 class="text-xl font-bold text-[#2D3748] mb-2">Belum ada artikel</h2>
        <p class="text-[#8A94A6] mb-6">Jadilah yang pertama menerbitkan berita.</p>
        <a href="{{ route('articles.create') }}"
           class="inline-flex px-5 py-2.5 rounded-xl bg-[#E08E79] text-white text-sm font-bold hover:bg-[#C9735C] transition-colors">
            Tulis Artikel Pertama
        </a>
    </div>
@endif
@endsection
