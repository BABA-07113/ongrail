@extends('layouts.admin')

@section('title', 'Connexion — Administration')

@section('content')
<div class="animate-fade-up">
 <div class="flex items-center justify-center gap-3 mb-6">
 <span class="w-3 h-3 rounded-full bg-primary-500"></span>
 <span class="w-3 h-3 rounded-full bg-accent-500"></span>
  <span class="w-3 h-3 rounded-full bg-fire-500"></span>
 </div>
 <h1>
  <span class="bg-gradient-to-r from-primary-400 via-accent-400 to-fire-400 text-transparent bg-clip-text">RAIL</span>
 <span class="text-surface-600"> Bénin</span>
 </h1>
 <p class="login-subtitle">Connectez-vous à votre espace d'administration</p>

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
 <input type="email" name="email" id="email" class="form-input" required autofocus value="{{ old('email') }}" placeholder="admin@ongrail.com">
 </div>
 <div class="form-group">
 <label for="password">Mot de passe</label>
 <input type="password" name="password" id="password" class="form-input" required placeholder="••••••••">
 </div>
 <div class="form-group flex items-center gap-3">
 <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-surface-300 text-primary-600 focus:ring-primary-500">
 <label for="remember" class="!mb-0 !font-normal !text-sm text-surface-600">Se souvenir de moi</label>
 </div>
 <button type="submit" class="btn btn-brand w-full justify-center py-3.5 text-base">
 <i class="fas fa-sign-in-alt"></i> Se connecter
 </button>
 </form>
</div>
@endsection
