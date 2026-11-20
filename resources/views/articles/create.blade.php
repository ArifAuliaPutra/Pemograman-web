@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="max-w-2xl mx-auto">
    <a href="{{ route('articles.index') }}"
       class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#6C9BCF] hover:text-[#4A7C9B] transition-colors mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="m15 18-6-6 6-6"/></svg>
        Kembali ke daftar artikel
    </a>

    <div class="bg-white border border-[#E6E4DD] rounded-2xl shadow-[0_1px_3px_rgba(45,55,72,0.05)] p-6 sm:p-8">
        <span class="inline-block px-3 py-1 rounded-full bg-[#EBF3FA] text-[#3B6998] text-xs font-bold tracking-wide uppercase mb-3">Formulir Baru</span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#2D3748] tracking-tight mb-2">Tambah Artikel / Berita</h1>
        <p class="text-sm text-[#8A94A6] mb-8">
            Isi formulir di bawah untuk menambahkan berita baru. Gambar menggunakan
            URL (opsional); jika kosong, sistem memakai placeholder online.
        </p>

        @if ($errors->any())
            <div class="bg-[#FDECEA] border border-[#F5C2BD] text-[#A33A32] px-4 py-3 rounded-xl text-sm mb-6">
                <strong class="font-bold">Terjadi kesalahan:</strong>
                <ul class="list-disc list-inside mt-1 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-sm font-bold text-[#2D3748] mb-1.5">Judul Artikel</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       required placeholder="Masukkan judul berita"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E6E4DD] bg-[#FAF9F6] text-[#2D3748] placeholder-[#B6BDC9] text-sm focus:outline-none focus:ring-2 focus:ring-[#6C9BCF]/40 focus:border-[#6C9BCF] transition">
            </div>

            <div>
                <label for="image" class="block text-sm font-bold text-[#2D3748] mb-1.5">URL Gambar (opsional)</label>
                <input type="url" id="image" name="image" value="{{ old('image') }}"
                       placeholder="https://example.com/gambar.jpg"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E6E4DD] bg-[#FAF9F6] text-[#2D3748] placeholder-[#B6BDC9] text-sm focus:outline-none focus:ring-2 focus:ring-[#6C9BCF]/40 focus:border-[#6C9BCF] transition">
                <p class="mt-1.5 text-xs text-[#8A94A6]">
                    Jika dikosongkan, sistem memakai gambar placeholder dari
                    <code class="bg-[#EBF3FA] text-[#3B6998] px-1.5 py-0.5 rounded">picsum.photos</code>.
                </p>
            </div>

            <div>
                <label for="body" class="block text-sm font-bold text-[#2D3748] mb-1.5">Isi Berita</label>
                <textarea id="body" name="body" rows="10" required
                          placeholder="Tulis isi berita di sini..."
                          class="w-full px-4 py-2.5 rounded-xl border border-[#E6E4DD] bg-[#FAF9F6] text-[#2D3748] placeholder-[#B6BDC9] text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#6C9BCF]/40 focus:border-[#6C9BCF] transition resize-y">{{ old('body') }}</textarea>
            </div>

            <div class="flex flex-wrap items-center gap-3 pt-2">
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-[#6C9BCF] text-white text-sm font-bold shadow-sm hover:bg-[#4A7C9B] transition-colors">
                    Simpan Artikel
                </button>
                <a href="{{ route('articles.index') }}"
                   class="px-6 py-2.5 rounded-xl border border-[#E6E4DD] text-[#4A5568] text-sm font-bold hover:border-[#6C9BCF] hover:text-[#3B6998] transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
