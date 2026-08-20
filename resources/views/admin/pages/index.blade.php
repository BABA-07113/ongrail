@extends('layouts.admin')

@section('title', 'Pages')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Pages</h3>
 <a href="{{ route('admin.pages.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouvelle page</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Titre</th><th>Template</th><th>Publiée</th><th>Date</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($pages as $page)
 <tr>
 <td>{{ $page->title }}</td>
 <td>{{ $page->template }}</td>
 <td><span class="badge {{ $page->is_published ? 'badge-brand' : 'badge-warn' }}">{{ $page->is_published ? 'Oui' : 'Non' }}</span></td>
 <td>{{ $page->created_at->format('d/m/Y') }}</td>
 <td>
 <div class="actions">
 <button type="button" onclick="openEditModal('{{ route('admin.pages.edit', $page) }}')" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
 <button type="button" onclick="openDeleteModal('{{ route('admin.pages.destroy', $page) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="5" style="text-align:center;padding:40px;">Aucune page.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $pages->links() }}
</div>
@endsection
