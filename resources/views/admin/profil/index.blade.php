@extends('layouts.admin')

@section('title', 'Profil & coordonnées')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h3>Coordonnées de l'ONG</h3>
    </div>
    <form action="{{ route('admin.profil.update') }}" method="POST">
        @csrf
        <div class="card-body grid grid-cols-1 md:grid-cols-2 gap-x-6">
            <div class="form-group">
                <label class="form-label">Email de contact</label>
                <input type="email" name="contact_email" class="form-input" value="{{ $settings->get('contact')?->firstWhere('key', 'contact_email')?->value }}">
            </div>
            <div class="form-group">
                <label class="form-label">Téléphone principal</label>
                <input type="text" name="contact_phone" class="form-input" value="{{ $settings->get('contact')?->firstWhere('key', 'contact_phone')?->value }}">
            </div>
            <div class="form-group">
                <label class="form-label">Téléphone secondaire</label>
                <input type="text" name="contact_phone_2" class="form-input" value="{{ $settings->get('contact')?->firstWhere('key', 'contact_phone_2')?->value }}">
            </div>
            <div class="form-group md:col-span-2">
                <label class="form-label">Adresse</label>
                <textarea name="contact_address" class="form-input">{{ $settings->get('contact')?->firstWhere('key', 'contact_address')?->value }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Latitude (carte)</label>
                <input type="text" name="contact_map_lat" class="form-input" value="{{ $settings->get('contact')?->firstWhere('key', 'contact_map_lat')?->value }}">
            </div>
            <div class="form-group">
                <label class="form-label">Longitude (carte)</label>
                <input type="text" name="contact_map_lng" class="form-input" value="{{ $settings->get('contact')?->firstWhere('key', 'contact_map_lng')?->value }}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enregistrer</button>
        </div>
    </form>
</div>
@endsection
