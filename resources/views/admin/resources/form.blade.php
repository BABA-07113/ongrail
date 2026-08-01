@extends('layouts.admin')

@section('title', isset($resource) ? 'Modifier la ressource' : 'Nouvelle ressource')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($resource) ? 'Modifier la ressource' : 'Nouvelle ressource' }}</h3>
 <a href="{{ route('admin.ressources.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($resource) ? route('admin.ressources.update', $resource) : route('admin.ressources.store') }}" method="POST">
 @csrf
 @if(isset($resource)) @method('PUT') @endif
 <div class="form-group">
 <label for="title">Titre *</label>
 <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $resource->title ?? '') }}">
 </div>
 <div class="form-group">
 <label for="category">Catégorie</label>
 <select name="category" id="category" class="form-control">
 <option value="">Sélectionner</option>
 <option value="guide" {{ old('category', $resource->category ?? '') === 'guide' ? 'selected' : '' }}>Guide</option>
 <option value="rapport" {{ old('category', $resource->category ?? '') === 'rapport' ? 'selected' : '' }}>Rapport</option>
 <option value="etude" {{ old('category', $resource->category ?? '') === 'etude' ? 'selected' : '' }}>Étude</option>
 <option value="support" {{ old('category', $resource->category ?? '') === 'support' ? 'selected' : '' }}>Support</option>
 <option value="manuel" {{ old('category', $resource->category ?? '') === 'manuel' ? 'selected' : '' }}>Manuel</option>
 </select>
 </div>
 <div class="form-group">
 <label for="description">Description</label>
 <textarea name="description" id="description" class="form-control" style="min-height:100px;">{{ old('description', $resource->description ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="file_path">Chemin du fichier *</label>
 <input type="text" name="file_path" id="file_path" class="form-control" required value="{{ old('file_path', $resource->file_path ?? '') }}">
 <small style="color:var(--text-light);">Chemin relatif dans storage/app/public/</small>
 </div>
 <div class="form-group">
 <label for="file_type">Type de fichier</label>
 <input type="text" name="file_type" id="file_type" class="form-control" value="{{ old('file_type', $resource->file_type ?? 'pdf') }}">
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;">
 <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $resource->is_published ?? false) ? 'checked' : '' }}>
 <label for="is_published" style="margin:0;">Publiée</label>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($resource) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
