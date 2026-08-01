@extends('layouts.app')

@section('title', 'Actualités - RAIL Bénin')
@section('meta_description', 'Toutes les actualités et événements de RAIL Bénin.')

@section('content')

<div class="page-header">
    <div class="container">
        <div class="section-tag mb-5">
            <i class="fas fa-newspaper"></i>
            Actualités
        </div>
        <h1>Toutes les actualités</h1>
        <p>Suivez nos dernières actions, événements et projets sur le terrain</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_280px] gap-10 lg:gap-14 items-start">

            {{-- Main --}}
            <div>
                @if(isset($category))
                <div class="mb-6">
                    <span class="badge badge-brand">Catégorie : {{ $category->name }}</span>
                </div>
                @endif

                @forelse($articles as $article)
                    @if($loop->first && $articles->currentPage() === 1 && !isset($category))
                    {{-- Featured --}}
                    <article class="article-featured group mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-[1.4fr_1fr]">
                            <div class="article-card-figure !aspect-[4/3] md:!aspect-auto md:min-h-[400px]">
                                <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('images/galleries/img-1465_orig.jpg') }}" alt="{{ $article->title }}">
                            </div>
                            <div class="p-8 lg:p-10 flex flex-col justify-center">
                                <div class="article-card-meta">
                                    <time>{{ $article->published_at?->format('d M Y') ?: $article->created_at->format('d M Y') }}</time>
                                    @if($article->category)
                                    <span class="badge badge-brand">{{ $article->category->name }}</span>
                                    @endif
                                </div>
                                <h2 class="text-xl lg:text-2xl font-display font-bold leading-snug mb-4 group-hover:text-primary-600 transition-colors">
                                    <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                                </h2>
                                <p class="text-ink-400 text-sm leading-relaxed mb-6">{{ $article->excerpt ?: Str::limit(strip_tags($article->content), 180) }}</p>
                                <a href="{{ route('articles.show', $article->slug) }}" class="rm">
                                    Lire l'article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                    @else
                    {{-- Standard card --}}
                    <article class="article-card group mb-5" style="animation-delay:{{ min(($loop->index % 3) * 60, 180) }}ms">
                        <div class="grid grid-cols-1 sm:grid-cols-[200px_1fr]">
                            <div class="article-card-figure !aspect-[4/3] sm:!aspect-auto sm:min-h-[170px]">
                                <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('images/galleries/img-1465_orig.jpg') }}" alt="{{ $article->title }}">
                            </div>
                            <div class="article-card-body">
                                <div class="article-card-meta">
                                    <time>{{ $article->published_at?->format('d M Y') ?: $article->created_at->format('d M Y') }}</time>
                                    @if($article->category)
                                    <span class="badge badge-brand">{{ $article->category->name }}</span>
                                    @endif
                                </div>
                                <h3 class="article-card-title !text-base">
                                    <a href="{{ route('articles.show', $article->slug) }}">{{ Str::limit($article->title, 80) }}</a>
                                </h3>
                                <p class="article-card-excerpt">{{ $article->excerpt ?: Str::limit(strip_tags($article->content), 120) }}</p>
                                <a href="{{ route('articles.show', $article->slug) }}" class="rm">
                                    Lire la suite <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                    @endif
                @empty
                <div class="text-center py-20">
                    <div class="w-16 h-16 rounded-xl bg-ink-50 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-newspaper text-2xl text-ink-300"></i>
                    </div>
                    <p class="text-ink-400">Aucune actualité trouvée.</p>
                </div>
                @endforelse

                <div class="mt-10">
                    {{ $articles->links() }}
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-5 lg:sticky lg:top-24">
                <div class="bg-white rounded-xl p-6 border border-ink-100">
                    <h4 class="text-xs font-bold tracking-wider uppercase text-ink-400 mb-4">Rechercher</h4>
                    <form action="{{ route('articles.index') }}" method="GET" class="relative">
                        <input type="text" name="s" placeholder="Rechercher..." value="{{ request('s') }}" class="!py-2.5 !px-4 !rounded-lg !text-sm">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-ink-400 hover:text-primary-600 transition-colors">
                            <i class="fas fa-search text-xs"></i>
                        </button>
                    </form>
                </div>

                <div class="bg-white rounded-xl p-6 border border-ink-100">
                    <h4 class="text-xs font-bold tracking-wider uppercase text-ink-400 mb-4">Catégories</h4>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="{{ route('articles.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ !isset($category) && !request('s') ? 'bg-primary-50 text-primary-600 font-semibold' : 'text-ink-500 hover:bg-ink-50 hover:text-ink-800' }}">Toutes</a>
                        </li>
                        @foreach($categories ?? [] as $cat)
                        <li>
                            <a href="{{ route('articles.category', $cat->slug) }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ isset($category) && $category->id === $cat->id ? 'bg-primary-50 text-primary-600 font-semibold' : 'text-ink-500 hover:bg-ink-50 hover:text-ink-800' }}">{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                @if(isset($recentArticles) && $recentArticles->count() > 0)
                <div class="bg-white rounded-xl p-6 border border-ink-100">
                    <h4 class="text-xs font-bold tracking-wider uppercase text-ink-400 mb-4">Articles récents</h4>
                    <ul class="space-y-3">
                        @foreach($recentArticles as $recent)
                        <li class="flex gap-3 items-start pb-3 border-b border-ink-50 last:border-0 last:pb-0">
                            @if($recent->featured_image)
                            <img src="{{ asset($recent->featured_image) }}" alt="" class="w-14 h-10 rounded-lg object-cover flex-shrink-0">
                            @endif
                            <div class="min-w-0">
                                <a href="{{ route('articles.show', $recent->slug) }}" class="text-sm font-semibold text-ink-800 hover:text-primary-600 transition-colors leading-tight block truncate">{{ Str::limit($recent->title, 42) }}</a>
                                <span class="text-xs text-ink-400 mt-0.5 block">{{ $recent->published_at?->format('d M Y') }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(isset($archives) && $archives->count() > 0)
                <div class="bg-white rounded-xl p-6 border border-ink-100">
                    <h4 class="text-xs font-bold tracking-wider uppercase text-ink-400 mb-4">Archives</h4>
                    <ul class="space-y-0.5">
                        @foreach($archives as $archive)
                        <li>
                            <a href="{{ route('articles.archive', $archive->month) }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-ink-500 hover:bg-ink-50 hover:text-ink-800 transition-all">
                                {{ $archive->label }} ({{ $archive->count }})
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </aside>

        </div>
    </div>
</section>

@endsection
