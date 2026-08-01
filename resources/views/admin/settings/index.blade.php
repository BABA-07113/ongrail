@extends('layouts.admin')

@section('title', 'Paramètres')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Paramètres du site</h3>
 </div>
 <form action="{{ route('admin.parametres.update') }}" method="POST">
 @csrf
 <div class="form-group">
 <label>Nom du site</label>
 <input type="text" name="site_name" class="form-control" value="{{ $settings->get('general')?->firstWhere('key', 'site_name')?->value ?? 'OngRail' }}">
 </div>
 <div class="form-group">
 <label>Email de contact</label>
 <input type="email" name="contact_email" class="form-control" value="{{ $settings->get('general')?->firstWhere('key', 'contact_email')?->value ?? 'info@ongrail.com' }}">
 </div>
 <div class="form-group">
 <label>Téléphone</label>
 <input type="text" name="contact_phone" class="form-control" value="{{ $settings->get('general')?->firstWhere('key', 'contact_phone')?->value ?? '+229 96 01 20 48' }}">
 </div>
 <div class="form-group">
 <label>Adresse</label>
 <textarea name="contact_address" class="form-control" style="min-height:80px;">{{ $settings->get('general')?->firstWhere('key', 'contact_address')?->value ?? 'Quartier Koutongbé, 2ème Arrondissement, 01BP1585 Porto-Novo (Bénin)' }}</textarea>
 </div>
 <div class="form-group">
 <label>Facebook URL</label>
 <input type="url" name="facebook_url" class="form-control" value="{{ $settings->get('social')?->firstWhere('key', 'facebook_url')?->value ?? 'https://www.facebook.com/railbenin' }}">
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> Enregistrer</button>
 </form>
</div>
@endsection
