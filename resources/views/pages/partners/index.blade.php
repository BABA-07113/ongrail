@extends('layouts.app')

@section('title', 'Partenaires - RAIL Bénin')

@section('content')

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-handshake"></i>
            Partenaires
        </div>
        <h1>Nos partenaires</h1>
        <p>Ils nous accompagnent dans notre mission</p>
    </div>
</div>

@php
$categories = [
    'financier' => ['label' => 'Partenaires financiers', 'items' => $financiers ?? collect()],
    'technique' => ['label' => 'Partenaires techniques', 'items' => $techniques ?? collect()],
    'institutionnel' => ['label' => 'Institutions', 'items' => $institutionnels ?? collect()],
];
@endphp

<section class="section">
    <div class="container">
        @foreach($categories as $key => $cat)
        @if($cat['items']->count() > 0)
        <div class="mb-10 animate-fade-up">
            <div class="section-tag mb-5">{{ $cat['label'] }}</div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 stagger">
                @foreach($cat['items'] as $partner)
                <div class="feature-card p-6 text-center animate-fade-up" style="animation-delay:{{ $loop->index * 60 }}ms">
                    @if($partner->logo)
                    <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="h-12 object-contain mx-auto mb-4 opacity-60 group-hover:opacity-100 transition-opacity">
                    @else
                    <div class="w-12 h-12 rounded-full bg-primary-600 flex items-center justify-center mx-auto mb-4 text-white font-bold text-lg">
                        {{ substr($partner->name, 0, 1) }}
                    </div>
                    @endif
                    <h3 class="font-bold text-sm mb-2">{{ $partner->name }}</h3>
                    @if($partner->description)
                    <p class="text-surface-500 text-xs leading-relaxed mb-3 line-clamp-2">{{ Str::limit($partner->description, 100) }}</p>
                    @endif
                    @if($partner->website_url)
                    <a href="{{ $partner->website_url }}" target="_blank" rel="noopener" class="rm text-xs">
                        Visiter le site <i class="fas fa-external-link-alt"></i>
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach

        @if($financiers->isEmpty() && $techniques->isEmpty() && $institutionnels->isEmpty())
        <div class="text-center py-16">
            <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-handshake text-2xl text-surface-300"></i>
            </div>
            <p class="text-surface-400">Aucun partenaire pour le moment.</p>
        </div>
        @endif
    </div>
</section>

@endsection
