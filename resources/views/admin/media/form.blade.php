<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $medium->exists ? 'Edit Media' : 'Tambah Media' }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ $medium->exists ? route('admin.media.update', $medium) : route('admin.media.store') }}" class="space-y-6 rounded-xl bg-white p-6 shadow-sm">
                @csrf
                @if ($medium->exists)
                    @method('PUT')
                @endif
                <div>
                    <x-input-label for="title" value="Judul" />
                    <x-text-input id="title" name="title" class="mt-1 block w-full" value="{{ old('title', $medium->title) }}" required />
                </div>
                <div>
                    <x-input-label for="file_path" value="URL / Path Gambar" />
                    <x-text-input id="file_path" name="file_path" class="mt-1 block w-full" value="{{ old('file_path', $medium->file_path) }}" required />
                </div>
                <div>
                    <x-input-label for="alt_text" value="Alt Text" />
                    <x-text-input id="alt_text" name="alt_text" class="mt-1 block w-full" value="{{ old('alt_text', $medium->alt_text) }}" />
                </div>
                <div>
                    <x-input-label for="caption" value="Caption" />
                    <x-text-input id="caption" name="caption" class="mt-1 block w-full" value="{{ old('caption', $medium->caption) }}" />
                </div>
                <label class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="is_public" value="1" @checked(old('is_public', $medium->is_public)) class="rounded border-gray-300 text-amber-700 shadow-sm focus:ring-amber-600">
                    Tampilkan di website
                </label>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.media.index') }}" class="rounded-lg border px-4 py-2 text-sm font-semibold">Batal</a>
                    <button class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
