<x-public-layout :settings="$settings" title="Kontak - Satria Kumara">
    <section class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-amber-700">Hubungi Kami</p>
            <h1 class="mt-3 text-4xl font-bold text-slate-900">Kontak Lembaga</h1>
            <p class="mt-4 text-slate-600">Gunakan informasi berikut untuk menghubungi pengelola Satria Kumara.</p>

            <dl class="mt-8 space-y-5 text-sm">
                <div>
                    <dt class="font-semibold text-slate-900">Alamat</dt>
                    <dd class="mt-1 text-slate-600">{{ $settings['contact_address'] ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-slate-900">Email</dt>
                    <dd class="mt-1 text-slate-600">{{ $settings['contact_email'] ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-slate-900">Telepon</dt>
                    <dd class="mt-1 text-slate-600">{{ $settings['contact_phone'] ?? '-' }}</dd>
                </div>
            </dl>
        </div>
        <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-stone-200">
            <h2 class="text-xl font-semibold text-slate-900">Form Kontak</h2>
            <p class="mt-2 text-sm text-slate-600">Form ini merupakan tampilan awal. Integrasi pengiriman pesan dapat ditambahkan pada tahap berikutnya.</p>
            <form class="mt-6 space-y-4">
                <input type="text" placeholder="Nama" class="w-full rounded-xl border-stone-300 focus:border-amber-600 focus:ring-amber-600">
                <input type="email" placeholder="Email" class="w-full rounded-xl border-stone-300 focus:border-amber-600 focus:ring-amber-600">
                <textarea rows="5" placeholder="Pesan" class="w-full rounded-xl border-stone-300 focus:border-amber-600 focus:ring-amber-600"></textarea>
                <button type="button" class="rounded-full bg-amber-700 px-5 py-3 text-sm font-semibold text-white">Kirim Pesan</button>
            </form>
        </div>
    </section>
</x-public-layout>
