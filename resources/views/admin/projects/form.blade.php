@extends('layouts.admin')

@section('title', isset($project) ? 'Modifier le projet' : 'Nouveau projet')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($project) ? 'Modifier le projet' : 'Nouveau projet' }}</h3>
 <a href="{{ route('admin.projets.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($project) ? route('admin.projets.update', $project) : route('admin.projets.store') }}" method="POST">
 @csrf
 @if(isset($project)) @method('PUT') @endif
 <div class="form-group">
 <label for="title">Titre *</label>
 <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $project->title ?? '') }}">
 </div>
 <div class="form-group">
 <label for="project_category_id">Catégorie</label>
 <select name="project_category_id" id="project_category_id" class="form-control">
 <option value="">Sélectionner</option>
 @foreach($categories as $cat)
 <option value="{{ $cat->id }}" {{ old('project_category_id', $project->project_category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
 @endforeach
 </select>
 </div>
 <div class="form-group">
 <label for="content">Description</label>
 <textarea name="content" id="content" class="form-control" style="min-height:200px;">{{ old('content', $project->content ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="objectives">Objectifs</label>
 <textarea name="objectives" id="objectives" class="form-control" style="min-height:150px;">{{ old('objectives', $project->objectives ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="results">Résultats</label>
 <textarea name="results" id="results" class="form-control" style="min-height:150px;">{{ old('results', $project->results ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="featured_image">Image à la une (URL)</label>
 <input type="text" name="featured_image" id="featured_image" class="form-control" value="{{ old('featured_image', $project->featured_image ?? '') }}">
 </div>
 <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
 <div class="form-group">
 <label for="status">Statut</label>
 <select name="status" id="status" class="form-control">
 <option value="en_cours" {{ old('status', $project->status ?? '') === 'en_cours' ? 'selected' : '' }}>En cours</option>
 <option value="termine" {{ old('status', $project->status ?? '') === 'termine' ? 'selected' : '' }}>Terminé</option>
 <option value="planifie" {{ old('status', $project->status ?? '') === 'planifie' ? 'selected' : '' }}>Planifié</option>
 </select>
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;padding-top:32px;">
 <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}>
 <label for="is_featured" style="margin:0;">Projet à la une</label>
 </div>
 </div>
 <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
 <div class="form-group">
 <label for="start_date">Date de début</label>
 <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', isset($project) && $project->start_date ? $project->start_date->format('Y-m-d') : '') }}">
 </div>
 <div class="form-group">
 <label for="end_date">Date de fin</label>
 <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', isset($project) && $project->end_date ? $project->end_date->format('Y-m-d') : '') }}">
 </div>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($project) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
