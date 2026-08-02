@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Messages reçus</h3>
 </div>
 <div class="table-container">
 <table>
 <thead><tr><th>Nom</th><th>Email</th><th>Sujet</th><th>Statut</th><th>Date</th><th>Actions</th></tr></thead>
 <tbody>
 @forelse($messages as $message)
 <tr>
 <td>{{ $message->name }}</td>
 <td>{{ $message->email }}</td>
 <td>{{ Str::limit($message->subject, 30) }}</td>
 <td>
 <span class="badge {{ $message->is_read ? 'badge-brand' : 'badge-warn' }}">
 {{ $message->is_read ? 'Lu' : 'Non lu' }}
 </span>
 </td>
 <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
 <td>
 <div class="actions">
 <a href="{{ route('admin.contacts.show', $message) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
 @if(!$message->is_archived)
 <form action="{{ route('admin.contacts.archive', $message) }}" method="POST">@csrf<button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-archive"></i></button></form>
 @endif
 <button type="button" onclick="openDeleteModal('{{ route('admin.contacts.destroy', $message) }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
 </div>
 </td>
 </tr>
 @empty
 <tr><td colspan="6" style="text-align:center;padding:40px;">Aucun message.</td></tr>
 @endforelse
 </tbody>
 </table>
 </div>
 {{ $messages->links() }}
</div>
@endsection
