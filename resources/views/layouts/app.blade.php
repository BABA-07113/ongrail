<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', "RAIL Bénin - Réseau d'appui aux initiatives locales")">
    <meta name="theme-color" content="#007A5E">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <title>@yield('title', "RAIL Bénin | Réseau d'appui aux initiatives locales")</title>

    <link rel="preload" href="{{ asset('vendor/fontawesome/css/all.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="preload" href="{{ asset('vendor/fonts/google-fonts.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/google-fonts.css') }}">

    <style>
        :root { --bg-texture: url('{{ asset('images/' . rawurlencode('arrière.png')) }}'); }
    </style>

    @include('partials.vite-assets')
</head>
<body class="bg-[#F8F7F6] text-ink-800 antialiased">

    <div id="preloader" class="preloader">
        <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin" class="preloader-logo">
        <div class="preloader-bar"></div>
    </div>

    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin">
            </a>

            <div class="navbar-menu" id="navMenu">
                <a href="{{ route('articles.index') }}" class="navbar-link {{ request()->routeIs('articles.*') ? 'active' : '' }}">Nouvelles</a>
                <a href="{{ route('about') }}" class="navbar-link {{ request()->routeIs('about') ? 'active' : '' }}">Mission</a>
                <a href="{{ route('activites') }}" class="navbar-link {{ request()->routeIs('activites') ? 'active' : '' }}">Activités</a>
                <a href="{{ route('projects.index') }}" class="navbar-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Projets</a>
                <a href="{{ route('opportunities.index') }}" class="navbar-link {{ request()->routeIs('opportunities.*') ? 'active' : '' }}">Opportunités</a>
                <a href="{{ route('galleries.index') }}" class="navbar-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}">Galeries</a>
                <a href="{{ route('contact') }}" class="navbar-cta">
                    <i class="fas fa-paper-plane"></i> Contact
                </a>
                <a href="{{ route('admin.login') }}" class="navbar-link" title="Espace administrateur" aria-label="Espace administrateur">
                    <i class="fas fa-lock"></i>
                </a>
            </div>

            <button class="lg:hidden relative z-50 w-10 h-10 flex items-center justify-center rounded-lg hover:bg-ink-50 transition-all" id="menuBtn" aria-label="Menu">
                <i class="fas fa-bars text-base text-ink-600" id="menuIcon"></i>
            </button>
        </div>
    </nav>

    <div class="mobile-menu hidden" id="mobileMenu">
        <a href="{{ route('home') }}" class="mobile-logo" onclick="closeMenu()">
            <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin">
        </a>
        <nav class="mobile-links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" onclick="closeMenu()">Accueil</a>
            <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.*') ? 'active' : '' }}" onclick="closeMenu()">Nouvelles</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" onclick="closeMenu()">Mission</a>
            <a href="{{ route('activites') }}" class="{{ request()->routeIs('activites') ? 'active' : '' }}" onclick="closeMenu()">Activités</a>
            <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}" onclick="closeMenu()">Projets</a>
            <a href="{{ route('opportunities.index') }}" class="{{ request()->routeIs('opportunities.*') ? 'active' : '' }}" onclick="closeMenu()">Opportunités</a>
            <a href="{{ route('galleries.index') }}" class="{{ request()->routeIs('galleries.*') ? 'active' : '' }}" onclick="closeMenu()">Galeries</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" onclick="closeMenu()">Contact</a>
            <a href="{{ route('admin.login') }}" class="inline-flex items-center justify-center {{ request()->routeIs('admin.login') ? 'active' : '' }}" onclick="closeMenu()" title="Espace administrateur" aria-label="Espace administrateur"><i class="fas fa-lock"></i></a>
        </nav>
    </div>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="relative overflow-hidden bg-gradient-to-br from-primary-800 via-primary-700 to-primary-900">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[60rem] h-[60rem] bg-accent-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute top-[30%] left-[5%] w-16 h-16 border border-accent-400/10 rounded-full"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 lg:py-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12">

                <div class="sm:col-span-2 lg:col-span-4">
                    <a href="{{ route('home') }}" class="block mb-6">
                        <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin" class="h-16 w-auto">
                    </a>
                    <p class="text-sm leading-relaxed text-white max-w-xs mb-6">
                        Le RAIL développe des projets concrets pour l'autonomie des populations, des compétences techniques et organisationnelles au profit des femmes et des jeunes au Bénin.
                    </p>
                    @php
                        $socialFacebook = \App\Models\Setting::getValue('social_facebook');
                        $socialLinkedin = \App\Models\Setting::getValue('social_linkedin');
                        $socialYoutube = \App\Models\Setting::getValue('social_youtube');
                    @endphp
                    <div class="flex items-center gap-3">
                        @if($socialFacebook)
                        <a href="{{ $socialFacebook }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl flex items-center justify-center bg-white/10 text-white/60 hover:bg-gradient-to-br hover:from-primary-500 hover:to-accent-500 hover:text-white transition-all duration-300 border border-white/10 hover:border-transparent">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        @endif
                        @if($socialLinkedin)
                        <a href="{{ $socialLinkedin }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl flex items-center justify-center bg-white/10 text-white/60 hover:bg-gradient-to-br hover:from-primary-500 hover:to-accent-500 hover:text-white transition-all duration-300 border border-white/10 hover:border-transparent">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        @endif
                        @if($socialYoutube)
                        <a href="{{ $socialYoutube }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl flex items-center justify-center bg-white/10 text-white/60 hover:bg-gradient-to-br hover:from-primary-500 hover:to-accent-500 hover:text-white transition-all duration-300 border border-white/10 hover:border-transparent">
                            <i class="fab fa-youtube"></i>
                        </a>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <h4 class="text-white font-bold text-xs tracking-[0.2em] uppercase mb-6 relative">
                        <span class="relative z-10">Navigation</span>
                        <span class="absolute -bottom-1 left-0 w-8 h-[2px] bg-gradient-to-r from-accent-400 to-accent-500 rounded-full"></span>
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Mission</a></li>
                        <li><a href="{{ route('activites') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Activités</a></li>
                        <li><a href="{{ route('projects.index') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Projets</a></li>
                        <li><a href="{{ route('opportunities.index') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Opportunités</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-2">
                    <h4 class="text-white font-bold text-xs tracking-[0.2em] uppercase mb-6 relative">
                        <span class="relative z-10">Pages</span>
                        <span class="absolute -bottom-1 left-0 w-8 h-[2px] bg-gradient-to-r from-accent-400 to-accent-500 rounded-full"></span>
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('articles.index') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Actualités</a></li>
                        <li><a href="{{ route('galleries.index') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Galeries</a></li>
                        <li><a href="{{ route('partners.index') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Partenaires</a></li>
                        <li><a href="{{ route('testimonials.index') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Témoignages</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-white hover:text-accent-300 hover:translate-x-1 transition-all duration-300 inline-flex items-center gap-2"><i class="fas fa-chevron-right text-[0.4rem] text-accent-400"></i>Contact</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-3">
                    <h4 class="text-white font-bold text-xs tracking-[0.2em] uppercase mb-6 relative">
                        <span class="relative z-10">Contact</span>
                        <span class="absolute -bottom-1 left-0 w-8 h-[2px] bg-gradient-to-r from-accent-400 to-accent-500 rounded-full"></span>
                    </h4>
                    @php
                        $footerAddress = \App\Models\Setting::getValue('contact_address', 'Cotonou, Bénin');
                        $footerEmail = \App\Models\Setting::getValue('contact_email', 'info@ongrail.com');
                        $footerPhone = \App\Models\Setting::getValue('contact_phone', '+229 96 01 20 48');
                    @endphp
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-accent-400 text-xs"></i>
                            </span>
                            <span class="text-white mt-1.5">{{ $footerAddress }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-accent-400 text-xs"></i>
                            </span>
                            <a href="mailto:{{ $footerEmail }}" class="text-white hover:text-accent-300 transition-colors duration-300 mt-1.5">{{ $footerEmail }}</a>
                        </li>
                        <li class="flex items-start gap-3 text-sm">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-accent-400 text-xs"></i>
                            </span>
                            <span class="text-white mt-1.5">{{ $footerPhone }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="relative z-10 border-t border-white/5 py-6">
            <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/60">
                    <span>&copy; {{ date('Y') }} RAIL Bénin. Tous droits réservés.</span>
                    <span class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-accent-400/50"></span>
                        Construire l'autonomie, ensemble.
                        <span class="w-1.5 h-1.5 rounded-full bg-accent-400/50"></span>
                    </span>
                </div>
                <div class="mt-4 text-center">
                    <span class="text-xs text-white/60">Développé par
                        <a href="https://wa.me/22954253797" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 font-semibold text-accent-400 underline underline-offset-4 hover:text-accent-300 hover:underline-offset-8 transition-all duration-300" title="Contacter Inès GANDAHO sur WhatsApp">
                            Inès GANDAHO <i class="fas fa-external-link-alt text-[0.6rem]"></i>
                        </a>
                        <span class="text-white/40">— cliquez pour contacter</span>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const preloader = document.getElementById('preloader');
        function hidePreloader() {
            if (preloader) {
                document.body.classList.remove('preloader-active');
                preloader.classList.add('hidden');
            }
        }
        document.body.classList.add('preloader-active');
        window.addEventListener('load', hidePreloader);
        setTimeout(hidePreloader, 3500);

        const navbar = document.getElementById('navbar');
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');
        let isMenuOpen = false;

        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });

        function closeMenu() {
            mobileMenu.classList.add('hidden');
            menuIcon.className = 'fas fa-bars text-base text-ink-600';
            isMenuOpen = false;
            document.body.style.overflow = '';
            document.body.classList.remove('menu-open');
        }

        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            mobileMenu.classList.toggle('hidden');
            menuIcon.className = isMenuOpen
                ? 'fas fa-times text-base text-ink-800'
                : 'fas fa-bars text-base text-ink-600';
            document.body.style.overflow = isMenuOpen ? 'hidden' : '';
            document.body.classList.toggle('menu-open', isMenuOpen);
        }

        if (menuBtn) menuBtn.addEventListener('click', toggleMenu);

        window.addEventListener('resize', () => {
            if (isMenuOpen && window.innerWidth >= 1024) closeMenu();
        });

        document.addEventListener('click', (e) => {
            if (isMenuOpen && !e.target.closest('#mobileMenu') && !e.target.closest('#menuBtn')) closeMenu();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMenuOpen) closeMenu();
        });

        if (window.scrollY > 20) navbar.classList.add('scrolled');
    </script>

    @stack('scripts')
</body>
</html>
