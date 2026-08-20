<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', '!=', 'brouillon')->orderBy('created_at', 'desc')->get();
        return view('pages.projects.index', compact('projects'));
    }
}
