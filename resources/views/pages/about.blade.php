@extends('layouts.app')

@section('title', $page->meta_title ?? 'Mission - RAIL Bénin')
@section('meta_description', $page->meta_description ?? 'Découvrez la mission, la vision et l\'équipe du RAIL - Réseau d\'appui aux initiatives locales au Bénin.')

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
                @if($page && $page->content)
                    <div class="text-surface-500 leading-relaxed article-body">{!! \App\Support\DetailContent::render($page->content) !!}</div>
                @else
                <p class="text-surface-500 leading-relaxed mb-6">
                    Le <strong class="text-surface-800">Réseau d'Appui aux Initiatives Locales (RAIL)</strong> a comme mission d'améliorer les conditions de vie des populations défavorisées du Bénin. L'organisme se donne également comme mission d'améliorer l'environnement et de lutter contre les effets des variations climatiques.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Le RAIL veut apporter des <strong class="text-surface-700">solutions concrètes</strong> aux jeunes, aux femmes et à toutes personnes marginalisées. À travers des programmes participatifs et inclusifs, nous travaillons main dans la main avec les communautés locales pour co-construire des réponses adaptées à leurs réalités.
                </p>
                @endif
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
            <h2>Rejoignez notre mission</h2>
            <p>Ensemble, créons un impact durable pour les communautés du Bénin</p>
            <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                <i class="fas fa-envelope"></i> Nous contacter
            </a>
        </div>
    </div>
</section>

@endsection
