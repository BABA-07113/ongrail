@extends('layouts.admin')

@section('title', isset($teamMember) ? 'Modifier le membre' : 'Nouveau membre')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($teamMember) ? 'Modifier le membre' : 'Nouveau membre' }}</h3>
 <a href="{{ route('admin.equipe.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($teamMember) ? route('admin.equipe.update', $teamMember) : route('admin.equipe.store') }}" method="POST">
 @csrf
 @if(isset($teamMember)) @method('PUT') @endif
 <div class="form-group">
 <label for="name">Nom *</label>
 <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $teamMember->name ?? '') }}">
 </div>
 <div class="form-group">
 <label for="position">Poste *</label>
 <input type="text" name="position" id="position" class="form-control" required value="{{ old('position', $teamMember->position ?? '') }}">
 </div>
 <div class="form-group">
 <label for="group">Groupe</label>
 <select name="group" id="group" class="form-control">
 <option value="conseil_administration" {{ old('group', $teamMember->group ?? '') === 'conseil_administration' ? 'selected' : '' }}>Conseil d'administration</option>
 <option value="executif" {{ old('group', $teamMember->group ?? '') === 'executif' ? 'selected' : '' }}>Direction exécutive</option>
 </select>
 </div>
 <div class="form-group">
 <label for="photo">Photo (URL)</label>
 <input type="text" name="photo" id="photo" class="form-control" value="{{ old('photo', $teamMember->photo ?? '') }}">
 </div>
 <div class="form-group">
 <label for="bio">Biographie</label>
 <textarea name="bio" id="bio" class="form-control" style="min-height:150px;">{{ old('bio', $teamMember->bio ?? '') }}</textarea>
 </div>
 <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
 <div class="form-group">
 <label for="sort_order">Ordre d'affichage</label>
 <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $teamMember->sort_order ?? 0) }}">
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;padding-top:32px;">
 <input type="checkbox" name="is_visible" id="is_visible" value="1" {{ old('is_visible', $teamMember->is_visible ?? true) ? 'checked' : '' }}>
 <label for="is_visible" style="margin:0;">Visible</label>
 </div>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($teamMember) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
