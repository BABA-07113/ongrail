@extends('layouts.admin')

@section('title', isset($article) ? 'Modifier l\'article' : 'Nouvel article')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($article) ? 'Modifier l\'article' : 'Nouvel article' }}</h3>
 <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($article) ? route('admin.articles.update', $article) : route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
 @csrf
 @if(isset($article)) @method('PUT') @endif
 <div class="card-body">
 <div class="form-group">
 <label for="title">Titre *</label>
 <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $article->title ?? '') }}">
 </div>
 <div class="form-group">
 <label for="category_id">Catégorie</label>
 <select name="category_id" id="category_id" class="form-control">
 <option value="">Sélectionner une catégorie</option>
 @foreach($categories as $cat)
 <option value="{{ $cat->id }}" {{ old('category_id', $article->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
 @endforeach
 </select>
 </div>
 <div class="form-group">
 <label for="excerpt">Extrait</label>
 <textarea name="excerpt" id="excerpt" class="form-control" style="min-height:100px;">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="content">Contenu *</label>
 <textarea name="content" id="content" class="form-control" style="min-height:400px;">{{ old('content', $article->content ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label>Image à la une</label>
 <div style="display:flex;gap:12px;flex-wrap:wrap;">
 <div style="flex:1;min-width:200px;">
 <label for="featured_image" class="form-label" style="font-size:12px;margin-bottom:4px;">URL externe</label>
 <input type="text" name="featured_image" id="featured_image" class="form-control" value="{{ old('featured_image', $article->featured_image ?? '') }}" placeholder="https://...">
 </div>
 <div style="flex:1;min-width:200px;">
 <label for="featured_image_file" class="form-label" style="font-size:12px;margin-bottom:4px;">Ou uploader un fichier</label>
 <input type="file" name="featured_image_file" id="featured_image_file" class="form-control" accept="image/*">
 </div>
 </div>
 @if(isset($article) && $article->featured_image)
 <div style="margin-top:8px;">
 <img src="{{ $article->featured_image }}" alt="Aperçu" style="max-height:100px;border-radius:8px;object-fit:cover;">
 </div>
 @endif
 </div>
 <div class="form-group">
 <label for="status">Statut</label>
 <select name="status" id="status" class="form-control">
 <option value="draft" {{ old('status', $article->status ?? '') === 'draft' ? 'selected' : '' }}>Brouillon</option>
 <option value="published" {{ old('status', $article->status ?? '') === 'published' ? 'selected' : '' }}>Publié</option>
 <option value="scheduled" {{ old('status', $article->status ?? '') === 'scheduled' ? 'selected' : '' }}>Programmé</option>
 </select>
 </div>
 <div class="form-group">
 <label for="published_at">Date de publication</label>
 <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}">
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;">
 <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $article->is_featured ?? false) ? 'checked' : '' }}>
 <label for="is_featured" style="margin:0;">Article à la une</label>
 </div>
 <div class="form-group">
 <label for="images">Nouvelles images pour la galerie</label>
 <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple>
 <p style="font-size:12px;color:var(--surface-500);margin-top:4px;">Vous pouvez sélectionner plusieurs fichiers à la fois.</p>
 </div>
 </div>
 <div class="card-footer">
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($article) ? 'Mettre à jour' : 'Créer' }}</button>
 </div>
 </form>
</div>

@if(isset($article) && $article->images->count() > 0)
<div class="admin-card mt-6">
 <div class="card-header">
 <h3>Images de la galerie ({{ $article->images->count() }})</h3>
 </div>
 <div class="card-body">
 <form action="{{ route('admin.articles.images.sort', $article) }}" method="POST">
 @csrf
 <div class="table-container">
 <table>
 <thead>
 <tr>
 <th style="width:120px;">Aperçu</th>
 <th>Légende</th>
 <th style="width:80px;">Ordre</th>
 <th style="width:80px;">Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach($article->images as $image)
 <tr>
 <td>
 <img src="{{ $image->image }}" alt="" style="width:100px;height:70px;object-fit:cover;border-radius:8px;">
 </td>
 <td>
 <input type="text" name="captions[{{ $image->id }}]" class="form-control" value="{{ $image->caption }}" placeholder="Légende optionnelle">
 </td>
 <td>
 <input type="number" name="sort_orders[{{ $image->id }}]" class="form-control" value="{{ $image->sort_order }}" min="0" style="width:70px;">
 </td>
 <td>
 <button type="button" class="action-btn delete" onclick="if(confirm('Supprimer cette image ?')) { document.getElementById('delete-image-{{ $image->id }}').submit(); }">
 <i class="fas fa-trash"></i>
 </button>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 <div class="card-footer" style="margin:-24px;margin-top:24px;">
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> Enregistrer les modifications</button>
 </div>
 </form>

 @foreach($article->images as $image)
 <form id="delete-image-{{ $image->id }}" action="{{ route('admin.articles.images.destroy', $image) }}" method="POST" style="display:none;">
 @csrf @method('DELETE')
 </form>
 @endforeach
 </div>
</div>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
 const featuredUrl = document.getElementById('featured_image');
 const featuredFile = document.getElementById('featured_image_file');
 if (featuredFile) {
 featuredFile.addEventListener('change', function() {
 if (this.files.length > 0) {
 featuredUrl.readOnly = true;
 featuredUrl.style.opacity = '0.5';
 } else {
 featuredUrl.readOnly = false;
 featuredUrl.style.opacity = '1';
 }
 });
 }
});
</script>
@endpush
