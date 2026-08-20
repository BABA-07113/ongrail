@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Utilisateurs</h3>
 <a href="{{ route('admin.utilisateurs.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouvel utilisateur</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Nom</th><th>Email</th><th>Rôle</th><th>Actif</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($users as $user)
 <tr>
 <td>{{ $user->name }}</td>
 <td>{{ $user->email }}</td>
 <td><span class="badge {{ $user->role === 'super_admin' ? 'badge-danger' : ($user->role === 'admin' ? 'badge-surface' : 'badge-brand') }}">{{ $user->role }}</span></td>
 <td>{{ $user->is_active ? 'Oui' : 'Non' }}</td>
 <td>
 <div class="actions">
 <button type="button" onclick="openEditModal('{{ route('admin.utilisateurs.edit', $user) }}')" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
 @if($user->id !== auth()->id())
 <button type="button" onclick="openDeleteModal('{{ route('admin.utilisateurs.destroy', $user) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 @endif
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="5" style="text-align:center;padding:40px;">Aucun utilisateur.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $users->links() }}
</div>
@endsection
