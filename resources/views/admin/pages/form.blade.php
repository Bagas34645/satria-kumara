<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $page->exists ? 'Edit Halaman' : 'Tambah Halaman' }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ $page->exists ? route('admin.pages.update', $page) : route('admin.pages.store') }}" class="space-y-6 rounded-xl bg-white p-6 shadow-sm">
                @csrf
                @if ($page->exists)
                    @method('PUT')
                @endif

                <div>
                    <x-input-label for="title" value="Judul" />
                    <x-text-input id="title" name="title" class="mt-1 block w-full" value="{{ old('title', $page->title) }}" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="slug" value="Slug" />
                    <x-text-input id="slug" name="slug" class="mt-1 block w-full" value="{{ old('slug', $page->slug) }}" />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="excerpt" value="Ringkasan" />
                    <x-text-input id="excerpt" name="excerpt" class="mt-1 block w-full" value="{{ old('excerpt', $page->excerpt) }}" />
                </div>
                <div>
                    <x-input-label for="featured_image" value="URL Gambar Utama" />
                    <x-text-input id="featured_image" name="featured_image" class="mt-1 block w-full" value="{{ old('featured_image', $page->featured_image) }}" />
                </div>
                <div>
                    <x-input-label for="body" value="Konten" />
                    <textarea id="body" name="body" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('body', $page->body) }}</textarea>
                </div>
                <label class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $page->is_published)) class="rounded border-gray-300 text-amber-700 shadow-sm focus:ring-amber-600">
                    Published
                </label>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.pages.index') }}" class="rounded-lg border px-4 py-2 text-sm font-semibold">Batal</a>
                    <button class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
