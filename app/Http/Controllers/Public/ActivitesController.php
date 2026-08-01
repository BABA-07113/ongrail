<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class ActivitesController extends Controller
{
    public function index()
    {
        return view('pages.activites');
    }
}
