@extends('layouts.app')

@php
    $contactAddress = \App\Models\Setting::getValue('contact_address', 'Quartier Koutongbé, 2ème Arrondissement, 01BP1585 Porto-Novo, Bénin');
    $contactPhone = \App\Models\Setting::getValue('contact_phone', '+229 96 01 20 48');
    $contactPhone2 = \App\Models\Setting::getValue('contact_phone_2', '+229 97 13 46 46');
    $contactEmail = \App\Models\Setting::getValue('contact_email', 'info@ongrail.com');
    $socialFacebook = \App\Models\Setting::getValue('social_facebook');
@endphp

@section('title', 'Contact - RAIL Bénin')

@section('content')

<section class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-envelope"></i>
            Contact
        </div>
        <h1>Contactez-nous</h1>
        <p>Nous sommes à votre écoute — N'hésitez pas à nous contacter</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
            <div class="animate-fade-left">
                <div class="section-tag mb-4">Nos coordonnées</div>
                <h2 class="text-2xl lg:text-3xl mb-8">
                    Restons en <span class="text-primary-600">contact</span>
                </h2>

                <div class="space-y-6">
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600 flex-shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-surface-800 text-base mb-0.5">Adresse</h4>
                            <p class="text-surface-500 text-sm leading-relaxed">{!! nl2br(e($contactAddress)) !!}</p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 flex-shrink-0">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-surface-800 text-base mb-0.5">Téléphone</h4>
                            <p class="text-surface-500 text-sm">{{ $contactPhone }}</p>
                            @if($contactPhone2)
                            <p class="text-surface-500 text-sm">{{ $contactPhone2 }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-lg bg-red-50 flex items-center justify-center text-red-600 flex-shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-surface-800 text-base mb-0.5">Email</h4>
                            <p class="text-surface-500 text-sm">{{ $contactEmail }}</p>
                        </div>
                    </div>

                    @if($socialFacebook)
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600 flex-shrink-0">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-surface-800 text-base mb-0.5">Facebook</h4>
                            <p><a href="{{ $socialFacebook }}" target="_blank" rel="noopener" class="text-primary-600 hover:text-primary-700 font-medium text-sm">{{ parse_url($socialFacebook, PHP_URL_HOST) }}</a></p>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="grid grid-cols-2 gap-3 mt-8 pt-8 border-t border-surface-100">
                    <div class="feature-card !p-4">
                        <div class="font-bold text-sm text-surface-800">Eric Prosper M. DOSSA</div>
                        <div class="text-xs text-surface-400 mt-1 leading-relaxed">
                            Directeur exécutif<br>
                            eric@ongrail.com<br>
                            +229 96 01 20 48
                        </div>
                    </div>
                    <div class="feature-card !p-4">
                        <div class="font-bold text-sm text-surface-800">Sylvie LABELLE</div>
                        <div class="text-xs text-surface-400 mt-1 leading-relaxed">
                            sylvie@ongrail.com<br>
                            +1 514 653 6954
                        </div>
                    </div>
                </div>
            </div>

            <div class="animate-fade-right">
                <div class="bg-white rounded-xl p-7 lg:p-8 border border-surface-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-surface-800">Envoyez-nous un message</h3>
                            <p class="text-xs text-surface-400">Nous vous répondrons rapidement</p>
                        </div>
                    </div>

                    @if(session('success'))
                    <div class="flex items-center gap-3 p-3 mb-5 rounded-lg bg-primary-50 border border-primary-100 text-primary-700 text-sm">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom complet <span class="text-danger-500">*</span></label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Votre nom et prénom">
                            @error('name')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger-500">*</span></label>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="votre@email.com">
                            @error('email')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet <span class="text-danger-500">*</span></label>
                            <input type="text" name="subject" id="subject" required value="{{ old('subject') }}" placeholder="Objet de votre message">
                            @error('subject')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span class="text-danger-500">*</span></label>
                            <textarea name="message" id="message" rows="4" required placeholder="Votre message...">{{ old('message') }}</textarea>
                            @error('message')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-full">
                            <i class="fas fa-paper-plane"></i>
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-compact bg-white">
    <div class="container">
        <div class="section-header animate-fade-up">
            <div class="section-tag">
                <i class="fas fa-map-marked-alt"></i>
                Localisation
            </div>
            <h2 class="section-title text-2xl lg:text-3xl">Où <span class="text-primary-600">nous trouver</span></h2>
        </div>
        <div class="rounded-xl overflow-hidden border border-surface-100 animate-fade-up shadow-sm">
            @php
                $mapLat = \App\Models\Setting::getValue('contact_map_lat', '6.4969');
                $mapLng = \App\Models\Setting::getValue('contact_map_lng', '2.6036');
            @endphp
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.123456!2d{{ $mapLng }}!3d{{ $mapLat }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMzAnMDAuMCJOIDLCsDM2JzAwLjAiRQ!5e0!3m2!1sfr!2sbj!4v1" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" title="Localisation RAIL Bénin"></iframe>
        </div>
    </div>
</section>

@endsection
