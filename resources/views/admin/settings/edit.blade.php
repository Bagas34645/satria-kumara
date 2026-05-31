<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Pengaturan Situs</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6 rounded-xl bg-white p-6 shadow-sm">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="site_name" value="Nama Situs" />
                    <x-text-input id="site_name" name="site_name" class="mt-1 block w-full" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required />
                </div>
                <div>
                    <x-input-label for="site_tagline" value="Tagline" />
                    <x-text-input id="site_tagline" name="site_tagline" class="mt-1 block w-full" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}" />
                </div>
                <div>
                    <x-input-label for="contact_address" value="Alamat" />
                    <x-text-input id="contact_address" name="contact_address" class="mt-1 block w-full" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}" />
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <x-input-label for="contact_email" value="Email" />
                        <x-text-input id="contact_email" type="email" name="contact_email" class="mt-1 block w-full" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" />
                    </div>
                    <div>
                        <x-input-label for="contact_phone" value="Telepon" />
                        <x-text-input id="contact_phone" name="contact_phone" class="mt-1 block w-full" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" />
                    </div>
                </div>
                <div>
                    <x-input-label for="social_instagram" value="Instagram" />
                    <x-text-input id="social_instagram" name="social_instagram" class="mt-1 block w-full" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" />
                </div>
                <div class="flex justify-end">
                    <button class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-semibold text-white">Simpan Pengaturan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
