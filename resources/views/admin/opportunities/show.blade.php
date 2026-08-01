@extends('layouts.admin')

@section('title', $opportunity->title . ' - Candidatures')

@section('content')
<div class="admin-card">
 <div class="card-header">
 <div>
 <h3>{{ $opportunity->title }}</h3>
 <span style="font-size:12px;color:#94a3b8;">{{ $applications->total() }} candidature(s)</span>
 </div>
 <div style="display:flex;gap:8px;">
 <a href="{{ route('admin.opportunites.edit', $opportunity) }}" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i> Modifier</a>
 <a href="{{ route('admin.opportunites.index') }}" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Retour</a>
 </div>
 </div>

 <div style="padding:20px;">
 @if($applications->count() > 0)
 <div style="overflow-x:auto;">
 <table style="width:100%;border-collapse:collapse;font-size:14px;">
 <thead>
 <tr style="border-bottom:2px solid #e2e8f0;">
 <th style="text-align:left;padding:12px 8px;color:#64748b;font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Nom</th>
 <th style="text-align:left;padding:12px 8px;color:#64748b;font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Email</th>
 <th style="text-align:left;padding:12px 8px;color:#64748b;font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Téléphone</th>
 <th style="text-align:left;padding:12px 8px;color:#64748b;font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Statut</th>
 <th style="text-align:left;padding:12px 8px;color:#64748b;font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Date</th>
 <th style="text-align:left;padding:12px 8px;color:#64748b;font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Actions</th>
 </tr>
 </thead>
 <tbody>
 @foreach($applications as $app)
 <tr style="border-bottom:1px solid #f1f5f9;">
 <td style="padding:12px 8px;font-weight:600;">{{ $app->applicant_name }}</td>
 <td style="padding:12px 8px;color:#64748b;">{{ $app->applicant_email }}</td>
 <td style="padding:12px 8px;color:#64748b;">{{ $app->applicant_phone ?? '-' }}</td>
 <td style="padding:12px 8px;">
 <span style="padding:4px 10px;border-radius:100px;font-size:11px;font-weight:600;background:{{ $app->status === 'accepted' ? '#dcfce7' : ($app->status === 'rejected' ? '#fee2e2' : ($app->status === 'reviewed' ? '#dbeafe' : '#f1f5f9')) }};color:{{ $app->status === 'accepted' ? '#16a34a' : ($app->status === 'rejected' ? '#dc2626' : ($app->status === 'reviewed' ? '#2563eb' : '#64748b')) }};">
 {{ ucfirst($app->status) }}
 </span>
 </td>
 <td style="padding:12px 8px;color:#64748b;font-size:13px;">{{ $app->created_at->format('d/m/Y H:i') }}</td>
 <td style="padding:12px 8px;">
 <button onclick="showApp({{ $app->id }})" style="background:#eff6ff;color:#2563eb;border:none;border-radius:6px;padding:6px 10px;cursor:pointer;font-size:12px;"><i class="fas fa-eye"></i></button>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 {{ $applications->links() }}

 <!-- Application Detail Modals -->
 @foreach($applications as $app)
 <div id="modal-{{ $app->id }}" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:1000;align-items:center;justify-content:center;" onclick="if(event.target===this)closeModal({{ $app->id }})">
 <div style="background:#fff;border-radius:16px;max-width:500px;width:90%;max-height:80vh;overflow-y:auto;padding:32px;">
 <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
 <h3 style="font-size:18px;font-weight:700;">Candidature de {{ $app->applicant_name }}</h3>
 <button onclick="closeModal({{ $app->id }})" style="background:none;border:none;cursor:pointer;font-size:20px;color:#94a3b8;">&times;</button>
 </div>
 <div style="space-y:12px;">
 <p><strong>Email:</strong> {{ $app->applicant_email }}</p>
 <p><strong>Téléphone:</strong> {{ $app->applicant_phone ?? '-' }}</p>
 <p><strong>Date:</strong> {{ $app->created_at->format('d/m/Y à H:i') }}</p>
 @if($app->form_data)
 <div style="margin-top:16px;padding:16px;background:#f8fafc;border-radius:10px;">
 <h4 style="font-size:13px;font-weight:700;margin-bottom:8px;color:#64748b;text-transform:uppercase;letter-spacing:.05em;">Données du formulaire</h4>
 @foreach($app->form_data as $key => $value)
 <p style="font-size:14px;margin-bottom:4px;"><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value ?? '-' }}</p>
 @endforeach
 </div>
 @endif
 </div>
 </div>
 </div>
 @endforeach

 @else
 <div style="text-align:center;padding:60px 0;color:#94a3b8;">
 <i class="fas fa-inbox" style="font-size:2.5rem;color:#e2e8f0;display:block;margin-bottom:12px;"></i>
 <p>Aucune candidature reçue pour le moment.</p>
 </div>
 @endif
 </div>
</div>

@push('scripts')
<script>
function showApp(id) {
 document.getElementById('modal-' + id).style.display = 'flex';
}
function closeModal(id) {
 document.getElementById('modal-' + id).style.display = 'none';
}
</script>
@endpush
@endsection
