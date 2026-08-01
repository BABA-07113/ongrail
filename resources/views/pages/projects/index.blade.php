@extends('layouts.app')

@section('title', 'Projets - RAIL Bénin')

@section('content')

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-project-diagram"></i>
            Projets
        </div>
        <h1>Nos projets</h1>
        <p>Découvrez nos initiatives pour le développement des communautés</p>
    </div>
</div>

<section class="section">
    <div class="container">
        @forelse($projects as $project)
        <article class="mb-16 lg:mb-20 last:mb-0">
            <div class="overflow-hidden rounded-2xl shadow-sm ring-1 ring-ink-100/50">
                <img src="{{ $project->featured_image ? asset($project->featured_image) : asset('images/galleries/image1.jpg') }}" alt="{{ $project->title }}" class="w-full aspect-[16/7] object-cover" loading="lazy">
            </div>

            <div class="mt-8 lg:mt-10 max-w-3xl">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    <span class="badge {{ $project->status === 'en_cours' ? 'badge-brand' : ($project->status === 'termine' ? 'badge-surface' : 'badge-warn') }}">
                        {{ $project->status === 'en_cours' ? 'En cours' : ($project->status === 'termine' ? 'Terminé' : 'Planifié') }}
                    </span>
                    @if($project->category)
                    <span class="badge badge-surface">{{ $project->category->name }}</span>
                    @endif
                    @if($project->start_date || $project->end_date)
                    <span class="flex items-center gap-2 text-xs text-ink-400 ml-2">
                        <i class="far fa-calendar-alt text-xs"></i>
                        @if($project->start_date){{ $project->start_date->format('d/m/Y') }}@endif
                        @if($project->start_date && $project->end_date)<i class="fas fa-arrow-right text-[0.4rem] mx-1"></i>@endif
                        @if($project->end_date){{ $project->end_date->format('d/m/Y') }}@endif
                    </span>
                    @endif
                </div>
                <h2 class="text-2xl lg:text-3xl font-display font-bold text-ink-900 leading-tight mb-6">{{ $project->title }}</h2>
                <div class="article-body">
                    {!! \App\Support\DetailContent::render($project->content) !!}
                </div>

                @if($project->objectives || $project->results)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                    @if($project->objectives)
                    <div class="p-7 bg-gradient-to-br from-primary-50 to-white rounded-2xl border border-primary-100/50">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-9 h-9 rounded-xl bg-primary-100 flex items-center justify-center text-primary-600"><i class="fas fa-bullseye"></i></div>
                            <h3 class="font-display font-bold text-base text-ink-900">Objectifs</h3>
                        </div>
                        <div class="text-sm text-ink-600 leading-relaxed article-body">{!! $project->objectives !!}</div>
                    </div>
                    @endif
                    @if($project->results)
                    <div class="p-7 bg-gradient-to-br from-accent-50 to-white rounded-2xl border border-accent-100/50">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-9 h-9 rounded-xl bg-accent-100 flex items-center justify-center text-accent-600"><i class="fas fa-star"></i></div>
                            <h3 class="font-display font-bold text-base text-ink-900">Résultats</h3>
                        </div>
                        <div class="text-sm text-ink-600 leading-relaxed article-body">{!! $project->results !!}</div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </article>
        @empty
        <div class="text-center py-16">
            <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-project-diagram text-2xl text-surface-300"></i>
            </div>
            <p class="text-surface-400">Aucun projet trouvé.</p>
        </div>
        @endforelse
    </div>
</section>

@endsection
