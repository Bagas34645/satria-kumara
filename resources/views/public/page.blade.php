<x-public-layout :settings="$settings" :title="$page->title . ' - Satria Kumara'">
    <article class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-amber-700">Profil Lembaga</p>
        <h1 class="mt-3 text-4xl font-bold text-slate-900">{{ $page->title }}</h1>
        @if ($page->excerpt)
            <p class="mt-4 text-lg leading-8 text-slate-600">{{ $page->excerpt }}</p>
        @endif
        @if ($page->featured_image)
            <img src="{{ $page->featured_image }}" alt="{{ $page->title }}" class="mt-8 aspect-video w-full rounded-3xl object-cover">
        @endif
        <div class="prose prose-slate mt-10 max-w-none">
            {!! nl2br(e($page->body)) !!}
        </div>
    </article>
</x-public-layout>
