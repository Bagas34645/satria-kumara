<x-public-layout :settings="$settings" title="Galeri - Satria Kumara">
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-amber-700">Dokumentasi</p>
        <h1 class="mt-3 text-4xl font-bold text-slate-900">Galeri Kegiatan</h1>
        <p class="mt-4 text-slate-600">Dokumentasi kegiatan pendidikan dan kebudayaan.</p>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($media as $item)
                <figure class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-stone-200">
                    <img src="{{ $item->file_path }}" alt="{{ $item->alt_text ?: $item->title }}" class="h-56 w-full object-cover">
                    <figcaption class="p-5">
                        <h2 class="font-semibold text-slate-900">{{ $item->title }}</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ $item->caption }}</p>
                    </figcaption>
                </figure>
            @empty
                <p class="text-slate-600">Belum ada media publik.</p>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $media->links() }}
        </div>
    </section>
</x-public-layout>
