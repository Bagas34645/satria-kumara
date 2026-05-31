<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $category->exists ? 'Edit Kategori' : 'Tambah Kategori' }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}" class="space-y-6 rounded-xl bg-white p-6 shadow-sm">
                @csrf
                @if ($category->exists)
                    @method('PUT')
                @endif
                <div>
                    <x-input-label for="name" value="Nama" />
                    <x-text-input id="name" name="name" class="mt-1 block w-full" value="{{ old('name', $category->name) }}" required />
                </div>
                <div>
                    <x-input-label for="slug" value="Slug" />
                    <x-text-input id="slug" name="slug" class="mt-1 block w-full" value="{{ old('slug', $category->slug) }}" />
                </div>
                <div>
                    <x-input-label for="description" value="Deskripsi" />
                    <x-text-input id="description" name="description" class="mt-1 block w-full" value="{{ old('description', $category->description) }}" />
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.categories.index') }}" class="rounded-lg border px-4 py-2 text-sm font-semibold">Batal</a>
                    <button class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
