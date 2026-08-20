@extends('layouts.admin')

@section('title', 'Projets')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Projets</h3>
 <a href="{{ route('admin.projets.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouveau projet</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Titre</th><th>Catégorie</th><th>Statut</th><th>En vedette</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($projects as $project)
 <tr>
 <td>{{ Str::limit($project->title, 50) }}</td>
 <td>{{ $project->category?->name ?? '-' }}</td>
 <td><span class="badge {{ $project->status === 'en_cours' ? 'badge-brand' : ($project->status === 'termine' ? 'badge-surface' : 'badge-warn') }}">{{ $project->status }}</span></td>
 <td>{{ $project->is_featured ? 'Oui' : 'Non' }}</td>
 <td>
 <div class="actions">
 <button type="button" onclick="openEditModal('{{ route('admin.projets.edit', $project) }}')" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
 <button type="button" onclick="openDeleteModal('{{ route('admin.projets.destroy', $project) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="5" style="text-align:center;padding:40px;">Aucun projet.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $projects->links() }}
</div>
@endsection
