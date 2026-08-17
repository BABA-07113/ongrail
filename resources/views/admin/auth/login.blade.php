@extends('layouts.admin')

@section('title', 'Connexion — Administration')

@section('content')
<div class="login-split">

 {{-- ===== Panneau marque ===== --}}
 <div class="login-brand">
  <div class="login-brand-inner">

   <div class="login-brand-head">
    <a href="{{ route('home') }}" title="Retour au site" class="flex items-center gap-3">
     <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin" class="login-logo">
    </a>
    <span class="login-brand-pill max-lg:hidden">Réseau d'appui aux initiatives locales</span>
   </div>

   <div class="login-brand-body max-lg:hidden">
    <p class="login-brand-eyebrow"><i class="fas fa-lock mr-2"></i> Espace sécurisé</p>
    <h2 class="login-brand-title">Bienvenue dans l'espace de gestion RAIL</h2>
    <p class="login-brand-sub">Pilotez articles, projets, galeries et partenaires depuis un tableau de bord pensé pour l'équipe.</p>

    <ul class="login-brand-features">
     <li class="login-brand-feature">
      <span class="login-feature-icon"><i class="fas fa-shield-alt"></i></span>
      <span>Connexion protégée et suivie</span>
     </li>
     <li class="login-brand-feature">
      <span class="login-feature-icon"><i class="fas fa-chart-line"></i></span>
      <span>Statistiques et gestion complète du contenu</span>
     </li>
     <li class="login-brand-feature">
      <span class="login-feature-icon"><i class="fas fa-users"></i></span>
      <span>Accès réservé à l'équipe RAIL</span>
     </li>
    </ul>
   </div>

   <p class="login-brand-footer max-lg:hidden">
    <i class="fas fa-quote-left text-accent-400 mr-2"></i> Construire l'autonomie, ensemble.
   </p>
  </div>
 </div>

 {{-- ===== Panneau formulaire ===== --}}
 <div class="login-form">
  <div class="login-form-inner">

   <div class="login-logo-wrap">
    <a href="{{ route('home') }}" title="Retour au site">
     <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin" class="login-logo">
    </a>
   </div>

   <div class="login-heading">
    <span class="login-badge"><i class="fas fa-lock mr-1.5"></i> Administration</span>
    <h2>Bon retour !</h2>
    <p>Connectez-vous pour gérer le contenu du site.</p>
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
    <span>{{ $errors->first('email') ?: $errors->first('password') }}</span>
   </div>
   @endif

   <form action="{{ route('admin.login') }}" method="POST" id="loginForm" novalidate>
    @csrf
    <div class="form-group">
     <label for="email">Adresse email</label>
     <div class="input-wrap">
      <i class="fas fa-envelope input-icon"></i>
      <input type="email" name="email" id="email" class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}" required autofocus autocomplete="email" value="{{ old('email') }}" placeholder="admin@ongrail.org">
     </div>
    </div>
    <div class="form-group">
     <label for="password">Mot de passe</label>
     <div class="input-wrap">
      <i class="fas fa-key input-icon"></i>
      <input type="password" name="password" id="password" class="form-input" required autocomplete="current-password" placeholder="••••••••">
      <button type="button" class="password-toggle" id="togglePassword" aria-label="Afficher / masquer le mot de passe" aria-pressed="false">
       <i class="fas fa-eye"></i>
      </button>
     </div>
    </div>
    <div class="form-group flex items-center justify-between gap-3">
     <label class="login-checkbox" for="remember">
      <input type="checkbox" name="remember" id="remember">
      <span class="login-checkbox-box"><i class="fas fa-check text-[0.55rem]"></i></span>
      Se souvenir de moi
     </label>
     <a href="{{ route('admin.password.request') }}" class="login-forgot">Mot de passe oublié ?</a>
    </div>
    <button type="submit" class="login-submit" id="loginSubmit">
     <i class="fas fa-sign-in-alt"></i>
     <span>Se connecter</span>
    </button>
   </form>

   <div class="login-footer">
    <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Retour au site</a>
   </div>
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

  const form = document.getElementById('loginForm');
  const submit = document.getElementById('loginSubmit');
  if (form && submit) {
   form.addEventListener('submit', function () {
    if (form.checkValidity()) {
     submit.disabled = true;
     submit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i><span>Connexion en cours…</span>';
    }
   });
  }
 });
</script>
@endpush
