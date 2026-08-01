<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'published')
            ->whereNotNull('published_at');

        if ($search = $request->query('s')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $articles = $query->orderBy('published_at', 'desc')->paginate(9);

        $categories = Category::where('type', 'article')->get();
        $recentArticles = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        $archives = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get()
            ->groupBy(fn($a) => $a->published_at->format('Y-m'))
            ->map(fn($articles, $month) => (object) [
                'month' => $month,
                'label' => \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y'),
                'count' => $articles->count(),
            ])->values();

        return view('pages.articles.index', compact('articles', 'categories', 'recentArticles', 'archives'));
    }

    public function show($slug)
    {
        $article = Article::with('images')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $otherArticles = Article::where('id', '!=', $article->id)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $prevArticle = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<', $article->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        $nextArticle = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '>', $article->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        $recentArticles = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        $archives = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get()
            ->groupBy(fn($a) => $a->published_at->format('Y-m'))
            ->map(fn($articles, $month) => (object) [
                'month' => $month,
                'label' => \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y'),
                'count' => $articles->count(),
            ])->values();

        return view('pages.articles.show', compact('article', 'otherArticles', 'prevArticle', 'nextArticle', 'recentArticles', 'archives'));
    }

    public function category($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->where('type', 'article')->firstOrFail();

        $query = Article::where('category_id', $category->id)
            ->where('status', 'published')
            ->whereNotNull('published_at');

        if ($search = $request->query('s')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $articles = $query->orderBy('published_at', 'desc')->paginate(9);

        $categories = Category::where('type', 'article')->get();
        $recentArticles = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        $archives = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get()
            ->groupBy(fn($a) => $a->published_at->format('Y-m'))
            ->map(fn($articles, $month) => (object) [
                'month' => $month,
                'label' => \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y'),
                'count' => $articles->count(),
            ])->values();

        return view('pages.articles.index', compact('articles', 'categories', 'category', 'recentArticles', 'archives'));
    }

    public function archive($month)
    {
        $articles = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->whereYear('published_at', substr($month, 0, 4))
            ->whereMonth('published_at', substr($month, 5, 2))
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $categories = Category::where('type', 'article')->get();
        $recentArticles = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        $archives = Article::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get()
            ->groupBy(fn($a) => $a->published_at->format('Y-m'))
            ->map(fn($articles, $month) => (object) [
                'month' => $month,
                'label' => \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y'),
                'count' => $articles->count(),
            ])->values();

        return view('pages.articles.index', compact('articles', 'categories', 'recentArticles', 'archives'));
    }
}
