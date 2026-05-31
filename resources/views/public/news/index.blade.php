<x-public-layout :settings="$settings" title="Berita - Satria Kumara">
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-amber-700">Portal Berita</p>
                <h1 class="mt-3 text-4xl font-bold text-slate-900">Berita dan Kegiatan</h1>
                <p class="mt-4 text-slate-600">Kabar terbaru dari Lembaga Pendidikan dan Kebudayaan Satria Kumara.</p>
            </div>
            <form method="GET" action="{{ route('news.index') }}" class="flex gap-2">
                <input name="q" value="{{ request('q') }}" placeholder="Cari berita..." class="rounded-full border-stone-300 text-sm shadow-sm focus:border-amber-600 focus:ring-amber-600">
                <button class="rounded-full bg-amber-700 px-5 py-2 text-sm font-semibold text-white hover:bg-amber-800">Cari</button>
            </form>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @forelse ($posts as $post)
                <article class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-stone-200">
                    @if ($post->featured_image)
                        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="h-48 w-full object-cover">
                    @endif
                    <div class="p-6">
                        <p class="text-xs font-semibold uppercase tracking-wide text-amber-700">{{ $post->category?->name ?? 'Berita' }}</p>
                        <h2 class="mt-3 text-xl font-semibold text-slate-900">
                            <a href="{{ route('news.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                        <p class="mt-5 text-xs text-slate-500">{{ $post->published_at?->format('d M Y') }} oleh {{ $post->author?->name }}</p>
                    </div>
                </article>
            @empty
                <p class="text-slate-600">Belum ada berita yang sesuai.</p>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </section>
</x-public-layout>
