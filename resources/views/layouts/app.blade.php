<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita') - Portal Berita</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; }
        .inline { display: inline; }
        .article-body { line-height: 1.85; color: #4A5568; font-size: 1.0625rem; }
        .article-body p { margin-bottom: 1.25rem; }

        /* Pagination (pagination::bootstrap-5) */
        .pagination { display: flex; gap: .4rem; list-style: none; padding: 0; margin: 1.5rem 0 0; flex-wrap: wrap; }
        .page-item .page-link {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 2.25rem; height: 2.25rem; padding: 0 .6rem;
            border: 1px solid #E6E4DD; border-radius: 10px;
            background: #fff; color: #4A5568; font-size: .875rem; font-weight: 600;
            text-decoration: none; transition: all .15s ease;
        }
        .page-item .page-link:hover { border-color: #6C9BCF; color: #3B6998; }
        .page-item.active .page-link { background: #6C9BCF; border-color: #6C9BCF; color: #fff; }
        .page-item.active .page-link:hover { background: #4A7C9B; border-color: #4A7C9B; }
        .page-item.disabled .page-link { opacity: .45; pointer-events: none; }
    </style>
</head>
<body class="bg-[#FAF9F6] text-[#4A5568] antialiased min-h-screen flex flex-col">
    @include('partials.nav')

    <main class="flex-1 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
        @yield('content')
    </main>

    <footer class="bg-[#1F3A52] mt-auto">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-sm flex flex-col sm:flex-row items-center justify-between gap-3">
            <span class="text-[#FAF9F6]/70">&copy; {{ date('Y') }} Portal Berita. Dibuat dengan Laravel.</span>
            <span class="font-semibold text-[#E08E79]">Baca, Tulis, Bagikan.</span>
        </div>
    </footer>
</body>
</html>
