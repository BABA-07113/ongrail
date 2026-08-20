<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->paginate(15);
        return view('admin.equipe.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'nullable|max:255',
            'position' => 'required|max:255',
            'group' => 'required|in:conseil_administration,executif',
            'bio' => 'nullable',
            'sort_order' => 'nullable|integer',
            'is_visible' => 'nullable|boolean',
        ]);

        TeamMember::create($data);
        return redirect()->route('admin.equipe.index')->with('success', 'Membre ajouté avec succès.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.form', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'nullable|max:255',
            'position' => 'required|max:255',
            'group' => 'required|in:conseil_administration,executif',
            'bio' => 'nullable',
            'sort_order' => 'nullable|integer',
            'is_visible' => 'nullable|boolean',
        ]);

        $teamMember->update($data);
        return redirect()->route('admin.equipe.index')->with('success', 'Membre mis à jour.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return redirect()->route('admin.equipe.index')->with('success', 'Membre supprimé.');
    }
}
