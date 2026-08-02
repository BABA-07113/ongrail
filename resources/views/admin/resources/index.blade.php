@extends('layouts.admin')

@section('title', 'Ressources')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Ressources</h3>
 <a href="{{ route('admin.ressources.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouvelle ressource</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Titre</th><th>Catégorie</th><th>Fichier</th><th>Téléchargements</th><th>Publiée</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($resources as $resource)
 <tr>
 <td>{{ Str::limit($resource->title, 40) }}</td>
 <td><span class="badge badge-surface">{{ $resource->category ?: '-' }}</span></td>
 <td>{{ $resource->file_type }}</td>
 <td>{{ $resource->download_count }}</td>
 <td>{{ $resource->is_published ? 'Oui' : 'Non' }}</td>
 <td>
 <div class="actions">
 <a href="{{ route('admin.ressources.edit', $resource) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
 <button type="button" onclick="openDeleteModal('{{ route('admin.ressources.destroy', $resource) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="6" style="text-align:center;padding:40px;">Aucune ressource.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $resources->links() }}
</div>
@endsection
