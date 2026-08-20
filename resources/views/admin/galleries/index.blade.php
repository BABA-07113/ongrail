@extends('layouts.admin')

@section('title', 'Galeries')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Albums photo</h3>
 <a href="{{ route('admin.galeries.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouvel album</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Titre</th><th>Images</th><th>Date</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($galleries as $gallery)
 <tr>
 <td>{{ $gallery->title }}</td>
 <td>{{ $gallery->images_count }} photos</td>
 <td>{{ $gallery->created_at->format('d/m/Y') }}</td>
 <td>
 <div class="actions">
 <a href="{{ route('admin.galeries.images', $gallery) }}" class="btn btn-sm btn-info"><i class="fas fa-images"></i></a>
 <button type="button" onclick="openEditModal('{{ route('admin.galeries.edit', $gallery) }}')" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
 <button type="button" onclick="openDeleteModal('{{ route('admin.galeries.destroy', $gallery) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="4" style="text-align:center;padding:40px;">Aucun album.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $galleries->links() }}
</div>
@endsection
