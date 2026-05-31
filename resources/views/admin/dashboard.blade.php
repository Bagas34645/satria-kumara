<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard Admin</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-8 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif

            <div class="grid gap-4 md:grid-cols-5">
                @foreach ($stats as $label => $count)
                    <div class="rounded-xl bg-white p-6 shadow-sm">
                        <p class="text-sm font-medium text-gray-500">{{ $label }}</p>
                        <p class="mt-2 text-3xl font-bold text-amber-700">{{ $count }}</p>
                    </div>
                @endforeach
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Berita Terbaru</h3>
                    <a href="{{ route('admin.posts.create') }}" class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Tambah Berita</a>
                </div>
                <div class="mt-6 divide-y">
                    @forelse ($latestPosts as $post)
                        <div class="flex items-center justify-between py-3">
                            <div>
                                <p class="font-medium text-gray-900">{{ $post->title }}</p>
                                <p class="text-sm text-gray-500">{{ $post->is_published ? 'Published' : 'Draft' }}</p>
                            </div>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-sm font-semibold text-amber-700">Edit</a>
                        </div>
                    @empty
                        <p class="py-4 text-sm text-gray-500">Belum ada berita.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
