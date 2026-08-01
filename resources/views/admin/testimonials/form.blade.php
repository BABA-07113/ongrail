@extends('layouts.admin')

@section('title', isset($testimonial) ? 'Modifier le témoignage' : 'Nouveau témoignage')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($testimonial) ? 'Modifier le témoignage' : 'Nouveau témoignage' }}</h3>
 <a href="{{ route('admin.temoignages.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($testimonial) ? route('admin.temoignages.update', $testimonial) : route('admin.temoignages.store') }}" method="POST">
 @csrf
 @if(isset($testimonial)) @method('PUT') @endif
 <div class="form-group">
 <label for="name">Nom *</label>
 <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $testimonial->name ?? '') }}">
 </div>
 <div class="form-group">
 <label for="function">Fonction</label>
 <input type="text" name="function" id="function" class="form-control" value="{{ old('function', $testimonial->function ?? '') }}">
 </div>
 <div class="form-group">
 <label for="type">Type</label>
 <select name="type" id="type" class="form-control">
 <option value="beneficiaire" {{ old('type', $testimonial->type ?? '') === 'beneficiaire' ? 'selected' : '' }}>Bénéficiaire</option>
 <option value="formateur" {{ old('type', $testimonial->type ?? '') === 'formateur' ? 'selected' : '' }}>Formateur</option>
 <option value="partenaire" {{ old('type', $testimonial->type ?? '') === 'partenaire' ? 'selected' : '' }}>Partenaire</option>
 </select>
 </div>
 <div class="form-group">
 <label for="photo">Photo (URL)</label>
 <input type="text" name="photo" id="photo" class="form-control" value="{{ old('photo', $testimonial->photo ?? '') }}">
 </div>
 <div class="form-group">
 <label for="content">Témoignage *</label>
 <textarea name="content" id="content" class="form-control" style="min-height:150px;" required>{{ old('content', $testimonial->content ?? '') }}</textarea>
 </div>
 <div style="display:flex;gap:20px;">
 <div class="form-group" style="display:flex;align-items:center;gap:8px;">
 <input type="checkbox" name="is_approved" id="is_approved" value="1" {{ old('is_approved', $testimonial->is_approved ?? false) ? 'checked' : '' }}>
 <label for="is_approved" style="margin:0;">Approuvé</label>
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;">
 <input type="checkbox" name="is_visible" id="is_visible" value="1" {{ old('is_visible', $testimonial->is_visible ?? false) ? 'checked' : '' }}>
 <label for="is_visible" style="margin:0;">Visible</label>
 </div>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($testimonial) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
