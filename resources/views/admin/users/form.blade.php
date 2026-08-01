@extends('layouts.admin')

@section('title', isset($user) ? 'Modifier l\'utilisateur' : 'Nouvel utilisateur')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($user) ? 'Modifier l\'utilisateur' : 'Nouvel utilisateur' }}</h3>
 <a href="{{ route('admin.utilisateurs.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($user) ? route('admin.utilisateurs.update', $user) : route('admin.utilisateurs.store') }}" method="POST">
 @csrf
 @if(isset($user)) @method('PUT') @endif
 <div class="form-group">
 <label for="name">Nom *</label>
 <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $user->name ?? '') }}">
 </div>
 <div class="form-group">
 <label for="email">Email *</label>
 <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $user->email ?? '') }}">
 </div>
 <div class="form-group">
 <label for="phone">Téléphone</label>
 <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}">
 </div>
 <div class="form-group">
 <label for="role">Rôle</label>
 <select name="role" id="role" class="form-control">
 <option value="redacteur" {{ old('role', $user->role ?? '') === 'redacteur' ? 'selected' : '' }}>Rédacteur</option>
 <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Administrateur</option>
 <option value="super_admin" {{ old('role', $user->role ?? '') === 'super_admin' ? 'selected' : '' }}>Super Administrateur</option>
 </select>
 </div>
 <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
 <div class="form-group">
 <label for="password">{{ isset($user) ? 'Nouveau mot de passe (laisser vide pour conserver)' : 'Mot de passe *' }}</label>
 <input type="password" name="password" id="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
 </div>
 <div class="form-group">
 <label for="password_confirmation">Confirmer le mot de passe</label>
 <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
 </div>
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;">
 <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }}>
 <label for="is_active" style="margin:0;">Actif</label>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($user) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>
@endsection
