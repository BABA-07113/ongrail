<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'user')->latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::where('type', 'article')->get();
        return view('admin.articles.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable',
            'featured_image' => ['nullable', 'string', 'max:255', function ($attribute, $value, $fail) {
                if ($value !== null && $value !== '' && !filter_var($value, FILTER_VALIDATE_URL) && !str_starts_with($value, '/')) {
                    $fail('L\'image à la une doit être une URL valide ou un chemin local.');
                }
            }],
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = auth()->id();

        if ($request->status === 'published' && !$request->published_at) {
            $data['published_at'] = now();
        }

        $article = Article::create($data);

        if ($request->hasFile('featured_image_file')) {
            $path = $request->file('featured_image_file')->store('articles', 'public');
            $article->update(['featured_image' => Storage::url($path)]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('articles', 'public');
                $article->images()->create([
                    'image' => Storage::url($path),
                    'sort_order' => $article->images()->max('sort_order') + 1 + $i,
                ]);
            }
        }

        return redirect()->route('admin.articles.index')->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article)
    {
        $categories = Category::where('type', 'article')->get();
        $article->load('images');
        return view('admin.articles.form', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable',
            'featured_image' => ['nullable', 'string', 'max:255', function ($attribute, $value, $fail) {
                if ($value !== null && $value !== '' && !filter_var($value, FILTER_VALIDATE_URL) && !str_starts_with($value, '/')) {
                    $fail('L\'image à la une doit être une URL valide ou un chemin local.');
                }
            }],
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->status === 'published' && !$article->published_at) {
            $data['published_at'] = now();
        }

        $article->update($data);

        if ($request->hasFile('featured_image_file')) {
            $path = $request->file('featured_image_file')->store('articles', 'public');
            $article->update(['featured_image' => Storage::url($path)]);
        }

        if ($request->hasFile('images')) {
            $maxSort = $article->images()->max('sort_order') ?? 0;
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('articles', 'public');
                $article->images()->create([
                    'image' => Storage::url($path),
                    'sort_order' => $maxSort + 1 + $i,
                ]);
            }
        }

        return redirect()->route('admin.articles.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        foreach ($article->images as $image) {
            $this->deleteImageFile($image->image);
            $image->delete();
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article supprimé.');
    }

    public function uploadImage(Request $request, Article $article)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|max:5120',
        ]);

        $uploaded = [];
        $maxSort = $article->images()->max('sort_order') ?? 0;

        foreach ($request->file('images') as $i => $file) {
            $path = $file->store('articles', 'public');
            $image = $article->images()->create([
                'image' => Storage::url($path),
                'sort_order' => $maxSort + 1 + $i,
            ]);
            $uploaded[] = $image;
        }

        return redirect()->route('admin.articles.edit', $article)
            ->with('success', count($uploaded) . ' image(s) ajoutée(s).');
    }

    public function updateImages(Request $request, Article $article)
    {
        $request->validate([
            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:255',
            'sort_orders' => 'nullable|array',
            'sort_orders.*' => 'nullable|integer|min:0',
        ]);

        if ($request->has('captions')) {
            foreach ($request->captions as $id => $caption) {
                ArticleImage::where('id', $id)->where('article_id', $article->id)
                    ->update(['caption' => $caption]);
            }
        }

        if ($request->has('sort_orders')) {
            foreach ($request->sort_orders as $id => $order) {
                ArticleImage::where('id', $id)->where('article_id', $article->id)
                    ->update(['sort_order' => $order]);
            }
        }

        return redirect()->route('admin.articles.edit', $article)
            ->with('success', 'Images mises à jour.');
    }

    public function deleteImage(ArticleImage $image)
    {
        $this->deleteImageFile($image->image);
        $image->delete();
        return redirect()->back()->with('success', 'Image supprimée.');
    }

    private function deleteImageFile($url)
    {
        $relative = str_replace(Storage::url(''), '', $url);
        if (Storage::disk('public')->exists($relative)) {
            Storage::disk('public')->delete($relative);
        }
    }
}
