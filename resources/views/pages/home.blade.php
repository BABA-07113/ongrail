@extends('layouts.app')

@section('title', "RAIL Bénin | Réseau d'Appui aux Initiatives Locales")

@section('content')

{{-- Hero --}}
<section id="hero" class="relative min-h-screen flex items-center overflow-hidden pt-20">
    {{-- Background photo with overlay --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/imageHero.jpg') }}" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(197,240,222,0.95) 0%, rgba(138,212,179,0.88) 50%, rgba(197,240,222,0.85) 100%);"></div>
    </div>

    {{-- Gold decorative elements --}}
    <div class="absolute top-[12%] left-[10%] w-40 h-40 border border-[#FBB507]/25 rounded-full z-[2]"></div>
    <div class="absolute top-[15%] left-[13%] w-28 h-28 border border-[#FBB507]/15 rounded-full z-[2]"></div>
    <div class="absolute bottom-[30%] right-[5%] w-20 h-20 border border-[#FBB507]/20 rounded-full z-[2]"></div>
    <div class="absolute top-[40%] left-[22%] w-6 h-6 bg-[#FBB507]/20 rounded-full z-[2]"></div>
    <div class="absolute bottom-[20%] left-[28%] w-4 h-4 bg-[#FBB507]/15 rounded-full z-[2]"></div>

    <div class="relative z-10 w-full">
        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 min-h-[75vh] items-center">
                {{-- Left: content --}}
                <div class="lg:col-span-6">
                    <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-[#FBB507] mb-5">
                        <span class="w-8 h-[1.5px] bg-[#FBB507]"></span>
                        RAIL Bénin · Fondé en 2003
                    </div>

                    <h1 class="text-ink-900 mb-3" style="color: #2C2925; font-size: clamp(2.2rem, 4.5vw, 4.5rem); line-height: 1.0; letter-spacing: -0.04em; font-weight: 800; text-shadow: none;">
                        L'autonomie de la<br>
                        communauté des
                    </h1>

                    <div class="my-2">
                        <span id="typing-word" class="typing-cursor text-[clamp(2.2rem,4.5vw,4.5rem)] font-display font-extrabold" style="color: #FBB507; letter-spacing: 0.7em; text-shadow: 0 4px 30px rgba(0,0,0,0.5), 0 1px 3px rgba(0,0,0,0.8);"></span>
                    </div>

                    <p class="text-ink-800 text-base lg:text-lg leading-relaxed max-w-lg mb-8" style="text-shadow: none;">
                        Le RAIL développe des projets concrets pour l'autonomie des populations, des compétences techniques et organisationnelles au profit des femmes et des jeunes au Bénin.
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-2.5 px-8 py-4 text-sm font-bold tracking-wider text-ink-900 bg-[#FBB507] hover:bg-[#E5A406] hover:-translate-y-0.5 transition-all duration-300 shadow-lg">
                            Découvrir notre mission
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2.5 px-8 py-4 text-sm font-bold tracking-wider text-ink-600 border border-ink-200 hover:bg-white/5 hover:text-ink-800 hover:border-ink-300 transition-all duration-300">
                            Nous contacter
                        </a>
                    </div>
                </div>

                {{-- Right: emblem --}}
                <div class="lg:col-span-6 hidden lg:flex justify-center lg:justify-start">
                    <div class="w-full max-w-[36rem] lg:max-w-[42rem] drop-shadow-2xl">
                        <img src="{{ asset('images/logo2-transparent.png') }}" alt="RAIL Bénin" class="w-full h-auto object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats bar --}}
<section class="relative bg-[#C5F0DE] border-y-2 border-[#FBB507]/30 overflow-hidden">
    <div class="w-full overflow-hidden py-3">
        @php
            $statYears = \App\Models\Setting::getValue('stat_years', '23+');
            $statBeneficiaries = \App\Models\Setting::getValue('stat_beneficiaries', '5000+');
            $statProjects = \App\Models\Setting::getValue('stat_projects', '15+');
            $statPartners = \App\Models\Setting::getValue('stat_partners', '6+');
            $statYoungs = \App\Models\Setting::getValue('stat_youngs', '3200+');
            $statWomen = \App\Models\Setting::getValue('stat_women', '2800+');
        @endphp
        @php
            $statsData = [
                ['icon' => 'fa-calendar-check', 'value' => $statYears, 'label' => 'ans d\'engagement communautaire'],
                ['icon' => 'fa-users', 'value' => $statBeneficiaries, 'label' => 'bénéficiaires formés'],
                ['icon' => 'fa-hand-holding-heart', 'value' => $statProjects, 'label' => 'projets réalisés'],
                ['icon' => 'fa-seedling', 'value' => $statPartners, 'label' => 'communautés partenaires'],
                ['icon' => 'fa-graduation-cap', 'value' => $statYoungs, 'label' => 'jeunes formés aux métiers'],
                ['icon' => 'fa-female', 'value' => $statWomen, 'label' => 'femmes autonomisées'],
            ];
        @endphp
        <div class="flex items-center gap-16 marquee-track" style="white-space: nowrap; animation: marquee 30s linear infinite; width: max-content;">
            @foreach(array_merge($statsData, $statsData) as $stat)
            <span class="inline-flex items-center gap-3 text-sm text-white/90 font-medium">
                <i class="fas {{ $stat['icon'] }} text-[#FBB507] text-base"></i>
                <span><strong class="text-[#FBB507]">{{ $stat['value'] }}</strong> {{ $stat['label'] }}</span>
            </span>
            @endforeach
        </div>
    </div>
</section>

{{-- Mission --}}
<section class="relative overflow-hidden py-20 lg:py-28">
    <div class="absolute inset-0 bg-gradient-to-br from-[#F8F7F6] via-white to-primary-50/30"></div>
    <div class="absolute top-0 right-0 w-[40rem] h-[40rem] bg-primary-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-[30rem] h-[30rem] bg-accent-500/5 rounded-full blur-3xl"></div>

    <div class="container relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 lg:gap-20 items-center">
            <div class="relative group">
                <div class="absolute -inset-3 rounded-3xl bg-gradient-to-br from-primary-500/20 to-accent-500/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/galleries/Photo_banniere_ecole.jpg') }}" alt="Mission RAIL Bénin" class="w-full h-[440px] lg:h-[520px] object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                </div>
                <div class="absolute -bottom-4 -right-4 w-24 h-24 border-2 border-accent-400/30 rounded-full"></div>
                <div class="absolute -top-4 -left-4 w-16 h-16 border-2 border-primary-400/20 rounded-full"></div>
            </div>

            <div>
                <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-primary-600 mb-5">
                    <span class="w-8 h-[1.5px] bg-gradient-to-r from-primary-500 to-accent-400"></span>
                    Qui sommes-nous
                </div>
                <h2 class="text-4xl lg:text-5xl font-display font-bold leading-tight mb-6">
                    <span class="text-ink-900">Réseau d'appui aux<br>Initiatives Locales</span>
                </h2>
                <p class="text-lg text-ink-500 leading-relaxed mb-8">
                    Le RAIL développe des projets visant l'autonomie des populations, le développement des compétences techniques et organisationnelles orientées vers l'entrepreneuriat, l'innovation et la créativité au profit des femmes et des jeunes.
                </p>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="relative p-5 rounded-xl bg-white/80 backdrop-blur-sm border border-primary-100/50 shadow-sm hover:shadow-lg hover:border-primary-200 transition-all duration-300 group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-sm bg-gradient-to-br from-primary-500 to-primary-600 text-white mb-3">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <span class="font-semibold text-sm text-ink-800">Agriculture durable</span>
                    </div>
                    <div class="relative p-5 rounded-xl bg-white/80 backdrop-blur-sm border border-accent-100/50 shadow-sm hover:shadow-lg hover:border-accent-200 transition-all duration-300 group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-sm bg-gradient-to-br from-accent-500 to-accent-600 text-white mb-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <span class="font-semibold text-sm text-ink-800">Numérique inclusif</span>
                    </div>
                    <div class="relative p-5 rounded-xl bg-white/80 backdrop-blur-sm border border-fire-100/50 shadow-sm hover:shadow-lg hover:border-fire-200 transition-all duration-300 group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-sm bg-gradient-to-br from-fire-500 to-fire-600 text-white mb-3">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <span class="font-semibold text-sm text-ink-800">Entrepreneuriat</span>
                    </div>
                    <div class="relative p-5 rounded-xl bg-white/80 backdrop-blur-sm border border-primary-100/50 shadow-sm hover:shadow-lg hover:border-primary-200 transition-all duration-300 group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-sm bg-gradient-to-br from-primary-500 to-primary-600 text-white mb-3">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <span class="font-semibold text-sm text-ink-800">Formation</span>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="inline-flex items-center gap-2.5 text-sm font-bold tracking-wider text-primary-600 hover:text-primary-700 transition-all duration-300 group">
                    <span class="relative">
                        En savoir plus
                        <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-gradient-to-r from-primary-500 to-accent-400 group-hover:w-full transition-all duration-500"></span>
                    </span>
                    <i class="fas fa-arrow-right text-xs transform group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Message du président --}}
<section class="relative overflow-hidden py-20 lg:py-28">
    <div class="absolute inset-0 bg-gradient-to-br from-primary-500 via-primary-400 to-primary-600"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[50rem] h-[50rem] bg-accent-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-primary-500/5 rounded-full blur-3xl"></div>
    <div class="absolute top-[20%] left-[10%] w-20 h-20 border border-accent-400/20 rounded-full"></div>
    <div class="absolute bottom-[20%] right-[15%] w-12 h-12 border border-ink-100/50 rounded-full"></div>

    <div class="container relative z-10">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-accent-300 mb-4">
                    <span class="w-8 h-[1.5px] bg-accent-400/60"></span>
                    Message du président
                </div>
                <h2 class="text-3xl lg:text-4xl font-display font-bold text-ink-900">
                    La vision qui nous<span class="text-ink-900"> anime</span>
                </h2>
            </div>

            <div class="relative">
                <div class="absolute -top-6 -left-2 text-6xl text-accent-400/20 font-display leading-none">"</div>
                <blockquote class="text-xl lg:text-2xl leading-relaxed text-ink-700 font-light max-w-3xl mx-auto text-center" style="font-family: 'Playfair Display', serif;">
                    Depuis 2003, jour après jour, nous travaillons main dans la main avec les communautés pour construire un avenir où chaque jeune, chaque femme peut réaliser son potentiel. L'autonomie n'est pas un don, c'est une conquête.
                </blockquote>
                <div class="absolute -bottom-10 -right-2 text-6xl text-accent-400/20 font-display leading-none">"</div>
            </div>

            <div class="flex items-center justify-center gap-4 mt-12 pt-8 border-t border-white/10">
                <div class="w-14 h-14 rounded-full flex items-center justify-center text-white font-bold text-lg bg-gradient-to-br from-accent-400 to-accent-600 shadow-lg shadow-accent-500/20">
                    AB
                </div>
                <div class="text-left">
                    <div class="font-bold text-ink-900 text-lg">Augustin BODJRENOU</div>
                    <div class="text-sm text-ink-600">Président du Conseil d'Administration</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Actualités --}}
<section class="relative overflow-hidden py-20 lg:py-28 bg-gradient-to-b from-white to-primary-50/20">
    <div class="absolute top-0 right-0 w-[30rem] h-[30rem] bg-primary-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-[25rem] h-[25rem] bg-accent-500/5 rounded-full blur-3xl"></div>

    <div class="container relative z-10">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-primary-600 mb-4">
                <span class="w-8 h-[1.5px] bg-gradient-to-r from-primary-500 to-accent-400"></span>
                Actualités
            </div>
            <h2 class="text-4xl lg:text-5xl font-display font-extrabold tracking-tight">
                <span class="text-ink-900">Dernières nouvelles</span>
            </h2>
            <p class="text-ink-400 text-lg mt-3">Suivez nos activités et projets au Bénin</p>
        </div>

        @forelse($articles->take(3) as $index => $article)
        <div class="group mb-8 lg:mb-10 last:mb-0">
            <article class="relative rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-500 bg-white border border-ink-100/50">
                <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                    <div class="lg:col-span-7 relative overflow-hidden min-h-[280px] lg:min-h-[380px] {{ $index % 2 === 1 ? 'lg:order-2' : '' }}">
                        <img src="{{ $article->featured_image ? asset($article->featured_image) : asset('images/galleries/img-1465_orig.jpg') }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent {{ $index % 2 === 1 ? 'lg:bg-gradient-to-l' : '' }}"></div>
                    </div>
                    <div class="lg:col-span-5 p-8 lg:p-10 lg:px-12 premium-border-l">
                        @if($article->category)
                        <span class="inline-block px-3 py-1.5 text-[0.625rem] font-bold tracking-wider uppercase bg-primary-50 text-primary-600 rounded-lg w-fit mb-4">{{ $article->category->name }}</span>
                        @endif
                        <time class="text-xs text-ink-400 flex items-center gap-1.5 mb-3">
                            <i class="far fa-calendar-alt"></i>
                            {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                        </time>
                        <h3 class="text-2xl lg:text-3xl font-display font-extrabold text-ink-900 leading-tight mb-4 group-hover:text-primary-600 transition-colors duration-300">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-ink-400 leading-relaxed mb-6 line-clamp-3">
                            {{ $article->excerpt ?: Str::limit(strip_tags($article->content), 150) }}
                        </p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-2.5 text-sm font-bold tracking-wider text-primary-600 bg-primary-50 rounded-xl px-5 py-3 hover:bg-primary-100 transition-all duration-300 group/link">
                            Lire l'article <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </article>
        </div>
        @empty
        <div class="text-center py-20">
            <div class="w-16 h-16 rounded-xl bg-ink-50 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-newspaper text-2xl text-ink-300"></i>
            </div>
            <p class="text-ink-400">Aucune actualité pour le moment</p>
        </div>
        @endforelse

        @if($articles->count() > 0)
        <div class="text-center mt-12">
            <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2.5 px-8 py-4 text-sm font-bold tracking-wider rounded-xl text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 hover:-translate-y-0.5 transition-all duration-300 shadow-lg shadow-primary-600/20">
                Voir toutes les actualités <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
        @endif
    </div>
</section>

{{-- Projets --}}
<section class="relative overflow-hidden py-20 lg:py-28 bg-gradient-to-br from-[#F8F7F6] via-white to-primary-50/30">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[50rem] h-[50rem] bg-accent-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-accent-500/5 rounded-full blur-3xl"></div>

    <div class="container relative z-10">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-primary-600 mb-4">
                <span class="w-8 h-[1.5px] bg-gradient-to-r from-primary-500 to-accent-400"></span>
                Projets
            </div>
            <h2 class="text-4xl lg:text-5xl font-display font-bold">
                <span class="text-ink-900">Nos initiatives</span>
            </h2>
            <p class="text-ink-400 text-lg mt-3">Découvrez les projets qui transforment les communautés</p>
        </div>

        @forelse($projects->take(3) as $index => $project)
        @if($index === 0)
        <div class="mb-8 lg:mb-10 group">
            <article class="relative rounded-2xl overflow-hidden shadow-lg premium-border-hero">
                <div class="relative min-h-[420px] lg:min-h-[520px] flex items-end">
                    <img src="{{ $project->featured_image ? asset($project->featured_image) : asset('images/galleries/image1.jpg') }}" alt="{{ $project->title }}" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>
                    <div class="relative z-10 p-8 lg:p-12 w-full max-w-3xl">
                        @if($project->status === 'en_cours')
                            <span class="inline-block px-3 py-1.5 text-[0.625rem] font-bold tracking-wider uppercase bg-accent-400 text-primary-900 rounded-lg w-fit mb-4 shadow-lg">En cours</span>
                        @elseif($project->status === 'termine')
                            <span class="inline-block px-3 py-1.5 text-[0.625rem] font-bold tracking-wider uppercase bg-green-400 text-white rounded-lg w-fit mb-4 shadow-lg">Terminé</span>
                        @else
                            <span class="inline-block px-3 py-1.5 text-[0.625rem] font-bold tracking-wider uppercase bg-white/20 backdrop-blur-sm text-white/90 rounded-lg w-fit mb-4 shadow-lg">Planifié</span>
                        @endif
                        @if($project->category)
                        <span class="text-ink-500 text-xs mb-2 block">{{ $project->category->name }}</span>
                        @endif
                        <h3 class="text-3xl lg:text-4xl font-display font-bold text-ink-900 leading-tight mb-4 group-hover:text-accent-300 transition-colors duration-300">
                            <a href="{{ route('projects.index') }}">{{ $project->title }}</a>
                        </h3>
                        <p class="text-ink-600 leading-relaxed mb-6 line-clamp-2 max-w-xl">
                            {{ Str::limit(strip_tags($project->content), 150) }}
                        </p>
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2.5 text-sm font-bold tracking-wider text-ink-700 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl px-6 py-3 hover:bg-white/20 hover:border-white/30 transition-all duration-300 group/link">
                            Découvrir nos projets <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </article>
        </div>
        @else
        @if($index === 1)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
        @endif
            <article class="group relative bg-white rounded-2xl overflow-hidden shadow-sm transition-all duration-500 premium-border-card">
                <div class="flex flex-col sm:flex-row items-stretch">
                    <div class="sm:w-[180px] lg:w-[200px] shrink-0 relative overflow-hidden min-h-[160px] sm:min-h-[180px]">
                        <img src="{{ $project->featured_image ? asset($project->featured_image) : asset('images/galleries/image1.jpg') }}" alt="{{ $project->title }}" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t sm:bg-gradient-to-r from-black/40 to-transparent"></div>
                        @if($project->status === 'en_cours')
                            <span class="absolute top-3 left-3 px-2 py-1 text-[0.55rem] font-bold tracking-wider uppercase bg-accent-400 text-primary-900 rounded-md">En cours</span>
                        @elseif($project->status === 'termine')
                            <span class="absolute top-3 left-3 px-2 py-1 text-[0.55rem] font-bold tracking-wider uppercase bg-green-400 text-white rounded-md">Terminé</span>
                        @else
                            <span class="absolute top-3 left-3 px-2 py-1 text-[0.55rem] font-bold tracking-wider uppercase bg-white/20 backdrop-blur-sm text-white rounded-md">Planifié</span>
                        @endif
                    </div>
                    <div class="flex-1 p-5 lg:p-6 flex flex-col justify-center">
                        @if($project->category)
                        <span class="text-xs text-ink-400 mb-1">{{ $project->category->name }}</span>
                        @endif
                        <h3 class="text-sm lg:text-base font-display font-bold text-ink-900 leading-snug mb-2 group-hover:text-accent-300 transition-colors duration-300 line-clamp-2">
                            <a href="{{ route('projects.index') }}">{{ $project->title }}</a>
                        </h3>
                        <p class="text-xs text-ink-400 leading-relaxed line-clamp-2 mb-3">
                            {{ Str::limit(strip_tags($project->content), 100) }}
                        </p>
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-1.5 text-[0.6rem] font-bold tracking-wider uppercase text-accent-400 group/link">
                            Projets <i class="fas fa-arrow-right text-[0.45rem] transition-transform duration-300 group-hover/link:translate-x-0.5"></i>
                        </a>
                    </div>
                </div>
            </article>
        @endif
        @empty
        <div class="text-center py-20 col-span-full">
            <div class="w-16 h-16 rounded-xl bg-ink-50 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-folder-open text-2xl text-ink-200"></i>
            </div>
            <p class="text-ink-400">Aucun projet pour le moment</p>
        </div>
        @endforelse
        @if($projects->count() > 0 && $projects->count() > 1)
        </div>
        @endif

        @if($projects->count() > 0)
        <div class="text-center mt-12">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2.5 px-8 py-4 text-sm font-bold tracking-wider rounded-xl text-primary-900 bg-gradient-to-r from-accent-400 to-accent-500 hover:from-accent-500 hover:to-accent-600 hover:-translate-y-0.5 transition-all duration-300 shadow-lg shadow-accent-500/20">
                Voir tous les projets <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="relative overflow-hidden py-24 lg:py-32">
    <div class="absolute inset-0 bg-gradient-to-br from-accent-600 via-accent-500 to-accent-700"></div>
    <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIvPjwvZz48L2c+PC9zdmc+')] opacity-50"></div>
    <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-200/40 rounded-full blur-3xl"></div>

    <div class="container text-center relative z-10">
        <div class="max-w-2xl mx-auto">
            <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-ink-500 mb-5">
                <span class="w-8 h-[1.5px] bg-white/40"></span>
                Engagement
            </div>
            <h2 class="text-4xl lg:text-5xl font-display font-bold text-ink-900 leading-tight mb-6">
                Ensemble, construisons<br>
                <span class="text-primary-900">l'autonomie</span> de demain
            </h2>
            <p class="text-ink-600 text-lg leading-relaxed max-w-lg mx-auto mb-10">
                Rejoignez-nous dans notre mission pour un Bénin où chaque communauté prend en main son développement.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2.5 px-8 py-4 text-sm font-bold tracking-wider text-accent-600 bg-white hover:bg-white/90 hover:-translate-y-0.5 transition-all duration-300 rounded-xl shadow-2xl shadow-black/20">
                    <i class="fas fa-handshake"></i>
                    Devenir partenaires
                </a>
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2.5 px-8 py-4 text-sm font-bold tracking-wider text-ink-600 border-2 border-white/20 hover:bg-white/10 hover:text-white hover:border-white/30 transition-all duration-300 rounded-xl">
                    <i class="fas fa-info-circle"></i>
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Partenaires --}}
<section class="relative overflow-hidden py-20 lg:py-28">
    <div class="absolute inset-0 bg-gradient-to-br from-[#F8F7F6] via-white to-primary-50/30"></div>
    <div class="absolute top-0 right-0 w-[30rem] h-[30rem] bg-accent-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-[25rem] h-[25rem] bg-primary-500/5 rounded-full blur-3xl"></div>

    <div class="container relative z-10">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-3 text-[0.625rem] font-bold tracking-[0.2em] uppercase text-primary-600 mb-4">
                <span class="w-8 h-[1.5px] bg-gradient-to-r from-primary-500 to-accent-400"></span>
                Partenaires
            </div>
            <h2 class="text-4xl lg:text-5xl font-display font-bold">
                <span class="text-ink-900">Ils nous soutiennent</span>
            </h2>
        </div>
        @if($partners->count() > 0)
        <div class="marquee-track">
            <div class="marquee-content flex items-center gap-12">
                @foreach(array_merge($partners->all(), $partners->all()) as $partner)
                <div class="flex flex-col items-center gap-2 min-w-[140px]">
                    <div class="w-24 h-16 bg-white rounded-xl shadow-sm border border-ink-100/50 flex items-center justify-center px-4 overflow-hidden">
                        @if($partner->logo)
                            <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="max-w-full max-h-full object-contain">
                        @else
                            <span class="text-lg font-bold text-primary-600">{{ strtoupper(substr($partner->name, 0, 2)) }}</span>
                        @endif
                    </div>
                    <span class="text-xs font-medium text-ink-600">{{ $partner->name }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection