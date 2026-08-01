<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;

class EquipeController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::visible()->get();
        $boardMembers = $teamMembers->where('group', 'conseil_administration');
        $executiveMembers = $teamMembers->where('group', 'executif');

        return view('pages.equipe', compact('boardMembers', 'executiveMembers'));
    }
}
