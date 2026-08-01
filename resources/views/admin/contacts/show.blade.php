@extends('layouts.admin')

@section('title', 'Message de ' . $contact->name)

@section('content')
<div class="admin-card">
 <div class="card-header">
 <h3>Message de {{ $contact->name }}</h3>
 <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 <div style="max-width:600px;">
 <div style="margin-bottom:15px;"><strong>Nom :</strong> {{ $contact->name }}</div>
 <div style="margin-bottom:15px;"><strong>Email :</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
 @if($contact->phone)<div style="margin-bottom:15px;"><strong>Téléphone :</strong> {{ $contact->phone }}</div>@endif
 <div style="margin-bottom:15px;"><strong>Sujet :</strong> {{ $contact->subject }}</div>
 <div style="margin-bottom:15px;"><strong>Date :</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</div>
 <div style="margin-bottom:20px;"><strong>Message :</strong></div>
 <div style="padding:20px;background:var(--bg);border-radius:8px;line-height:1.8;">{{ nl2br(e($contact->message)) }}</div>
 </div>
</div>
@endsection
