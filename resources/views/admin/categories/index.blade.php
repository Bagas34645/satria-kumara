<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Kelola Kategori</h2>
            <a href="{{ route('admin.categories.create') }}" class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Tambah Kategori</a>
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
                        <tr><th class="p-4">Nama</th><th class="p-4">Slug</th><th class="p-4">Deskripsi</th><th class="p-4"></th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="p-4 font-medium text-gray-900">{{ $category->name }}</td>
                                <td class="p-4 text-gray-600">{{ $category->slug }}</td>
                                <td class="p-4 text-gray-600">{{ $category->description }}</td>
                                <td class="p-4 text-right"><a href="{{ route('admin.categories.edit', $category) }}" class="font-semibold text-amber-700">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6">{{ $categories->links() }}</div>
        </div>
    </div>
</x-app-layout>
