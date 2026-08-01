<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\Page;

class AboutController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'a-propos')->where('is_published', true)->first();
        $teamMembers = TeamMember::visible()->get();
        $boardMembers = $teamMembers->where('group', 'conseil_administration');
        $executiveMembers = $teamMembers->where('group', 'executif');

        return view('pages.about', compact('page', 'boardMembers', 'executiveMembers'));
    }
}
