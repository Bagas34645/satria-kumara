<x-public-layout :settings="$settings" title="Beranda - Satria Kumara">
    <section class="bg-gradient-to-br from-amber-100 via-white to-stone-100">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-amber-700">Pendidikan dan Kebudayaan</p>
                <h1 class="mt-4 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                    {{ $settings['site_name'] ?? 'Lembaga Pendidikan dan Kebudayaan Satria Kumara' }}
                </h1>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    {{ $settings['site_tagline'] ?? 'Merawat pendidikan, kebudayaan, dan komunitas melalui program yang berdampak.' }}
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('pages.show', 'tentang') }}" class="rounded-full bg-amber-700 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-amber-800">Tentang Kami</a>
                    <a href="{{ route('news.index') }}" class="rounded-full border border-amber-700 px-5 py-3 text-sm font-semibold text-amber-800 hover:bg-amber-50">Lihat Berita</a>
                </div>
            </div>
            <div class="rounded-3xl bg-white p-8 shadow-xl ring-1 ring-stone-200">
                <h2 class="text-xl font-semibold text-slate-900">Fokus Lembaga</h2>
                <div class="mt-6 grid gap-4">
                    <div class="rounded-2xl bg-amber-50 p-5">
                        <h3 class="font-semibold text-amber-900">Company Profile</h3>
                        <p class="mt-2 text-sm text-slate-600">Memperkenalkan profil, visi-misi, dan layanan lembaga.</p>
                    </div>
                    <div class="rounded-2xl bg-stone-100 p-5">
                        <h3 class="font-semibold text-stone-900">Portal Berita</h3>
                        <p class="mt-2 text-sm text-slate-600">Mempublikasikan kegiatan, informasi, dan kabar terbaru.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-amber-700">Profil</p>
                <h2 class="mt-2 text-3xl font-bold text-slate-900">Informasi Lembaga</h2>
            </div>
        </div>
        <div class="mt-8 grid gap-6 md:grid-cols-3">
            @foreach ($featuredPages as $page)
                <a href="{{ route('pages.show', $page->slug) }}" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-stone-200 hover:shadow-md">
                    <h3 class="font-semibold text-slate-900">{{ $page->title }}</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $page->excerpt }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-amber-700">Berita</p>
                    <h2 class="mt-2 text-3xl font-bold text-slate-900">Kabar Terbaru</h2>
                </div>
                <a href="{{ route('news.index') }}" class="text-sm font-semibold text-amber-700 hover:text-amber-900">Semua berita</a>
            </div>
            <div class="mt-8 grid gap-6 md:grid-cols-3">
                @forelse ($latestPosts as $post)
                    <article class="rounded-2xl border border-stone-200 p-6">
                        <p class="text-xs font-semibold uppercase tracking-wide text-amber-700">{{ $post->published_at?->format('d M Y') }}</p>
                        <h3 class="mt-3 text-lg font-semibold text-slate-900">
                            <a href="{{ route('news.show', $post) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                    </article>
                @empty
                    <p class="text-slate-600">Belum ada berita yang dipublikasikan.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-public-layout>
