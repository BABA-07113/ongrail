@extends('layouts.admin')

@section('title', isset($gallery) ? 'Modifier l\'album' : 'Nouvel album')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($gallery) ? 'Modifier l\'album' : 'Nouvel album' }}</h3>
 <a href="{{ route('admin.galeries.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($gallery) ? route('admin.galeries.update', $gallery) : route('admin.galeries.store') }}" method="POST">
 @csrf
 @if(isset($gallery)) @method('PUT') @endif
 <div class="form-group">
 <label for="title">Titre *</label>
 <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $gallery->title ?? '') }}">
 </div>
 <div class="form-group">
 <label for="description">Description</label>
 <textarea name="description" id="description" class="form-control">{{ old('description', $gallery->description ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="cover_image">Image de couverture (URL)</label>
 <input type="text" name="cover_image" id="cover_image" class="form-control" value="{{ old('cover_image', $gallery->cover_image ?? '') }}">
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($gallery) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
