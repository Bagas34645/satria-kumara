<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Kelola Berita</h2>
            <a href="{{ route('admin.posts.create') }}" class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Tambah Berita</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif
            <div class="overflow-hidden rounded-xl bg-white shadow-sm">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50 text-left font-semibold text-gray-600">
                        <tr><th class="p-4">Judul</th><th class="p-4">Kategori</th><th class="p-4">Status</th><th class="p-4">Tanggal</th><th class="p-4"></th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="p-4 font-medium text-gray-900">{{ $post->title }}</td>
                                <td class="p-4 text-gray-600">{{ $post->category?->name ?? '-' }}</td>
                                <td class="p-4">{{ $post->is_published ? 'Published' : 'Draft' }}</td>
                                <td class="p-4 text-gray-600">{{ $post->published_at?->format('d M Y') ?? '-' }}</td>
                                <td class="p-4 text-right"><a href="{{ route('admin.posts.edit', $post) }}" class="font-semibold text-amber-700">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6">{{ $posts->links() }}</div>
        </div>
    </div>
</x-app-layout>
