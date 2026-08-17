@extends('layouts.admin')

@section('title', 'Mot de passe oublié — Administration')

@section('content')
<div class="login-form">
 <div class="login-form-inner">

  <div class="login-logo-wrap">
   <a href="{{ route('home') }}" title="Retour au site">
    <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin" class="login-logo">
   </a>
  </div>

  <div class="login-heading">
   <span class="login-badge"><i class="fas fa-key mr-1.5"></i> Réinitialisation</span>
   <h2>Mot de passe oublié ?</h2>
   <p>Entrez votre adresse email, nous vous enverrons un lien de réinitialisation.</p>
  </div>

  @if(session('status'))
  <div class="login-alert success" role="status">
   <i class="fas fa-check-circle"></i>
   <span>{{ session('status') }}</span>
  </div>
  @endif

  @if($errors->any())
  <div class="login-alert" role="alert" aria-live="assertive">
   <i class="fas fa-exclamation-circle"></i>
   <span>{{ $errors->first('email') }}</span>
  </div>
  @endif

  <form action="{{ route('admin.password.email') }}" method="POST" id="forgotForm" novalidate>
   @csrf
   <div class="form-group">
    <label for="email">Adresse email</label>
    <div class="input-wrap">
     <i class="fas fa-envelope input-icon"></i>
     <input type="email" name="email" id="email" class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}" required autofocus autocomplete="email" value="{{ old('email') }}" placeholder="admin@ongrail.org">
    </div>
   </div>
   <button type="submit" class="login-submit" id="forgotSubmit">
    <i class="fas fa-paper-plane"></i>
    <span>Envoyer le lien</span>
   </button>
  </form>

  <div class="login-footer">
   <a href="{{ route('admin.login') }}"><i class="fas fa-arrow-left"></i> Retour à la connexion</a>
  </div>
 </div>
</div>
@endsection

@push('scripts')
<script>
 document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('forgotForm');
  const submit = document.getElementById('forgotSubmit');
  if (form && submit) {
   form.addEventListener('submit', function () {
    if (form.checkValidity()) {
     submit.disabled = true;
     submit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i><span>Envoi en cours…</span>';
    }
   });
  }
 });
</script>
@endpush
