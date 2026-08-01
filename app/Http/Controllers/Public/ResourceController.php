<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function index()
    {
        $categories = Resource::where('is_published', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        $resources = Resource::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pages.resources.index', compact('resources', 'categories'));
    }

    public function category($category)
    {
        $allCategories = Resource::where('is_published', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        $resources = Resource::where('category', $category)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pages.resources.index', compact('resources', 'categories', 'category'));
    }

    public function download($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->increment('download_count');
        return response()->download(storage_path('app/public/' . $resource->file_path));
    }
}
