@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
<div class="stats-grid">
 <div class="stat-card animate-fade-up" style="animation-delay:50ms">
 <div class="stat-icon brand">
 <i class="fas fa-newspaper"></i>
 </div>
 <div>
 <div class="stat-number">{{ $stats['articles'] }}</div>
 <div class="stat-label">Articles</div>
 </div>
 </div>
 <div class="stat-card animate-fade-up" style="animation-delay:100ms">
 <div class="stat-icon warn">
 <i class="fas fa-project-diagram"></i>
 </div>
 <div>
 <div class="stat-number">{{ $stats['projects'] }}</div>
 <div class="stat-label">Projets</div>
 </div>
 </div>
 <div class="stat-card animate-fade-up" style="animation-delay:150ms">
 <div class="stat-icon danger">
 <i class="fas fa-bullhorn"></i>
 </div>
 <div>
 <div class="stat-number">{{ $stats['opportunities'] }}</div>
 <div class="stat-label">Opportunités</div>
 </div>
 </div>
 <div class="stat-card animate-fade-up" style="animation-delay:200ms">
 <div class="stat-icon surface">
 <i class="fas fa-envelope"></i>
 </div>
 <div>
 <div class="stat-number">{{ $stats['unreadMessages'] }}/{{ $stats['messages'] }}</div>
 <div class="stat-label">Messages (non lus)</div>
 </div>
 </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
 <!-- Recent Articles -->
 <div class="admin-card animate-fade-up" style="animation-delay:250ms">
 <div class="card-header">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-xl bg-primary-100 flex items-center justify-center text-primary-600">
 <i class="fas fa-newspaper"></i>
 </div>
 <h3>Derniers articles</h3>
 </div>
 <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-ghost">
 Voir tout <i class="fas fa-arrow-right"></i>
 </a>
 </div>
 <div class="table-container">
 <table>
 <thead>
 <tr>
 <th>Titre</th>
 <th>Statut</th>
 <th>Date</th>
 </tr>
 </thead>
 <tbody>
 @forelse($stats['recentArticles'] as $article)
 <tr>
 <td class="font-medium">{{ Str::limit($article->title, 40) }}</td>
 <td>
 <span class="badge {{ $article->status === 'published' ? 'badge-brand' : 'badge-warn' }}">
 {{ $article->status === 'published' ? 'Publié' : 'Brouillon' }}
 </span>
 </td>
 <td class="text-surface-500">{{ $article->created_at->format('d/m/Y') }}</td>
 </tr>
 @empty
 <tr><td colspan="3" class="text-center py-8 text-surface-400">Aucun article</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 </div>

 <!-- Recent Messages -->
 <div class="admin-card animate-fade-up" style="animation-delay:300ms">
 <div class="card-header">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-xl bg-accent-100 flex items-center justify-center text-accent-600">
 <i class="fas fa-envelope"></i>
 </div>
 <h3>Derniers messages</h3>
 </div>
 <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-ghost">
 Voir tout <i class="fas fa-arrow-right"></i>
 </a>
 </div>
 <div class="table-container">
 <table>
 <thead>
 <tr>
 <th>Nom</th>
 <th>Sujet</th>
 <th>Date</th>
 </tr>
 </thead>
 <tbody>
 @forelse($stats['recentMessages'] as $message)
 <tr>
 <td class="font-medium">{{ $message->name }}</td>
 <td>{{ Str::limit($message->subject, 30) }}</td>
 <td class="text-surface-500">{{ $message->created_at->format('d/m/Y') }}</td>
 </tr>
 @empty
 <tr><td colspan="3" class="text-center py-8 text-surface-400">Aucun message</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 </div>
</div>
@endsection
