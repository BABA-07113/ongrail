<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->paginate(15);
        return view('admin.projets.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
            'objectives' => 'nullable',
            'results' => 'nullable',
            'featured_image' => 'nullable|max:255',
            'project_category_id' => 'nullable|exists:project_categories,id',
            'status' => 'required|in:en_cours,termine,planifie',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->title);
        Project::create($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.form', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
            'objectives' => 'nullable',
            'results' => 'nullable',
            'featured_image' => 'nullable|max:255',
            'project_category_id' => 'nullable|exists:project_categories,id',
            'status' => 'required|in:en_cours,termine,planifie',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->title);
        $project->update($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet mis à jour.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projets.index')->with('success', 'Projet supprimé.');
    }
}
