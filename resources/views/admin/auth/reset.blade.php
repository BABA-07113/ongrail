@extends('layouts.admin')

@section('title', 'Nouveau mot de passe — Administration')

@section('content')
<div class="login-form">
 <div class="login-form-inner">

  <div class="login-logo-wrap">
   <a href="{{ route('home') }}" title="Retour au site">
    <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin" class="login-logo">
   </a>
  </div>

  <div class="login-heading">
   <span class="login-badge"><i class="fas fa-lock mr-1.5"></i> Réinitialisation</span>
   <h2>Choisissez un nouveau mot de passe</h2>
   <p>Au moins 8 caractères, puis confirmez-le.</p>
  </div>

  @if($errors->any())
  <div class="login-alert" role="alert" aria-live="assertive">
   <i class="fas fa-exclamation-circle"></i>
   <span>{{ $errors->first('email') ?: $errors->first('password') }}</span>
  </div>
  @endif

  <form action="{{ route('admin.password.store') }}" method="POST" id="resetForm" novalidate>
   @csrf
   <input type="hidden" name="token" value="{{ $token }}">

   <div class="form-group">
    <label for="email">Adresse email</label>
    <div class="input-wrap">
     <i class="fas fa-envelope input-icon"></i>
     <input type="email" name="email" id="email" class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}" required autofocus autocomplete="email" value="{{ old('email', $email) }}" placeholder="admin@ongrail.org">
    </div>
   </div>

   <div class="form-group">
    <label for="password">Nouveau mot de passe</label>
    <div class="input-wrap">
     <i class="fas fa-key input-icon"></i>
     <input type="password" name="password" id="password" class="form-input" required autocomplete="new-password" placeholder="••••••••">
     <button type="button" class="password-toggle" id="togglePassword" aria-label="Afficher / masquer le mot de passe" aria-pressed="false">
      <i class="fas fa-eye"></i>
     </button>
    </div>
   </div>

   <div class="form-group">
    <label for="password_confirmation">Confirmation</label>
    <div class="input-wrap">
     <i class="fas fa-key input-icon"></i>
     <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required autocomplete="new-password" placeholder="••••••••">
    </div>
   </div>

   <button type="submit" class="login-submit" id="resetSubmit">
    <i class="fas fa-check-circle"></i>
    <span>Réinitialiser le mot de passe</span>
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
  const toggle = document.getElementById('togglePassword');
  const password = document.getElementById('password');
  if (toggle && password) {
   toggle.addEventListener('click', function () {
    const isPassword = password.type === 'password';
    password.type = isPassword ? 'text' : 'password';
    this.querySelector('i').className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
    this.setAttribute('aria-pressed', String(!isPassword));
   });
  }

  const form = document.getElementById('resetForm');
  const submit = document.getElementById('resetSubmit');
  if (form && submit) {
   form.addEventListener('submit', function () {
    if (form.checkValidity()) {
     submit.disabled = true;
     submit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i><span>Réinitialisation en cours…</span>';
    }
   });
  }
 });
</script>
@endpush
