<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Opportunity;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();

        $projects = Project::where('is_featured', true)
            ->orWhere('status', 'en_cours')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $testimonials = Testimonial::visible()->take(4)->get();
        $partners = Partner::visible()->get();
        $opportunities = Opportunity::where('is_published', true)->latest()->take(3)->get();

        return view('pages.home', compact(
            'articles', 'projects', 'testimonials', 'partners', 'opportunities'
        ));
    }
}
