<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Kelola Galeri</h2>
            <a href="{{ route('admin.media.create') }}" class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Tambah Media</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif
            <div class="grid gap-6 md:grid-cols-3">
                @foreach ($media as $item)
                    <div class="overflow-hidden rounded-xl bg-white shadow-sm">
                        <img src="{{ $item->file_path }}" alt="{{ $item->alt_text ?: $item->title }}" class="h-44 w-full object-cover">
                        <div class="p-5">
                            <h3 class="font-semibold text-gray-900">{{ $item->title }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ $item->caption }}</p>
                            <a href="{{ route('admin.media.edit', $item) }}" class="mt-4 inline-block text-sm font-semibold text-amber-700">Edit</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $media->links() }}</div>
        </div>
    </div>
</x-app-layout>
