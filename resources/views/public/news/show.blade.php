<x-public-layout :settings="$settings" :title="$post->title . ' - Satria Kumara'">
    <article class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:px-8">
        <a href="{{ route('news.index') }}" class="text-sm font-semibold text-amber-700 hover:text-amber-900">Kembali ke berita</a>
        <p class="mt-8 text-sm font-semibold uppercase tracking-wide text-amber-700">{{ $post->category?->name ?? 'Berita' }}</p>
        <h1 class="mt-3 text-4xl font-bold text-slate-900">{{ $post->title }}</h1>
        <p class="mt-4 text-sm text-slate-500">{{ $post->published_at?->format('d M Y') }} oleh {{ $post->author?->name }}</p>
        @if ($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="mt-8 aspect-video w-full rounded-3xl object-cover">
        @endif
        <div class="prose prose-slate mt-10 max-w-none">
            {!! nl2br(e($post->body)) !!}
        </div>
        @if ($post->tags->isNotEmpty())
            <div class="mt-10 flex flex-wrap gap-2">
                @foreach ($post->tags as $tag)
                    <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-900">{{ $tag->name }}</span>
                @endforeach
            </div>
        @endif
    </article>
</x-public-layout>
