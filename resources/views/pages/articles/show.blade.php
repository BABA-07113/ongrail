@extends('layouts.app')

@section('title', $article->title . ' - RAIL Bénin')
@section('meta_description', $article->excerpt ?: Str::limit(strip_tags($article->content), 160))

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden pt-32 lg:pt-40 pb-12 lg:pb-16 bg-gradient-to-br from-[#0A2A1C] via-[#0D3B28] to-[#052011]">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[60rem] h-[60rem] bg-accent-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-white/5 rounded-full blur-3xl"></div>

    <div class="container relative z-10">
        <div class="max-w-4xl">
            <div class="flex flex-wrap items-center gap-2 mb-5">
                @if($article->category)
                <span class="inline-block px-3 py-1.5 text-[0.625rem] font-bold tracking-wider uppercase bg-white/10 backdrop-blur-sm text-white/90 rounded-lg">{{ $article->category->name }}</span>
                @endif
                <span class="inline-flex items-center gap-1.5 text-[0.625rem] font-bold tracking-wider uppercase text-accent-400/90">
                    <span class="w-6 h-[1.5px] bg-accent-400"></span> Nouvelle
                </span>
            </div>
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-display font-bold text-white leading-tight mb-5">{{ $article->title }}</h1>
            <div class="flex flex-wrap items-center gap-5 text-sm text-white/60">
                <span class="flex items-center gap-2"><i class="far fa-calendar-alt text-xs"></i> {{ $article->published_at?->format('d F Y') ?: $article->created_at->format('d F Y') }}</span>
                <span class="flex items-center gap-2"><i class="far fa-user text-xs"></i> {{ $article->user?->name ?? 'RAIL Bénin' }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Content --}}
<section class="py-16 lg:py-24">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-14">
            {{-- Main --}}
            <div class="lg:col-span-2">
                <div class="article-body">
                    {!! \App\Support\DetailContent::render($article->content) !!}
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-ink-100/50 p-6">
                        <h4 class="text-xs font-bold tracking-[0.15em] uppercase text-ink-400 mb-4">Partager</h4>
                        <div class="flex flex-wrap gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 rounded-lg bg-[#1877F2] text-white flex items-center justify-center text-xs hover:-translate-y-px hover:shadow-md transition-all"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" class="w-9 h-9 rounded-lg bg-[#25D366] text-white flex items-center justify-center text-xs hover:-translate-y-px hover:shadow-md transition-all"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 rounded-lg bg-[#0077B5] text-white flex items-center justify-center text-xs hover:-translate-y-px hover:shadow-md transition-all"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    @if($prevArticle || $nextArticle)
                    <div class="bg-white rounded-2xl shadow-sm border border-ink-100/50 p-6">
                        <h4 class="text-xs font-bold tracking-[0.15em] uppercase text-ink-400 mb-4">Navigation</h4>
                        <div class="space-y-3">
                            @if($prevArticle)
                            <a href="{{ route('articles.show', $prevArticle->slug) }}" class="block p-4 rounded-xl bg-ink-50 hover:bg-primary-50 transition-colors group">
                                <div class="text-[0.6rem] text-ink-400 mb-1 flex items-center gap-1 font-medium"><i class="fas fa-arrow-left text-[8px]"></i> Précédent</div>
                                <div class="text-xs font-bold text-ink-800 leading-snug group-hover:text-primary-600 transition-colors line-clamp-2">{{ Str::limit($prevArticle->title, 50) }}</div>
                            </a>
                            @endif
                            @if($nextArticle)
                            <a href="{{ route('articles.show', $nextArticle->slug) }}" class="block p-4 rounded-xl bg-ink-50 hover:bg-primary-50 transition-colors group">
                                <div class="text-[0.6rem] text-ink-400 mb-1 flex items-center gap-1 font-medium justify-end">Suivant <i class="fas fa-arrow-right text-[8px]"></i></div>
                                <div class="text-xs font-bold text-ink-800 leading-snug group-hover:text-primary-600 transition-colors line-clamp-2 text-right">{{ Str::limit($nextArticle->title, 50) }}</div>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Related --}}
@if($otherArticles->count() > 0)
<section class="relative overflow-hidden py-16 lg:py-24 bg-gradient-to-br from-[#0A2A1C] via-primary-900 to-[#052011]">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[50rem] h-[50rem] bg-accent-500/10 rounded-full blur-3xl"></div>
    <div class="container relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-white/50 mb-4">
                <span class="w-8 h-[1.5px] bg-gradient-to-r from-accent-400 to-accent-500"></span>
                À lire aussi
            </div>
            <h2 class="text-3xl lg:text-4xl font-display font-bold text-white">
                Articles similaires
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($otherArticles as $other)
            <a href="{{ route('articles.show', $other->slug) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-500 border border-ink-100/50 hover:border-primary-200">
                <div class="relative overflow-hidden h-48">
                    <img src="{{ $other->featured_image ? asset($other->featured_image) : asset('images/galleries/img-1465_orig.jpg') }}" alt="{{ $other->title }}" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                </div>
                <div class="p-5">
                    <div class="text-xs text-ink-400 mb-2">{{ $other->published_at?->format('d M Y') }}</div>
                    <h4 class="text-sm font-heading font-bold text-ink-900 leading-snug group-hover:text-primary-600 transition-colors line-clamp-2">{{ Str::limit($other->title, 60) }}</h4>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
