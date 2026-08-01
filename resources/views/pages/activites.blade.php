@extends('layouts.app')

@section('title', 'Activités - RAIL Bénin')
@section('meta_description', 'Découvrez les activités et domaines d\'intervention du RAIL - Réseau d\'appui aux initiatives locales au Bénin.')

@section('content')

<section class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-chart-line"></i>
            Activités
        </div>
        <h1>Nos activités</h1>
        <p>Des actions concrètes pour un développement durable et inclusif au Bénin</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-seedling"></i>
                Agriculture durable
            </div>
            <h2 class="section-title">Promouvoir une agriculture <span class="text-primary-600">résiliente</span></h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center stagger">
            <div class="relative animate-fade-up">
                <div class="absolute -inset-3 rounded-xl bg-primary-500/5 blur-2xl"></div>
                <img src="{{ asset('images/galleries/Les_femmes_ecoutent.jpg') }}" alt="Agriculture durable" class="relative rounded-xl shadow-md object-cover w-full h-80 lg:h-[400px]">
            </div>
            <div class="animate-fade-up" style="animation-delay:200ms">
                <p class="text-surface-500 leading-relaxed mb-5">
                    Le RAIL met en œuvre des projets de <strong class="text-surface-800">formation en maraîchage biologique</strong> (FEM) pour doter les jeunes et les femmes de compétences pratiques en agriculture durable.
                </p>
                <p class="text-surface-500 leading-relaxed mb-5">
                    Nous promouvons les <strong class="text-surface-800">techniques agroécologiques</strong> résilientes face aux changements climatiques, notamment la production d'intrants biologiques, le compostage, la fabrication de bio-pesticides et l'utilisation du biochar.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Des <strong class="text-surface-800">champ-écoles</strong> sont aménagés pour permettre aux bénéficiaires de mettre en pratique les techniques apprises et de développer des exploitations agricoles productives et respectueuses de l'environnement.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-laptop-code"></i>
                Numérique
            </div>
            <h2 class="section-title">L'entrepreneuriat <span class="text-primary-600">numérique</span></h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center stagger">
            <div class="animate-fade-up order-2 lg:order-1">
                <p class="text-surface-500 leading-relaxed mb-5">
                    Nous formons les jeunes aux <strong class="text-surface-800">métiers du numérique</strong> : développement web, marketing digital, cybersécurité, broderie numérique et création de contenu.
                </p>
                <p class="text-surface-500 leading-relaxed mb-5">
                    À travers le projet <strong class="text-surface-800">D-CLIC</strong> de l'OIF et nos programmes d'entrepreneuriat numérique, nous outillons les jeunes filles et femmes pour leur autonomisation économique.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Des <strong class="text-surface-800">ateliers de stylisme, modélisme et couture</strong> sont également organisés, incluant la formation en broderie numérique pour renforcer les compétences techniques des apprenantes.
                </p>
            </div>
            <div class="relative animate-fade-up order-1 lg:order-2" style="animation-delay:200ms">
                <div class="absolute -inset-3 rounded-xl bg-amber-500/5 blur-2xl"></div>
                <img src="{{ asset('images/galleries/image3.jpg') }}" alt="Numérique inclusif" class="relative rounded-xl shadow-md object-cover w-full h-80 lg:h-[400px]">
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-graduation-cap"></i>
                Éducation
            </div>
            <h2 class="section-title">Soutien <span class="text-primary-600">scolaire</span> et éducatif</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center stagger">
            <div class="relative animate-fade-up">
                <div class="absolute -inset-3 rounded-xl bg-red-500/5 blur-2xl"></div>
                <img src="{{ asset('images/galleries/Groupe_avec_diplome.jpg') }}" alt="Soutien scolaire" class="relative rounded-xl shadow-md object-cover w-full h-80 lg:h-[400px]">
            </div>
            <div class="animate-fade-up" style="animation-delay:200ms">
                <p class="text-surface-500 leading-relaxed mb-5">
                    Le projet <strong class="text-surface-800">Aide aux Devoirs des Filles et Garçons</strong> offre un appui scolaire renforcé aux enfants issus de familles économiquement vulnérables.
                </p>
                <p class="text-surface-500 leading-relaxed mb-5">
                    Nous organisons la <strong class="text-surface-800">remise de kits scolaires</strong> chaque année pour alléger le poids financier des familles et offrir aux apprenants de meilleures conditions pour réussir leur parcours scolaire.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Des <strong class="text-surface-800">formations professionnelles</strong> en couture, broderie numérique et entrepreneuriat sont proposées aux jeunes pour faciliter leur insertion professionnelle.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-tree"></i>
                Environnement
            </div>
            <h2 class="section-title">Protection de l'<span class="text-primary-600">environnement</span></h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center stagger">
            <div class="animate-fade-up order-2 lg:order-1">
                <p class="text-surface-500 leading-relaxed mb-5">
                    Nous menons des <strong class="text-surface-800">campagnes de reboisement</strong> et de sensibilisation à la protection de l'environnement dans les communautés locales.
                </p>
                <p class="text-surface-500 leading-relaxed mb-5">
                    Le projet <strong class="text-surface-800">Agri-Résilience</strong> vise à renforcer la résilience des femmes agri-entrepreneures face aux changements climatiques, avec des technologies innovantes comme le pyrolyseur pour la production de biochar.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Nous formons les producteurs à la <strong class="text-surface-800">gestion durable des terres</strong>, à la fabrication d'intrants biologiques et aux techniques de compostage pour une agriculture respectueuse de l'environnement.
                </p>
            </div>
            <div class="relative animate-fade-up order-1 lg:order-2" style="animation-delay:200ms">
                <div class="absolute -inset-3 rounded-xl bg-primary-500/5 blur-2xl"></div>
                <img src="{{ asset('images/galleries/img-5769_orig.jpg') }}" alt="Environnement" class="relative rounded-xl shadow-md object-cover w-full h-80 lg:h-[400px]">
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-hand-holding-usd"></i>
                Autonomisation
            </div>
            <h2 class="section-title">Autonomisation <span class="text-primary-600">des femmes</span></h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center stagger">
            <div class="relative animate-fade-up">
                <div class="absolute -inset-3 rounded-xl bg-amber-500/5 blur-2xl"></div>
                <img src="{{ asset('images/galleries/Distribution_des_fonds.jpg') }}" alt="Autonomisation des femmes" class="relative rounded-xl shadow-md object-cover w-full h-80 lg:h-[400px]">
            </div>
            <div class="animate-fade-up" style="animation-delay:200ms">
                <p class="text-surface-500 leading-relaxed mb-5">
                    Grâce à notre <strong class="text-surface-800">partenariat avec l'UNACREP</strong>, nous facilitons l'accès au crédit pour les groupements de femmes, leur permettant de développer des activités génératrices de revenus.
                </p>
                <p class="text-surface-500 leading-relaxed mb-5">
                    Le projet <strong class="text-surface-800">Femmes agri-entrepreneures et résilience</strong> accompagne les femmes dans le développement de leurs compétences entrepreneuriales et techniques.
                </p>
                <p class="text-surface-500 leading-relaxed">
                    Des <strong class="text-surface-800">formations en entrepreneuriat numérique</strong> sont spécifiquement déduites aux jeunes filles et femmes pour renforcer leur autonomie économique et leur leadership.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container">
        <div class="cta-section animate-fade-up">
            <h2>Soutenez nos activités</h2>
            <p>Ensemble, nous pouvons créer un impact durable pour les communautés du Bénin</p>
            <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                <i class="fas fa-handshake"></i> Devenir partenaire
            </a>
        </div>
    </div>
</section>

@endsection
