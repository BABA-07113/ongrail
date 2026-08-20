@extends('layouts.admin')

@section('title', 'Articles')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Tous les articles</h3>
 <a href="{{ route('admin.articles.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouvel article</a>
 </div>
 <div class="table-container">
 <table>
 <thead>
 <tr>
 <th>Titre</th>
 <th>Catégorie</th>
 <th>Auteur</th>
 <th>Statut</th>
 <th>Date</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 @forelse($articles as $article)
 <tr>
 <td>{{ Str::limit($article->title, 50) }}</td>
 <td>{{ $article->category?->name ?? '-' }}</td>
 <td>{{ $article->user?->name ?? '-' }}</td>
 <td><span class="badge {{ $article->status === 'published' ? 'badge-brand' : ($article->status === 'draft' ? 'badge-warn' : 'badge-surface') }}">{{ $article->status }}</span></td>
 <td>{{ $article->created_at->format('d/m/Y') }}</td>
 <td>
 <div class="actions">
 <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-eye"></i></a>
 <button type="button" onclick="openEditModal('{{ route('admin.articles.edit', $article) }}')" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
 <button type="button" onclick="openDeleteModal('{{ route('admin.articles.destroy', $article) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="6" style="text-align:center;padding:40px;">Aucun article trouvé.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 <div style="margin-top:20px;">{{ $articles->links() }}</div>
</div>
@endsection
