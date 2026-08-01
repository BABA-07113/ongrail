@extends('layouts.admin')

@section('title', 'Images - ' . $gallery->title)

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Images de "{{ $gallery->title }}"</h3>
 <div>
 <a href="{{ route('admin.galeries.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 </div>

 <form action="{{ route('admin.galeries.images.upload', $gallery) }}" method="POST" enctype="multipart/form-data" style="margin-bottom:30px;padding:20px;background:var(--bg);border-radius:8px;">
 @csrf
 <div class="form-group">
 <label>Ajouter des images (max 5Mo par image)</label>
 <input type="file" name="images[]" multiple accept="image/*" class="form-control" required>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-upload"></i> Uploader</button>
 </form>

 <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:15px;">
 @forelse($gallery->images as $image)
 <div style="position:relative;border-radius:8px;overflow:hidden;">
 <img src="{{ $image->image }}" alt="{{ $image->caption ?: $gallery->title }}" style="width:100%;height:180px;object-fit:cover;">
 <form action="{{ route('admin.galeries.images.destroy', $image) }}" method="POST" style="position:absolute;top:5px;right:5px;">
 @csrf @method('DELETE')
 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette image ?')" style="padding:4px 8px;"><i class="fas fa-times"></i></button>
 </form>
 </div>
 @empty
 <div style="grid-column:1/-1;text-align:center;padding:40px;color:var(--text-light);">Aucune image dans cet album.</div>
 @endforelse
 </div>
</div>
@endsection
