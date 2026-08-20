@extends('layouts.admin')

@section('title', 'Témoignages')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Témoignages</h3>
 <a href="{{ route('admin.temoignages.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouveau témoignage</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Nom</th><th>Type</th><th>Visible</th><th>Approuvé</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($testimonials as $testimonial)
 <tr>
 <td>{{ $testimonial->name }}</td>
 <td><span class="badge badge-brand">{{ $testimonial->type }}</span></td>
 <td>{{ $testimonial->is_visible ? 'Oui' : 'Non' }}</td>
 <td>{{ $testimonial->is_approved ? 'Oui' : 'Non' }}</td>
 <td>
 <div class="actions">
 <button type="button" onclick="openEditModal('{{ route('admin.temoignages.edit', $testimonial) }}')" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
 <button type="button" onclick="openDeleteModal('{{ route('admin.temoignages.destroy', $testimonial) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="5" style="text-align:center;padding:40px;">Aucun témoignage.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $testimonials->links() }}
</div>
@endsection
