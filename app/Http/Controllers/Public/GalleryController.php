<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->orderBy('created_at', 'desc')->get();
        return view('pages.galleries.index', compact('galleries'));
    }

    public function show($slug)
    {
        $gallery = Gallery::with('images')->where('slug', $slug)->firstOrFail();
        return view('pages.galleries.show', compact('gallery'));
    }
}
