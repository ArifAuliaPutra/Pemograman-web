<header class="sticky top-0 z-40 bg-[#1F3A52] shadow-[0_2px_12px_rgba(31,58,82,0.25)]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0 group">
            <span class="w-9 h-9 rounded-xl bg-[#E08E79] text-white flex items-center justify-center shadow-sm group-hover:bg-[#C9735C] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
            </span>
            <span class="font-extrabold text-[#FAF9F6] text-lg tracking-tight">Portal<span class="text-[#E08E79]">Berita</span></span>
        </a>

        <nav class="flex items-center gap-1 sm:gap-2 overflow-x-auto" aria-label="Main Navigation">
            <a href="{{ route('home') }}"
               class="px-3 py-2 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('home') ? 'bg-[#E08E79] text-white' : 'text-[#FAF9F6]/75 hover:bg-white/10 hover:text-[#FAF9F6]' }}">
                Home
            </a>

            @auth
                <a href="{{ route('dashboard') }}"
                   class="px-3 py-2 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('dashboard') ? 'bg-[#E08E79] text-white' : 'text-[#FAF9F6]/75 hover:bg-white/10 hover:text-[#FAF9F6]' }}">
                    Dashboard
                </a>
                <a href="{{ route('articles.index') }}"
                   class="px-3 py-2 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('articles.*') ? 'bg-[#E08E79] text-white' : 'text-[#FAF9F6]/75 hover:bg-white/10 hover:text-[#FAF9F6]' }}">
                    Artikel
                </a>
            @endauth
        </nav>

        <div class="flex items-center gap-2 shrink-0">
            @auth
                <span class="hidden md:inline text-sm font-medium text-[#FAF9F6]/70">Hi, {{ auth()->user()->name }}</span>
                <a href="{{ route('articles.create') }}"
                   class="hidden sm:inline-flex items-center px-3.5 py-2 rounded-lg text-sm font-bold bg-[#E08E79] text-white hover:bg-[#C9735C] transition-colors">
                    + Tulis
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                            class="px-3.5 py-2 rounded-lg text-sm font-semibold text-[#FAF9F6]/80 border border-white/25 hover:bg-white/10 hover:text-white transition-colors">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}"
                   class="px-3.5 py-2 rounded-lg text-sm font-semibold text-[#FAF9F6]/80 hover:bg-white/10 hover:text-white transition-colors">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="px-3.5 py-2 rounded-lg text-sm font-bold bg-[#E08E79] text-white hover:bg-[#C9735C] shadow-sm transition-colors">
                    Daftar
                </a>
            @endguest
        </div>
    </div>
</header>
