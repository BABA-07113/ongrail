@extends('layouts.app')

@section('title', 'Équipe - RAIL Bénin')
@section('meta_description', 'Découvrez l\'équipe du RAIL - Réseau d\'appui aux initiatives locales au Bénin.')

@section('content')

<section class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-users"></i>
            Équipe
        </div>
        <h1>Notre équipe</h1>
        <p>Des personnes engagées au service des communautés béninoises</p>
    </div>
</section>

@if($boardMembers && $boardMembers->count() > 0)
<section class="section relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[30rem] h-[30rem] bg-primary-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-[25rem] h-[25rem] bg-accent-500/5 rounded-full blur-3xl"></div>

    <div class="container relative z-10">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-12 lg:mb-16">
            <div>
                <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-primary-600 mb-4">
                    <span class="w-8 h-[1.5px] bg-gradient-to-r from-primary-500 to-accent-400"></span>
                    Gouvernance
                </div>
                <h2 class="text-4xl lg:text-5xl font-display font-bold leading-tight">
                    <span class="text-ink-900">Conseil d'administration</span>
                </h2>
            </div>
            <p class="text-ink-400 lg:max-w-sm leading-relaxed">
                La gouvernance stratégique du RAIL est assurée par un conseil engagé qui oriente la vision de l'organisation.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 anim-stagger">
            @foreach($boardMembers as $member)
            <article class="group relative rounded-2xl overflow-hidden bg-white border border-ink-100/50 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="relative aspect-[4/5] overflow-hidden">
                    @if($member->photo)
                    <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                    <div class="absolute inset-0 w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-400 to-accent-400 text-white text-6xl font-bold font-display">{{ substr($member->name, 0, 1) }}</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent"></div>
                    <span class="absolute top-5 right-6 font-display font-bold text-5xl text-white/20 select-none">{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</span>
                    <div class="absolute bottom-0 left-0 right-0 p-5 lg:p-6">
                        <h3 class="font-display font-bold text-ink-900 text-xl lg:text-2xl leading-tight">{{ $member->name }}</h3>
                        <p class="text-accent-300 text-[0.625rem] font-bold tracking-[0.2em] uppercase mt-1.5">{{ $member->position }}</p>
                    </div>
                </div>
                @if($member->bio)
                <div class="p-5 lg:p-6 border-t border-ink-100/50">
                    <p class="text-sm text-ink-500 leading-relaxed">{{ $member->bio }}</p>
                </div>
                @endif
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($executiveMembers && $executiveMembers->count() > 0)
<section class="relative overflow-hidden py-20 lg:py-28">
    <div class="absolute inset-0 bg-gradient-to-br from-primary-300 via-primary-200 to-primary-400"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[50rem] h-[50rem] bg-accent-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-primary-500/5 rounded-full blur-3xl"></div>
    <div class="absolute top-[15%] left-[8%] w-20 h-20 border border-accent-400/20 rounded-full"></div>
    <div class="absolute bottom-[18%] right-[10%] w-12 h-12 border border-white/10 rounded-full"></div>

    <div class="container relative z-10">
        <div class="text-center mb-14 lg:mb-16">
            <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-accent-300 mb-4">
                <span class="w-8 h-[1.5px] bg-accent-400/60"></span>
                Direction exécutive
            </div>
            <h2 class="text-4xl lg:text-5xl font-display font-bold text-ink-900">
                L'équipe <span class="text-accent-400">opérationnelle</span>
            </h2>
            <p class="text-ink-500 text-base lg:text-lg mt-4 max-w-xl mx-auto">
                Au quotidien, ils portent les projets du RAIL sur le terrain au cœur des communautés.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 anim-stagger">
            @foreach($executiveMembers as $member)
            <article class="group relative rounded-2xl p-8 text-center bg-white/5 border border-white/10 backdrop-blur-sm hover:bg-white/10 hover:border-accent-400/40 transition-all duration-500">
                <div class="relative w-28 h-28 mx-auto mb-6">
                    <div class="absolute inset-0 rounded-full bg-gradient-to-br from-accent-400 to-primary-500 p-[3px] group-hover:scale-105 transition-transform duration-500">
                        <div class="w-full h-full rounded-full overflow-hidden bg-primary-950">
                            @if($member->photo)
                            <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-white text-2xl font-bold font-display">{{ substr($member->name, 0, 1) }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <h3 class="font-display font-bold text-ink-900 text-lg leading-snug">{{ $member->name }}</h3>
                <div class="w-8 h-[2px] bg-gradient-to-r from-accent-400 to-accent-500 rounded-full mx-auto my-3.5"></div>
                <p class="text-accent-300 text-[0.625rem] font-bold tracking-[0.2em] uppercase">{{ $member->position }}</p>
                @if($member->bio)
                <p class="text-ink-500 text-sm leading-relaxed mt-3">{{ $member->bio }}</p>
                @endif
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="section">
    <div class="container">
        <div class="cta-section animate-fade-up">
            <h2>Rejoignez notre équipe</h2>
            <p>Nous sommes toujours à la recherche de talents engagés</p>
            <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                <i class="fas fa-envelope"></i> Nous contacter
            </a>
        </div>
    </div>
</section>

@endsection
