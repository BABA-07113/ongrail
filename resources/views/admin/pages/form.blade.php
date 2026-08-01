@extends('layouts.admin')

@section('title', isset($page) ? 'Modifier la page' : 'Nouvelle page')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($page) ? 'Modifier la page' : 'Nouvelle page' }}</h3>
 <a href="{{ route('admin.pages.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store') }}" method="POST">
 @csrf
 @if(isset($page)) @method('PUT') @endif
 <div class="form-group">
 <label for="title">Titre *</label>
 <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $page->title ?? '') }}">
 </div>
 <div class="form-group">
 <label for="content">Contenu</label>
 <textarea name="content" id="content" class="form-control" style="min-height:300px;">{{ old('content', $page->content ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="template">Template</label>
 <input type="text" name="template" id="template" class="form-control" value="{{ old('template', $page->template ?? 'default') }}">
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;">
 <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $page->is_published ?? false) ? 'checked' : '' }}>
 <label for="is_published" style="margin:0;">Publiée</label>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($page) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
