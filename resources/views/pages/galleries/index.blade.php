@extends('layouts.app')

@section('title', 'Galeries - RAIL Bénin')

@section('content')

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-images"></i>
            Galeries
        </div>
        <h1>Galeries</h1>
        <p>Découvrez nos activités en images</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 stagger">
            @forelse($galleries as $gallery)
            <a href="{{ route('galleries.show', $gallery->slug) }}" class="article-card group animate-fade-up" style="animation-delay:{{ $loop->index * 60 }}ms">
                <div class="relative overflow-hidden !aspect-[4/3]">
                    <img src="{{ $gallery->cover_image ? asset($gallery->cover_image) : ($gallery->images->first()?->image ? asset($gallery->images->first()->image) : asset('images/galleries/img-4260_orig.jpg')) }}" alt="{{ $gallery->title }}" loading="lazy">
                    <div class="article-card-overlay"></div>
                    <div class="absolute inset-0 flex items-center justify-center z-10">
                        <span class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-full bg-black/50 backdrop-blur-sm border border-white/20 text-white text-xs font-bold shadow-lg transition-all duration-300 group-hover:bg-accent-400 group-hover:text-primary-900 group-hover:border-accent-400">
                            <i class="fas fa-images"></i>
                            Voir les photos
                            <span class="inline-flex items-center justify-center min-w-[1.5rem] h-5 px-1 rounded-full bg-white/20 text-[0.6rem] font-bold group-hover:bg-primary-900 group-hover:text-accent-400">{{ $gallery->images->count() }}</span>
                        </span>
                    </div>
                </div>
                <div class="article-card-body">
                    <h3 class="font-bold text-sm mb-0.5 group-hover:text-primary-600 transition-colors flex items-center gap-2">
                        {{ $gallery->title }}
                        <i class="fas fa-arrow-right text-[0.55rem] text-accent-500 transition-transform duration-300 group-hover:translate-x-1"></i>
                    </h3>
                    <div class="text-xs text-surface-400 flex items-center gap-1.5">
                        <i class="far fa-images"></i> {{ $gallery->images->count() }} photos
                    </div>
                </div>
            </a>
            @empty
            <div class="text-center py-16 col-span-full">
                <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-images text-2xl text-surface-300"></i>
                </div>
                <p class="text-surface-400">Aucune galerie pour le moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
