@extends('layouts.admin')

@section('title', isset($partner) ? 'Modifier le partenaire' : 'Nouveau partenaire')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($partner) ? 'Modifier le partenaire' : 'Nouveau partenaire' }}</h3>
 <a href="{{ route('admin.partenaires.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($partner) ? route('admin.partenaires.update', $partner) : route('admin.partenaires.store') }}" method="POST">
 @csrf
 @if(isset($partner)) @method('PUT') @endif
 <div class="form-group">
 <label for="name">Nom *</label>
 <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $partner->name ?? '') }}">
 </div>
 <div class="form-group">
 <label for="category">Catégorie</label>
 <select name="category" id="category" class="form-control">
 <option value="financier" {{ old('category', $partner->category ?? '') === 'financier' ? 'selected' : '' }}>Financier</option>
 <option value="technique" {{ old('category', $partner->category ?? '') === 'technique' ? 'selected' : '' }}>Technique</option>
 <option value="institutionnel" {{ old('category', $partner->category ?? '') === 'institutionnel' ? 'selected' : '' }}>Institutionnel</option>
 </select>
 </div>
 <div class="form-group">
 <label for="logo">Logo (URL)</label>
 <input type="text" name="logo" id="logo" class="form-control" value="{{ old('logo', $partner->logo ?? '') }}">
 </div>
 <div class="form-group">
 <label for="description">Description</label>
 <textarea name="description" id="description" class="form-control" style="min-height:150px;">{{ old('description', $partner->description ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="website_url">Site web</label>
 <input type="url" name="website_url" id="website_url" class="form-control" value="{{ old('website_url', $partner->website_url ?? '') }}">
 </div>
 <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
 <div class="form-group">
 <label for="sort_order">Ordre d'affichage</label>
 <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $partner->sort_order ?? 0) }}">
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;padding-top:32px;">
 <input type="checkbox" name="is_visible" id="is_visible" value="1" {{ old('is_visible', $partner->is_visible ?? true) ? 'checked' : '' }}>
 <label for="is_visible" style="margin:0;">Visible</label>
 </div>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($partner) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
