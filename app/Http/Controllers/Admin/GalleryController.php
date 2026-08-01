<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::withCount('images')->latest()->paginate(15);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'cover_image' => 'nullable|max:255',
        ]);

        $data['slug'] = Str::slug($request->title);
        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Album créé avec succès.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'cover_image' => 'nullable|max:255',
        ]);

        $data['slug'] = Str::slug($request->title);
        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Album mis à jour.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->images()->delete();
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Album supprimé.');
    }

    public function images(Gallery $gallery)
    {
        return view('admin.galleries.images', compact('gallery'));
    }

    public function uploadImage(Request $request, Gallery $gallery)
    {
        $request->validate([
            'images.*' => 'required|image|max:5120',
        ]);

        foreach ($request->file('images', []) as $image) {
            $path = $image->store('galleries', 'public');
            $gallery->images()->create([
                'image' => $path,
                'caption' => $request->input('caption'),
            ]);
        }

        return back()->with('success', 'Images ajoutées avec succès.');
    }

    public function deleteImage(GalleryImage $image)
    {
        $image->delete();
        return back()->with('success', 'Image supprimée.');
    }
}
