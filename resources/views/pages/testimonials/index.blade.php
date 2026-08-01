@extends('layouts.app')

@section('title', 'Témoignages - RAIL Bénin')

@section('content')

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-quote-right"></i>
            Témoignages
        </div>
        <h1>Témoignages</h1>
        <p>Ce que disent nos bénéficiaires, partenaires et formateurs</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger">
            @forelse($testimonials as $testimonial)
            <div class="feature-card p-6 animate-fade-up relative" style="animation-delay:{{ $loop->index * 50 }}ms">
                <div class="mb-3">
                    <span class="badge {{ $testimonial->type === 'beneficiaire' ? 'badge-brand' : ($testimonial->type === 'formateur' ? 'badge-warn' : 'badge-surface') }}">
                        {{ ucfirst($testimonial->type) }}
                    </span>
                </div>
                <blockquote class="text-sm leading-relaxed text-surface-600 italic mb-4">"{{ $testimonial->content }}"</blockquote>
                <div class="flex items-center gap-3 pt-4 border-t border-surface-100">
                    @if($testimonial->photo)
                    <img src="{{ $testimonial->photo }}" alt="{{ $testimonial->name }}" class="w-9 h-9 rounded-lg object-cover">
                    @else
                    <div class="w-9 h-9 rounded-lg bg-primary-600 flex items-center justify-center text-white font-bold text-sm">
                        {{ substr($testimonial->name, 0, 1) }}
                    </div>
                    @endif
                    <div>
                        <div class="font-bold text-sm text-surface-800">{{ $testimonial->name }}</div>
                        <div class="text-xs text-surface-400">{{ $testimonial->function ?: ucfirst($testimonial->type) }}</div>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-16 col-span-full">
                <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-quote-right text-2xl text-surface-300"></i>
                </div>
                <p class="text-surface-400">Aucun témoignage pour le moment.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $testimonials->links() }}
        </div>
    </div>
</section>

@endsection
