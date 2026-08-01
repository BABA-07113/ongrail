@extends('layouts.app')

@section('title', 'Opportunités - RAIL Bénin')

@section('content')

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-bullhorn"></i>
            Opportunités
        </div>
        <h1>Opportunités</h1>
        <p>Appels à candidature, formations, stages, emplois et volontariat</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="flex gap-2 flex-wrap justify-center mb-8 animate-fade-up">
            <a href="{{ route('opportunities.index') }}" class="btn btn-sm {{ !isset($type) ? 'btn-primary' : 'btn-outline' }}">Tout</a>
            <a href="{{ route('opportunities.type', 'appel_candidature') }}" class="btn btn-sm {{ isset($type) && $type === 'appel_candidature' ? 'btn-primary' : 'btn-outline' }}">Appels</a>
            <a href="{{ route('opportunities.type', 'formation') }}" class="btn btn-sm {{ isset($type) && $type === 'formation' ? 'btn-primary' : 'btn-outline' }}">Formations</a>
            <a href="{{ route('opportunities.type', 'stage') }}" class="btn btn-sm {{ isset($type) && $type === 'stage' ? 'btn-primary' : 'btn-outline' }}">Stages</a>
            <a href="{{ route('opportunities.type', 'emploi') }}" class="btn btn-sm {{ isset($type) && $type === 'emploi' ? 'btn-primary' : 'btn-outline' }}">Emplois</a>
            <a href="{{ route('opportunities.type', 'volontariat') }}" class="btn btn-sm {{ isset($type) && $type === 'volontariat' ? 'btn-primary' : 'btn-outline' }}">Volontariat</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 stagger">
            @forelse($opportunities as $opp)
            <div class="feature-card p-5 animate-fade-up" style="animation-delay:{{ $loop->index * 60 }}ms">
                <div class="flex items-center gap-2 flex-wrap mb-3">
                    <span class="badge {{ $opp->type === 'appel_candidature' ? 'badge-brand' : ($opp->type === 'formation' ? 'badge-warn' : ($opp->type === 'stage' ? 'badge-surface' : ($opp->type === 'emploi' ? 'badge-danger' : 'badge-brand'))) }}">
                        {{ str_replace(['_', 'appel_candidature'], [' ', 'Appel'], ucfirst($opp->type)) }}
                    </span>
                    <span class="badge {{ $opp->status === 'ouvert' ? 'badge-brand' : ($opp->status === 'cloture' ? 'badge-danger' : 'badge-warn') }}">
                        {{ $opp->status === 'ouvert' ? 'Ouvert' : ($opp->status === 'cloture' ? 'Clôturé' : 'Résultats') }}
                    </span>
                </div>
                <h3 class="font-bold text-sm mb-2">{{ $opp->title }}</h3>
                @if($opp->deadline)
                <div class="text-xs text-surface-400 mb-2 flex items-center gap-1.5">
                    <i class="far fa-clock"></i> Date limite : {{ $opp->deadline->format('d/m/Y') }}
                </div>
                @endif
                <p class="text-surface-500 text-sm leading-relaxed mb-4 line-clamp-2">{{ Str::limit(strip_tags($opp->description), 120) }}</p>
                <a href="{{ route('opportunities.show', $opp->slug) }}" class="rm">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
            @empty
            <div class="text-center py-16 col-span-full">
                <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bullhorn text-2xl text-surface-300"></i>
                </div>
                <p class="text-surface-400">Aucune opportunité pour le moment.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $opportunities->links() }}
        </div>
    </div>
</section>

@endsection
