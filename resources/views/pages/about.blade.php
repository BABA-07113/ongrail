@extends('layouts.app')

@section('title', 'Mission - RAIL Bénin')
@section('meta_description', 'Découvrez la mission, la vision et l\'équipe du RAIL - Réseau d\'appui aux initiatives locales au Bénin.')

@section('content')

<section class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-info-circle"></i>
            À propos
        </div>
        <h1>À propos du RAIL</h1>
        <p>Réseau d'appui aux Initiatives Locales — Depuis 2003 au service des communautés béninoises</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-bullseye"></i>
                Notre mission
            </div>
            <h2>Améliorer les<br><span class="text-primary-600">conditions de vie</span></h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center mb-20">
            <div class="relative animate-fade-left">
                <div class="absolute -inset-4 rounded-2xl bg-primary-500/5 blur-3xl"></div>
                <img src="{{ asset('images/galleries/img-5769_orig.jpg') }}" alt="Mission RAIL Bénin" class="relative rounded-xl shadow-lg object-cover w-full h-[380px] lg:h-[440px]">
                <div class="absolute bottom-4 left-4">
                    <span class="px-3.5 py-1.5 bg-white/90 backdrop-blur-sm rounded-lg text-xs font-semibold text-primary-700 shadow-sm">Développement communautaire</span>
                </div>
            </div>
            <div class="animate-fade-right">
                <div class="flex items-center gap-2.5 mb-4">
                    <span class="w-0.5 h-8 rounded-full bg-primary-500"></span>
                    <span class="text-xs font-bold text-primary-600 uppercase tracking-wider">Depuis 2003</span>
                </div>
                <p class="text-surface-500 leading-relaxed mb-6">
                    Le <strong class="text-surface-800">Réseau d'Appui aux Initiatives Locales (RAIL)</strong> a comme mission d'améliorer les conditions de vie des populations défavorisées du Bénin. L'organisme se donne également comme mission d'améliorer l'environnement et de lutter contre les effets des variations climatiques.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Le RAIL veut apporter des <strong class="text-surface-700">solutions concrètes</strong> aux jeunes, aux femmes et à toutes personnes marginalisées. À travers des programmes participatifs et inclusifs, nous travaillons main dans la main avec les communautés locales pour co-construire des réponses adaptées à leurs réalités.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="animate-fade-right order-2 lg:order-1">
                <div class="flex items-center gap-2.5 mb-4">
                    <span class="w-0.5 h-8 rounded-full bg-amber-500"></span>
                    <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">ONG créée en 2003</span>
                </div>
                <p class="text-surface-500 leading-relaxed mb-6">
                    Le RAIL est une <strong class="text-surface-800">organisation non gouvernementale</strong> créée en 2003 et incorporée en 2014. L'organisme développe des projets visant l'autonomie de la population, le développement des compétences techniques et organisationnelles orientées vers l'entrepreneuriat, l'innovation et la créativité.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Nous soutenons et mettons en œuvre des initiatives sur <strong class="text-surface-700">l'égalité entre les hommes et les femmes</strong> pour un monde plus prospère, équitable et juste. Nos programmes profitent notamment aux femmes et aux jeunes, qui sont au cœur de notre action.
                </p>
            </div>
            <div class="relative animate-fade-left order-1 lg:order-2">
                <div class="absolute -inset-4 rounded-2xl bg-amber-500/5 blur-3xl"></div>
                <img src="{{ asset('images/galleries/img-1873_orig.jpg') }}" alt="ONG RAIL créé en 2003" class="relative rounded-xl shadow-lg object-cover w-full h-[380px] lg:h-[440px]">
                <div class="absolute bottom-4 left-4">
                    <span class="px-3.5 py-1.5 bg-white/90 backdrop-blur-sm rounded-lg text-xs font-semibold text-amber-700 shadow-sm">Créé en 2003</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4 mt-14 stagger">
            <div class="feature-card !p-6 text-center">
                <div class="text-2xl lg:text-3xl font-display font-extrabold text-primary-600 mb-1">2003</div>
                <div class="text-xs font-bold text-surface-400 uppercase tracking-wider">Création</div>
            </div>
            <div class="feature-card !p-6 text-center">
                <div class="text-2xl lg:text-3xl font-display font-extrabold text-amber-500 mb-1">2014</div>
                <div class="text-xs font-bold text-surface-400 uppercase tracking-wider">Incorporation</div>
            </div>
            <div class="feature-card !p-6 text-center">
                <div class="text-2xl lg:text-3xl font-display font-extrabold text-red-500 mb-1">5 000+</div>
                <div class="text-xs font-bold text-surface-400 uppercase tracking-wider">Bénéficiaires</div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-heart"></i>
                Valeurs
            </div>
            <h2>Les principes qui<br><span class="text-primary-600">nous guident</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger">
            <div class="feature-card">
                <div class="feature-icon green">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3 class="feature-title">Solidarité</h3>
                <p class="feature-description">Agir ensemble pour le bien-être des communautés défavorisées et promouvoir l'entraide sociale.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon yellow">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="feature-title">Durabilité</h3>
                <p class="feature-description">Des solutions durables pour un impact à long terme sur l'environnement et les communautés.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon red">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3 class="feature-title">Équité</h3>
                <p class="feature-description">Promouvoir l'égalité des genres et l'inclusion sociale pour toutes les couches de la population.</p>
            </div>
        </div>
    </div>
</section>

@if(($boardMembers && $boardMembers->count() > 0) || ($executiveMembers && $executiveMembers->count() > 0))
<section class="section">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-users"></i>
                Équipe
            </div>
            <h2>Des personnes<br><span class="text-primary-600">engagées</span></h2>
        </div>

        @if($boardMembers && $boardMembers->count() > 0)
        <div class="mb-16">
            <h3 class="text-lg font-display font-bold mb-8 flex items-center gap-3">
                <span class="w-0.5 h-6 rounded-full bg-primary-500"></span>
                Conseil d'administration
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 stagger">
                @foreach($boardMembers as $member)
                <div class="feature-card text-center group">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 p-[2px]">
                            <div class="w-full h-full rounded-full bg-white overflow-hidden">
                                @if($member->photo)
                                <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-400 to-primary-600 text-white text-xl font-bold font-display">{{ substr($member->name, 0, 1) }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-base mb-0.5">{{ $member->name }}</h4>
                    <p class="text-xs text-primary-600 font-semibold">{{ $member->position }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($executiveMembers && $executiveMembers->count() > 0)
        <div>
            <h3 class="text-lg font-display font-bold mb-8 flex items-center gap-3">
                <span class="w-0.5 h-6 rounded-full bg-amber-500"></span>
                Direction exécutive
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 stagger">
                @foreach($executiveMembers as $member)
                <div class="feature-card text-center group">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-amber-400 to-red-400 p-[2px]">
                            <div class="w-full h-full rounded-full bg-white overflow-hidden">
                                @if($member->photo)
                                <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-400 to-red-400 text-white text-xl font-bold font-display">{{ substr($member->name, 0, 1) }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-base mb-0.5">{{ $member->name }}</h4>
                    <p class="text-xs text-amber-600 font-semibold">{{ $member->position }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endif

<section class="section">
    <div class="container">
        <div class="cta-section animate-fade-up">
            <h2>Rejoignez notre mission</h2>
            <p>Ensemble, créons un impact durable pour les communautés du Bénin</p>
            <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                <i class="fas fa-envelope"></i> Nous contacter
            </a>
        </div>
    </div>
</section>

@endsection
