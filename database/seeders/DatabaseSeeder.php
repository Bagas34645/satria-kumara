<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['label' => 'Administrator']);
        Role::firstOrCreate(['name' => 'editor'], ['label' => 'Editor']);

        $admin = User::updateOrCreate([
            'email' => 'admin@satriakumara.local',
        ], [
            'role_id' => $adminRole->id,
            'name' => 'Admin Satria Kumara',
            'password' => Hash::make('password'),
        ]);

        foreach ([
            'site_name' => 'Lembaga Pendidikan dan Kebudayaan Satria Kumara',
            'site_tagline' => 'Merawat pendidikan, kebudayaan, dan komunitas.',
            'contact_address' => 'Alamat lembaga belum diatur',
            'contact_email' => 'admin@satriakumara.local',
            'contact_phone' => '-',
            'social_instagram' => '-',
        ] as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        foreach ([
            ['title' => 'Tentang Lembaga', 'slug' => 'tentang', 'excerpt' => 'Profil singkat Lembaga Pendidikan dan Kebudayaan Satria Kumara.', 'body' => 'Satria Kumara adalah lembaga yang berfokus pada pendidikan, pelestarian kebudayaan, dan penguatan komunitas. Konten ini dapat diperbarui melalui dashboard admin.'],
            ['title' => 'Visi dan Misi', 'slug' => 'visi-misi', 'excerpt' => 'Arah dan nilai utama lembaga.', 'body' => 'Visi dan misi lembaga dapat ditulis lebih lengkap oleh pengelola melalui dashboard admin.'],
            ['title' => 'Program dan Layanan', 'slug' => 'program', 'excerpt' => 'Program pendidikan dan kebudayaan yang diselenggarakan lembaga.', 'body' => 'Daftar program, kelas, pelatihan, dan kegiatan kebudayaan dapat dikelola sebagai halaman konten.'],
        ] as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page + ['is_published' => true]);
        }

        $category = Category::firstOrCreate(
            ['slug' => 'kegiatan'],
            ['name' => 'Kegiatan', 'description' => 'Berita dan kabar kegiatan lembaga.'],
        );

        $tags = collect(['Pendidikan', 'Kebudayaan'])
            ->map(fn (string $name) => Tag::firstOrCreate(['slug' => str($name)->slug()], ['name' => $name]));

        $post = Post::updateOrCreate([
            'slug' => 'selamat-datang-di-website-satria-kumara',
        ], [
            'user_id' => $admin->id,
            'category_id' => $category->id,
            'title' => 'Selamat Datang di Website Satria Kumara',
            'excerpt' => 'Website resmi sebagai pusat informasi lembaga.',
            'body' => 'Ini adalah contoh berita pertama. Admin dapat mengganti atau menambahkan berita baru melalui dashboard.',
            'is_published' => true,
            'published_at' => now(),
        ]);

        $post->tags()->sync($tags->pluck('id'));

        foreach ([
            ['title' => 'Dokumentasi Kegiatan Pendidikan', 'file_path' => 'https://placehold.co/800x500?text=Pendidikan', 'caption' => 'Contoh dokumentasi kegiatan pendidikan.'],
            ['title' => 'Dokumentasi Kegiatan Kebudayaan', 'file_path' => 'https://placehold.co/800x500?text=Kebudayaan', 'caption' => 'Contoh dokumentasi kegiatan kebudayaan.'],
        ] as $media) {
            Media::updateOrCreate(['title' => $media['title']], $media + ['is_public' => true]);
        }
    }
}
