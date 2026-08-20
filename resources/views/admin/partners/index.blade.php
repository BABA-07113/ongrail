@extends('layouts.admin')

@section('title', 'Partenaires')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Partenaires</h3>
 <a href="{{ route('admin.partenaires.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouveau partenaire</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Nom</th><th>Catégorie</th><th>Visible</th><th>Ordre</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($partners as $partner)
 <tr>
 <td>{{ $partner->name }}</td>
 <td><span class="badge badge-surface">{{ $partner->category }}</span></td>
 <td>{{ $partner->is_visible ? 'Oui' : 'Non' }}</td>
 <td>{{ $partner->sort_order }}</td>
 <td>
 <div class="actions">
 <button type="button" onclick="openEditModal('{{ route('admin.partenaires.edit', $partner) }}')" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
 <button type="button" onclick="openDeleteModal('{{ route('admin.partenaires.destroy', $partner) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="5" style="text-align:center;padding:40px;">Aucun partenaire.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $partners->links() }}
</div>
@endsection
