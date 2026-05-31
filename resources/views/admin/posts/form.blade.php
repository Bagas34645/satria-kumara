<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $post->exists ? 'Edit Berita' : 'Tambah Berita' }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}" class="space-y-6 rounded-xl bg-white p-6 shadow-sm">
                @csrf
                @if ($post->exists)
                    @method('PUT')
                @endif
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <x-input-label for="title" value="Judul" />
                        <x-text-input id="title" name="title" class="mt-1 block w-full" value="{{ old('title', $post->title) }}" required />
                    </div>
                    <div>
                        <x-input-label for="slug" value="Slug" />
                        <x-text-input id="slug" name="slug" class="mt-1 block w-full" value="{{ old('slug', $post->slug) }}" />
                    </div>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <x-input-label for="category_id" value="Kategori" />
                        <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Tanpa kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-input-label for="published_at" value="Tanggal Publikasi" />
                        <x-text-input id="published_at" type="datetime-local" name="published_at" class="mt-1 block w-full" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}" />
                    </div>
                </div>
                <div>
                    <x-input-label for="excerpt" value="Ringkasan" />
                    <x-text-input id="excerpt" name="excerpt" class="mt-1 block w-full" value="{{ old('excerpt', $post->excerpt) }}" />
                </div>
                <div>
                    <x-input-label for="featured_image" value="URL Gambar Utama" />
                    <x-text-input id="featured_image" name="featured_image" class="mt-1 block w-full" value="{{ old('featured_image', $post->featured_image) }}" />
                </div>
                <div>
                    <x-input-label for="tags" value="Tag (pisahkan dengan koma)" />
                    <x-text-input id="tags" name="tags" class="mt-1 block w-full" value="{{ old('tags', $tags) }}" />
                </div>
                <div>
                    <x-input-label for="body" value="Isi Berita" />
                    <textarea id="body" name="body" rows="12" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('body', $post->body) }}</textarea>
                </div>
                <label class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published)) class="rounded border-gray-300 text-amber-700 shadow-sm focus:ring-amber-600">
                    Published
                </label>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.posts.index') }}" class="rounded-lg border px-4 py-2 text-sm font-semibold">Batal</a>
                    <button class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
