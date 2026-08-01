@extends('layouts.admin')

@section('title', 'Opportunités')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Opportunités</h3>
 <a href="{{ route('admin.opportunites.create') }}" class="btn btn-brand"><i class="fas fa-plus"></i> Nouvelle opportunité</a>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Titre</th><th>Type</th><th>Statut</th><th>Formulaire</th><th>Date limite</th><th>Publiée</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($opportunities as $opp)
 <tr>
 <td>{{ Str::limit($opp->title, 40) }}</td>
 <td><span class="badge badge-surface">{{ str_replace(['_', 'appel_candidature'], [' ', 'Appel candidature'], $opp->type) }}</span></td>
 <td><span class="badge {{ $opp->status === 'ouvert' ? 'badge-brand' : ($opp->status === 'cloture' ? 'badge-danger' : 'badge-warn') }}">{{ $opp->status }}</span></td>
 <td>
 @if($opp->has_form)
 <span style="color:#059669;font-size:12px;font-weight:600;"><i class="fas fa-check-circle"></i> Oui</span>
 @else
 <span style="color:#94a3b8;font-size:12px;">Non</span>
 @endif
 </td>
 <td>{{ $opp->deadline?->format('d/m/Y') ?? '-' }}</td>
 <td>{{ $opp->is_published ? 'Oui' : 'Non' }}</td>
 <td>
 <div class="actions" style="display:flex;gap:4px;">
 <a href="{{ route('admin.opportunites.show', $opp) }}" class="btn btn-sm btn-outline" title="Candidatures"><i class="fas fa-users"></i></a>
 <a href="{{ route('admin.opportunites.edit', $opp) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
 <form action="{{ route('admin.opportunites.destroy', $opp) }}" method="POST" onsubmit="return confirm('Supprimer ?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></form>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="7" style="text-align:center;padding:40px;">Aucune opportunité.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $opportunities->links() }}
</div>
@endsection
