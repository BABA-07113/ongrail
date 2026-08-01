@extends('layouts.admin')

@section('title', 'Équipe')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Membres de l'équipe</h3>
 <a href="{{ route('admin.equipe.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouveau membre</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Nom</th><th>Poste</th><th>Groupe</th><th>Visible</th><th>Ordre</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($members as $member)
 <tr>
 <td>{{ $member->name }}</td>
 <td>{{ $member->position }}</td>
 <td><span class="badge badge-surface">{{ str_replace('_', ' ', $member->group) }}</span></td>
 <td>{{ $member->is_visible ? 'Oui' : 'Non' }}</td>
 <td>{{ $member->sort_order }}</td>
 <td>
 <div class="actions">
 <a href="{{ route('admin.equipe.edit', $member) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
 <form action="{{ route('admin.equipe.destroy', $member) }}" method="POST" onsubmit="return confirm('Supprimer ?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></form>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="6" style="text-align:center;padding:40px;">Aucun membre.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $members->links() }}
</div>
@endsection
