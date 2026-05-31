<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'Halaman' => Page::query()->count(),
                'Berita' => Post::query()->count(),
                'Kategori' => Category::query()->count(),
                'Galeri' => Media::query()->count(),
                'User' => User::query()->count(),
            ],
            'latestPosts' => Post::query()->latest()->take(5)->get(),
        ]);
    }
}
