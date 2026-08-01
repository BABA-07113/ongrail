<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Opportunity;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles' => Article::count(),
            'projects' => Project::count(),
            'opportunities' => Opportunity::count(),
            'messages' => Contact::count(),
            'unreadMessages' => Contact::unread()->count(),
            'users' => User::count(),
            'recentArticles' => Article::latest()->take(5)->get(),
            'recentMessages' => Contact::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
