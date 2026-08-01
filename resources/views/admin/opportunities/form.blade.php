@extends('layouts.admin')

@section('title', isset($opportunity) ? 'Modifier l\'opportunité' : 'Nouvelle opportunité')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>{{ isset($opportunity) ? 'Modifier l\'opportunité' : 'Nouvelle opportunité' }}</h3>
 <a href="{{ route('admin.opportunites.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <form action="{{ isset($opportunity) ? route('admin.opportunites.update', $opportunity) : route('admin.opportunites.store') }}" method="POST">
 @csrf
 @if(isset($opportunity)) @method('PUT') @endif
 <div class="form-group">
 <label for="title">Titre *</label>
 <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $opportunity->title ?? '') }}">
 </div>
 <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
 <div class="form-group">
 <label for="type">Type</label>
 <select name="type" id="type" class="form-control">
 <option value="appel_candidature" {{ old('type', $opportunity->type ?? '') === 'appel_candidature' ? 'selected' : '' }}>Appel à candidature</option>
 <option value="formation" {{ old('type', $opportunity->type ?? '') === 'formation' ? 'selected' : '' }}>Formation</option>
 <option value="stage" {{ old('type', $opportunity->type ?? '') === 'stage' ? 'selected' : '' }}>Stage</option>
 <option value="emploi" {{ old('type', $opportunity->type ?? '') === 'emploi' ? 'selected' : '' }}>Emploi</option>
 <option value="volontariat" {{ old('type', $opportunity->type ?? '') === 'volontariat' ? 'selected' : '' }}>Volontariat</option>
 </select>
 </div>
 <div class="form-group">
 <label for="status">Statut</label>
 <select name="status" id="status" class="form-control">
 <option value="ouvert" {{ old('status', $opportunity->status ?? '') === 'ouvert' ? 'selected' : '' }}>Ouvert</option>
 <option value="cloture" {{ old('status', $opportunity->status ?? '') === 'cloture' ? 'selected' : '' }}>Clôturé</option>
 <option value="resultats_publies" {{ old('status', $opportunity->status ?? '') === 'resultats_publies' ? 'selected' : '' }}>Résultats publiés</option>
 </select>
 </div>
 </div>
 <div class="form-group">
 <label for="deadline">Date limite</label>
 <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', isset($opportunity) && $opportunity->deadline ? $opportunity->deadline->format('Y-m-d') : '') }}">
 </div>
 <div class="form-group">
 <label for="description">Description</label>
 <textarea name="description" id="description" class="form-control" style="min-height:200px;">{{ old('description', $opportunity->description ?? '') }}</textarea>
 </div>

 <!-- Form Builder Section -->
 <div style="margin:30px 0;padding:24px;background:#f8fafc;border-radius:12px;border:2px dashed #e2e8f0;">
 <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;">
 <input type="checkbox" name="has_form" id="has_form" value="1" {{ old('has_form', $opportunity->has_form ?? false) ? 'checked' : '' }} onchange="toggleFormBuilder()">
 <label for="has_form" style="margin:0;font-weight:700;font-size:15px;">Activer le formulaire d'inscription</label>
 </div>
 <div id="formBuilder" style="display:{{ old('has_form', $opportunity->has_form ?? false) ? 'block' : 'none' }};">
 <p style="font-size:13px;color:#64748b;margin-bottom:16px;">Ajoutez les champs du formulaire. Les champs "Nom", "Email" et "Téléphone" sont automatiquement inclus.</p>
 <div id="formFields" class="space-y-3">
 @if(isset($opportunity) && $opportunity->form_schema)
 @foreach($opportunity->form_schema as $field)
 <div class="form-field-row" style="display:grid;grid-template-columns:2fr 1fr auto auto;gap:8px;align-items:end;padding:10px;background:#fff;border-radius:8px;border:1px solid #e2e8f0;">
 <div>
 <label style="font-size:11px;color:#94a3b8;margin-bottom:4px;">Label du champ</label>
 <input type="text" name="form_fields[{{ $loop->index }}][label]" value="{{ $field['label'] }}" placeholder="Ex: Nom de l'organisation" class="form-control" style="padding:8px 12px;font-size:13px;">
 </div>
 <div>
 <label style="font-size:11px;color:#94a3b8;margin-bottom:4px;">Type</label>
 <select name="form_fields[{{ $loop->index }}][type]" class="form-control" style="padding:8px 12px;font-size:13px;">
 <option value="text" {{ $field['type'] === 'text' ? 'selected' : '' }}>Texte</option>
 <option value="email" {{ $field['type'] === 'email' ? 'selected' : '' }}>Email</option>
 <option value="tel" {{ $field['type'] === 'tel' ? 'selected' : '' }}>Téléphone</option>
 <option value="number" {{ $field['type'] === 'number' ? 'selected' : '' }}>Nombre</option>
 <option value="textarea" {{ $field['type'] === 'textarea' ? 'selected' : '' }}>Texte long</option>
 <option value="select" {{ $field['type'] === 'select' ? 'selected' : '' }}>Liste déroulante</option>
 <option value="file" {{ $field['type'] === 'file' ? 'selected' : '' }}>Fichier</option>
 <option value="date" {{ $field['type'] === 'date' ? 'selected' : '' }}>Date</option>
 </select>
 </div>
 <div style="padding-bottom:4px;">
 <label style="font-size:11px;color:#94a3b8;display:block;margin-bottom:4px;">Requis</label>
 <input type="checkbox" name="form_fields[{{ $loop->index }}][required]" value="1" {{ ($field['required'] ?? false) ? 'checked' : '' }}>
 </div>
 <button type="button" onclick="this.closest('.form-field-row').remove()" style="background:#fee2e2;color:#dc2626;border:none;border-radius:6px;padding:8px 10px;cursor:pointer;font-size:12px;"><i class="fas fa-trash"></i></button>
 </div>
 @endforeach
 @endif
 </div>
 <button type="button" onclick="addFormField()" style="margin-top:12px;padding:10px 16px;background:#059669;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:13px;font-weight:600;">
 <i class="fas fa-plus"></i> Ajouter un champ
 </button>
 </div>
 </div>

 <div class="form-group">
 <label for="results_description">Description des résultats</label>
 <textarea name="results_description" id="results_description" class="form-control" style="min-height:150px;">{{ old('results_description', $opportunity->results_description ?? '') }}</textarea>
 </div>
 <div class="form-group">
 <label for="results_file">Fichier des résultats (URL)</label>
 <input type="text" name="results_file" id="results_file" class="form-control" value="{{ old('results_file', $opportunity->results_file ?? '') }}">
 </div>
 <div class="form-group" style="display:flex;align-items:center;gap:8px;">
 <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $opportunity->is_published ?? false) ? 'checked' : '' }}>
 <label for="is_published" style="margin:0;">Publiée</label>
 </div>
 <button type="submit" class="btn btn-brand"><i class="fas fa-save"></i> {{ isset($opportunity) ? 'Mettre à jour' : 'Créer' }}</button>
 </form>
</div>

@push('scripts')
<script>
let fieldIndex = {{ isset($opportunity) && $opportunity->form_schema ? count($opportunity->form_schema) : 0 }};

function toggleFormBuilder() {
 const builder = document.getElementById('formBuilder');
 const cb = document.getElementById('has_form');
 builder.style.display = cb.checked ? 'block' : 'none';
}

function addFormField() {
 const container = document.getElementById('formFields');
 const html = `
 <div class="form-field-row" style="display:grid;grid-template-columns:2fr 1fr auto auto;gap:8px;align-items:end;padding:10px;background:#fff;border-radius:8px;border:1px solid #e2e8f0;">
 <div>
 <label style="font-size:11px;color:#94a3b8;margin-bottom:4px;">Label du champ</label>
 <input type="text" name="form_fields[${fieldIndex}][label]" placeholder="Ex: CV, Diplôme..." class="form-control" style="padding:8px 12px;font-size:13px;">
 </div>
 <div>
 <label style="font-size:11px;color:#94a3b8;margin-bottom:4px;">Type</label>
 <select name="form_fields[${fieldIndex}][type]" class="form-control" style="padding:8px 12px;font-size:13px;">
 <option value="text">Texte</option>
 <option value="email">Email</option>
 <option value="tel">Téléphone</option>
 <option value="number">Nombre</option>
 <option value="textarea">Texte long</option>
 <option value="select">Liste déroulante</option>
 <option value="file">Fichier</option>
 <option value="date">Date</option>
 </select>
 </div>
 <div style="padding-bottom:4px;">
 <label style="font-size:11px;color:#94a3b8;display:block;margin-bottom:4px;">Requis</label>
 <input type="checkbox" name="form_fields[${fieldIndex}][required]" value="1">
 </div>
 <button type="button" onclick="this.closest('.form-field-row').remove()" style="background:#fee2e2;color:#dc2626;border:none;border-radius:6px;padding:8px 10px;cursor:pointer;font-size:12px;"><i class="fas fa-trash"></i></button>
 </div>
 `;
 container.insertAdjacentHTML('beforeend', html);
 fieldIndex++;
}
</script>
@endpush
@endsection
