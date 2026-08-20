<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::latest()->paginate(15);
        return view('admin.ressources.index', compact('resources'));
    }

    public function create()
    {
        return view('admin.resources.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'file_path' => 'required|max:255',
            'file_type' => 'nullable|max:50',
            'category' => 'nullable|in:guide,rapport,etude,support,manuel',
            'is_published' => 'nullable|boolean',
        ]);

        Resource::create($data);
        return redirect()->route('admin.ressources.index')->with('success', 'Ressource créée avec succès.');
    }

    public function edit(Resource $resource)
    {
        return view('admin.resources.form', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'file_path' => 'required|max:255',
            'file_type' => 'nullable|max:50',
            'category' => 'nullable|in:guide,rapport,etude,support,manuel',
            'is_published' => 'nullable|boolean',
        ]);

        $resource->update($data);
        return redirect()->route('admin.ressources.index')->with('success', 'Ressource mise à jour.');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('admin.ressources.index')->with('success', 'Ressource supprimée.');
    }
}
