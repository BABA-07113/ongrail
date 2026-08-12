@extends('layouts.admin')

@section('title', 'Connexion — Administration')

@section('content')
<div class="login-split animate-fade-up">

 <div class="login-brand">
  <div class="login-brand-inner">
   <div>
    <a href="{{ route('home') }}" class="block" title="Retour au site">
     <img src="{{ asset('images/logoRailLong.png') }}" alt="RAIL Bénin" class="login-logo">
    </a>
    <p class="login-brand-tagline">Réseau d'appui aux initiatives locales</p>
   </div>

   <div class="login-brand-features">
    <div class="login-brand-feature">
     <span class="login-feature-icon"><i class="fas fa-shield-alt"></i></span>
     <span>Espace sécurisé</span>
    </div>
    <div class="login-brand-feature">
     <span class="login-feature-icon"><i class="fas fa-chart-line"></i></span>
     <span>Gestion complète du contenu</span>
    </div>
    <div class="login-brand-feature">
     <span class="login-feature-icon"><i class="fas fa-users"></i></span>
     <span>Accès réservé à l'équipe</span>
    </div>
   </div>

   <p class="login-brand-footer">
    <i class="fas fa-quote-left text-accent-400"></i> Construire l'autonomie, ensemble.
   </p>
  </div>
 </div>

 <div class="login-form">
  <div class="login-form-inner">
   <div class="login-heading">
    <span class="login-badge"><i class="fas fa-lock"></i> Espace administrateur</span>
    <h2>Bon retour !</h2>
    <p>Connectez-vous pour gérer le contenu du site.</p>
   </div>

   @if($errors->any())
   <div class="alert alert-error">
    <i class="fas fa-exclamation-circle text-lg"></i>
    <span>{{ $errors->first('email') }}</span>
   </div>
   @endif

   <form action="{{ route('admin.login') }}" method="POST">
    @csrf
    <div class="form-group">
     <label for="email">Adresse email</label>
     <div class="input-wrap">
      <i class="fas fa-envelope input-icon"></i>
      <input type="email" name="email" id="email" class="form-input" required autofocus value="{{ old('email') }}" placeholder="admin@ongrail.org">
     </div>
    </div>
    <div class="form-group">
     <label for="password">Mot de passe</label>
     <div class="input-wrap">
      <i class="fas fa-key input-icon"></i>
      <input type="password" name="password" id="password" class="form-input" required placeholder="••••••••">
      <button type="button" class="password-toggle" id="togglePassword" aria-label="Afficher / masquer le mot de passe">
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
    </div>
    <button type="submit" class="login-submit">
     <i class="fas fa-sign-in-alt"></i> Se connecter
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
 });
</script>
@endpush
