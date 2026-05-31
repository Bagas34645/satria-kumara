@props(['settings' => [], 'title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $settings['site_tagline'] ?? 'Lembaga Pendidikan dan Kebudayaan Satria Kumara' }}">

        <title>{{ $title ?? ($settings['site_name'] ?? config('app.name')) }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-stone-50 font-sans text-slate-800 antialiased">
        <header class="border-b border-stone-200 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('home') }}" class="text-lg font-bold text-amber-800">
                    {{ $settings['site_name'] ?? 'Satria Kumara' }}
                </a>
                <nav class="hidden items-center gap-6 text-sm font-medium text-slate-700 md:flex">
                    <a href="{{ route('home') }}" class="hover:text-amber-700">Beranda</a>
                    <a href="{{ route('pages.show', 'tentang') }}" class="hover:text-amber-700">Tentang</a>
                    <a href="{{ route('pages.show', 'program') }}" class="hover:text-amber-700">Program</a>
                    <a href="{{ route('news.index') }}" class="hover:text-amber-700">Berita</a>
                    <a href="{{ route('gallery.index') }}" class="hover:text-amber-700">Galeri</a>
                    <a href="{{ route('contact') }}" class="hover:text-amber-700">Kontak</a>
                    <a href="{{ route('login') }}" class="rounded-full bg-amber-700 px-4 py-2 text-white hover:bg-amber-800">Admin</a>
                </nav>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer class="mt-20 border-t border-stone-200 bg-white">
            <div class="mx-auto grid max-w-7xl gap-6 px-4 py-10 sm:px-6 md:grid-cols-3 lg:px-8">
                <div>
                    <h2 class="font-bold text-amber-800">{{ $settings['site_name'] ?? 'Satria Kumara' }}</h2>
                    <p class="mt-2 text-sm text-slate-600">{{ $settings['site_tagline'] ?? 'Merawat pendidikan, kebudayaan, dan komunitas.' }}</p>
                </div>
                <div class="text-sm text-slate-600">
                    <p class="font-semibold text-slate-800">Kontak</p>
                    <p class="mt-2">{{ $settings['contact_address'] ?? '-' }}</p>
                    <p>{{ $settings['contact_email'] ?? '-' }}</p>
                    <p>{{ $settings['contact_phone'] ?? '-' }}</p>
                </div>
                <div class="text-sm text-slate-600">
                    <p class="font-semibold text-slate-800">Navigasi</p>
                    <div class="mt-2 flex flex-wrap gap-3">
                        <a href="{{ route('news.index') }}" class="hover:text-amber-700">Berita</a>
                        <a href="{{ route('gallery.index') }}" class="hover:text-amber-700">Galeri</a>
                        <a href="{{ route('contact') }}" class="hover:text-amber-700">Kontak</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
