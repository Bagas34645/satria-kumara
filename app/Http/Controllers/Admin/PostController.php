<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::query()->with('category', 'author')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.posts.form', [
            'post' => new Post(['is_published' => true, 'published_at' => now()]),
            'categories' => Category::query()->orderBy('name')->get(),
            'tags' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['user_id'] = $request->user()->id;

        $post = Post::create($data);
        $this->syncTags($post, $request->string('tags'));

        return redirect()->route('admin.posts.index')->with('status', 'Berita berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): RedirectResponse
    {
        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.form', [
            'post' => $post->load('tags'),
            'categories' => Category::query()->orderBy('name')->get(),
            'tags' => $post->tags->pluck('name')->implode(', '),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $post->update($this->validated($request));
        $this->syncTags($post, $request->string('tags'));

        return redirect()->route('admin.posts.index')->with('status', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Berita berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['is_published'] ? ($data['published_at'] ?? now()) : null;

        return $data;
    }

    private function syncTags(Post $post, string $tags): void
    {
        $tagIds = collect(explode(',', $tags))
            ->map(fn (string $tag) => trim($tag))
            ->filter()
            ->map(fn (string $tag) => Tag::firstOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag],
            )->id);

        $post->tags()->sync($tagIds);
    }
}
