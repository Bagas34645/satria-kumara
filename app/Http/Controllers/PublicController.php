<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        return view('public.home', [
            'featuredPages' => Page::query()->where('is_published', true)->latest()->take(3)->get(),
            'latestPosts' => Post::query()->where('is_published', true)->latest('published_at')->take(3)->get(),
            'gallery' => Media::query()->where('is_public', true)->latest()->take(6)->get(),
            'settings' => $this->settings(),
        ]);
    }

    public function page(string $slug): View
    {
        $page = Page::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('public.page', [
            'page' => $page,
            'settings' => $this->settings(),
        ]);
    }

    public function news(): View
    {
        return view('public.news.index', [
            'posts' => Post::query()
                ->with('category', 'author')
                ->where('is_published', true)
                ->when(request('q'), fn ($query, $search) => $query->where('title', 'like', "%{$search}%"))
                ->latest('published_at')
                ->paginate(9)
                ->withQueryString(),
            'categories' => Category::query()->orderBy('name')->get(),
            'settings' => $this->settings(),
        ]);
    }

    public function post(Post $post): View
    {
        abort_unless($post->is_published, 404);

        return view('public.news.show', [
            'post' => $post->load('category', 'tags', 'author'),
            'settings' => $this->settings(),
        ]);
    }

    public function gallery(): View
    {
        return view('public.gallery', [
            'media' => Media::query()->where('is_public', true)->latest()->paginate(12),
            'settings' => $this->settings(),
        ]);
    }

    public function contact(): View
    {
        return view('public.contact', [
            'settings' => $this->settings(),
        ]);
    }

    private function settings(): array
    {
        return Setting::query()->pluck('value', 'key')->all();
    }
}
