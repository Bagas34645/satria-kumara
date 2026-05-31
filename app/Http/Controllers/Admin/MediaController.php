<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.media.index', [
            'media' => Media::query()->latest()->paginate(12),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.media.form', [
            'medium' => new Media(['is_public' => true]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Media::create($this->validated($request));

        return redirect()->route('admin.media.index')->with('status', 'Media berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $medium): RedirectResponse
    {
        return redirect()->route('admin.media.edit', $medium);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $medium): View
    {
        return view('admin.media.form', compact('medium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $medium): RedirectResponse
    {
        $medium->update($this->validated($request));

        return redirect()->route('admin.media.index')->with('status', 'Media berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $medium): RedirectResponse
    {
        $medium->delete();

        return redirect()->route('admin.media.index')->with('status', 'Media berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'file_path' => ['required', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:255'],
            'is_public' => ['nullable', 'boolean'],
        ]);

        $data['is_public'] = $request->boolean('is_public');

        return $data;
    }
}
