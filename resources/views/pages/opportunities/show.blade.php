@extends('layouts.app')

@section('title', $opportunity->title . ' - RAIL Bénin')

@section('content')

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-bullhorn"></i>
            {{ str_replace(['_', 'appel_candidature'], [' ', 'Appel à candidature'], ucfirst($opportunity->type)) }}
        </div>
        <h1>{{ $opportunity->title }}</h1>
    </div>
</div>

<section class="py-14 lg:py-20">
    <div class="container-narrow">

        @if(session('success'))
        <div class="mb-6 p-4 bg-primary-50 border border-primary-100 rounded-lg text-primary-700 text-sm animate-fade-up">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
        @endif

        @if($opportunity->deadline)
        <div class="flex items-center gap-2 text-sm text-surface-500 mb-6">
            <i class="far fa-calendar-alt text-primary-600"></i>
            Date limite : {{ $opportunity->deadline->format('d F Y') }}
        </div>
        @endif

        <div class="text-sm leading-relaxed text-surface-600 animate-fade-up">
            {!! $opportunity->description !!}
        </div>

        @if($opportunity->status === 'resultats_publies' && ($opportunity->results_description || $opportunity->results_file))
        <div class="mt-8 p-6 bg-surface-50 rounded-xl border border-surface-200 animate-fade-up">
            <h3 class="font-bold text-base mb-3 flex items-center gap-2">
                <i class="fas fa-check-circle text-primary-600"></i> Résultats
            </h3>
            @if($opportunity->results_description)
            <div class="text-sm leading-relaxed text-surface-600">{!! $opportunity->results_description !!}</div>
            @endif
            @if($opportunity->results_file)
            <a href="{{ $opportunity->results_file }}" class="btn btn-primary btn-sm mt-4">
                <i class="fas fa-download"></i> Télécharger les résultats
            </a>
            @endif
        </div>
        @endif

        @if($opportunity->status === 'ouvert')
        <div class="mt-10 p-7 bg-white rounded-xl border border-surface-100 shadow-sm animate-fade-up">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600">
                    <i class="fas fa-pen-to-square"></i>
                </div>
                <div>
                    <h2 class="font-bold">Formulaire d'inscription</h2>
                    <p class="text-xs text-surface-400">Remplissez le formulaire pour postuler</p>
                </div>
            </div>

            @if($errors->any())
            <div class="mb-5 p-3 bg-red-50 border border-red-100 rounded-lg text-red-600 text-sm">
                <i class="fas fa-exclamation-circle mr-2"></i> Veuillez corriger les erreurs ci-dessous.
            </div>
            @endif

            <form action="{{ route('opportunities.apply', $opportunity) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label>Nom complet <span class="text-danger-500">*</span></label>
                        <input type="text" name="applicant_name" value="{{ old('applicant_name') }}" required placeholder="Votre nom complet">
                        @error('applicant_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger-500">*</span></label>
                        <input type="email" name="applicant_email" value="{{ old('applicant_email') }}" required placeholder="votre@email.com">
                        @error('applicant_email') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="tel" name="applicant_phone" value="{{ old('applicant_phone') }}" placeholder="+229 XX XX XX XX">
                    @error('applicant_phone') <p class="form-error">{{ $message }}</p> @enderror
                </div>

                @if($opportunity->has_form && $opportunity->form_schema)
                <hr class="border-surface-200 my-4">
                <p class="text-xs text-surface-400 uppercase tracking-widest font-semibold mb-4">Informations complémentaires</p>
                @foreach($opportunity->form_schema as $field)
                <div class="form-group">
                    <label>
                        {{ $field['label'] }}
                        @if($field['required'] ?? false) <span class="text-danger-500">*</span> @endif
                    </label>
                    @if($field['type'] === 'textarea')
                    <textarea name="field_{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}" {{ ($field['required'] ?? false) ? 'required' : '' }} rows="4">{{ old('field_' . $field['name']) }}</textarea>
                    @elseif($field['type'] === 'select')
                    <select name="field_{{ $field['name'] }}" {{ ($field['required'] ?? false) ? 'required' : '' }}>
                        <option value="">-- Sélectionnez --</option>
                        @if(is_array($field['options'] ?? null))
                        @foreach($field['options'] as $opt)
                        <option value="{{ $opt }}" {{ old('field_' . $field['name']) === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                        @endif
                    </select>
                    @elseif($field['type'] === 'file')
                    <input type="file" name="field_{{ $field['name'] }}" {{ ($field['required'] ?? false) ? 'required' : '' }}>
                    @else
                    <input type="{{ $field['type'] }}" name="field_{{ $field['name'] }}" value="{{ old('field_' . $field['name']) }}" placeholder="{{ $field['placeholder'] ?? '' }}" {{ ($field['required'] ?? false) ? 'required' : '' }}>
                    @endif
                    @error('field_' . $field['name']) <p class="form-error">{{ $message }}</p> @enderror
                </div>
                @endforeach
                @endif

                <button type="submit" class="btn btn-primary btn-lg w-full">
                    <i class="fas fa-paper-plane"></i> Soumettre ma candidature
                </button>
            </form>
        </div>
        @endif

    </div>
</section>

@endsection
