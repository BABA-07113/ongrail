<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="theme-color" content="#059669">
 <title>@yield('title', 'Administration') — RAIL Bénin</title>

 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

 @vite(['resources/css/app.css', 'resources/js/app.js'])

 <style>
 body { @apply flex min-h-screen bg-surface-50 }

 .admin-sidebar {
 @apply fixed left-0 top-0 h-screen w-64 z-40;
 @apply bg-surface-950
 @apply border-r border-surface-800/50;
 @apply overflow-y-auto transition-all duration-300;
 }

 .admin-sidebar.collapsed { @apply -translate-x-full; }

 .sidebar-brand {
 @apply p-6 border-b border-surface-800/50;
 }

 .sidebar-brand a {
 @apply font-display font-bold text-2xl text-white;
 @apply flex items-center gap-2;
 }

 .sidebar-brand .primary-dot {
 @apply w-3 h-3 rounded-full bg-gradient-to-r from-primary-500 via-accent-500 to-danger-500;
 }

 .sidebar-nav { @apply p-4 space-y-1; }

 .nav-label {
 @apply px-4 py-3 text-xs font-semibold text-surface-500 uppercase tracking-widest;
 }

 .sidebar-nav a {
 @apply flex items-center gap-3 px-4 py-3 rounded-xl;
 @apply text-surface-400 hover:text-white;
 @apply hover:bg-surface-800/50;
 @apply transition-all duration-200 text-sm font-medium;
 }

 .sidebar-nav a.active {
 @apply bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg shadow-primary-600/20;
 }

 .sidebar-nav a i { @apply w-5 text-center text-base; }

 .admin-main { @apply flex-1 ml-64 transition-all duration-300; }
 .admin-main.expanded { @apply ml-0; }

 .admin-topbar {
 @apply sticky top-0 z-30;
 @apply bg-white/80 backdrop-blur-xl;
 @apply border-b border-surface-200
 @apply px-8 py-4 flex items-center justify-between;
 }

 .topbar-title {
 @apply text-2xl font-display font-bold;
 @apply text-surface-900
 }

 .admin-content { @apply p-8 min-h-screen; }

 .admin-card {
 @apply bg-white rounded-2xl;
 @apply border border-surface-200
 @apply shadow-sm hover:shadow-md;
 @apply transition-all duration-300 overflow-hidden;
 }

 .admin-card .card-header {
 @apply px-6 py-5 border-b border-surface-200
 @apply flex items-center justify-between;
 @apply bg-surface-50/50
 }

 .admin-card .card-header h3 {
 @apply font-display font-bold text-lg text-surface-900
 }

 .admin-card .card-body { @apply p-6; }

 .admin-card .card-footer {
 @apply px-6 py-4 border-t border-surface-200
 @apply bg-surface-50/30
 @apply flex justify-end gap-3;
 }

 /* Stats Grid */
 .stats-grid {
 @apply grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8;
 }

 .stat-card {
 @apply bg-white rounded-2xl p-6;
 @apply border border-surface-200
 @apply flex items-center gap-5;
 @apply transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5;
 }

 .stat-icon {
 @apply w-14 h-14 rounded-2xl flex items-center justify-center text-2xl;
 }

 .stat-icon.brand {
 @apply bg-primary-100 text-primary-600
 }
 .stat-icon.warn {
 @apply bg-accent-100 text-accent-600
 }
 .stat-icon.danger {
 @apply bg-danger-100 text-danger-600
 }
 .stat-icon.surface {
 @apply bg-surface-100 text-surface-600
 }

 .stat-number {
 @apply text-3xl font-display font-bold text-surface-900
 }
 .stat-label {
 @apply text-sm font-medium text-surface-500
 }

 /* Tables */
 .table-container { @apply overflow-x-auto; }

 table { @apply w-full text-sm; }

 table th {
 @apply px-6 py-4 text-left font-semibold text-xs uppercase tracking-wider;
 @apply bg-surface-50
 @apply border-b border-surface-200
 @apply text-surface-600
 }

 table td {
 @apply px-6 py-4 border-b border-surface-100
 @apply text-surface-700
 }

 table tbody tr:hover { @apply bg-surface-50 }

 /* Alerts */
 .alert {
 @apply p-4 rounded-xl mb-6 flex items-center gap-3;
 @apply border-l-4;
 }

 .alert-success {
 @apply bg-primary-50 text-primary-800
 @apply border-l-primary-500;
 }

 .alert-error {
 @apply bg-danger-50 text-danger-800
 @apply border-l-danger-500;
 }

 .alert-warning {
 @apply bg-accent-50 text-accent-800
 @apply border-l-accent-500;
 }

 /* Login Page */
 .login-page {
 @apply min-h-screen flex items-center justify-center;
 background: linear-gradient(135deg, #022C22 0%, #065F46 50%, #064E3B 100%);
 }

 .login-box {
 @apply bg-white rounded-2xl p-8;
 @apply w-full max-w-md shadow-2xl;
 @apply border border-surface-200
 }

 .login-box h1 {
 @apply text-3xl font-display font-bold text-center mb-2;
 @apply text-surface-900
 }

 .login-box .login-subtitle {
 @apply text-center text-surface-500 mb-8 text-sm;
 }

 /* Forms */
 .form-group { @apply mb-5; }

 .form-label {
 @apply block text-sm font-semibold text-surface-900 mb-2;
 }

 .form-input,
 .form-select,
 textarea {
 @apply w-full px-5 py-3 rounded-xl;
 @apply border-2 border-surface-200
 @apply bg-white
 @apply text-surface-900
 @apply placeholder-surface-400
 @apply transition-all duration-200 outline-none;
 }

 .form-input:focus,
 .form-select:focus,
 textarea:focus {
 @apply border-primary-500 ring-4 ring-primary-500/10;
 }

 textarea { @apply min-h-[120px] resize-y; }

 /* Action buttons */
 .action-group { @apply flex items-center gap-2; }

 .action-btn {
 @apply w-8 h-8 rounded-lg flex items-center justify-center text-sm;
 @apply transition-all duration-200;
 }

 .action-btn.view { @apply bg-primary-100 text-primary-700 hover:bg-primary-200 }
 .action-btn.edit { @apply bg-accent-100 text-accent-700 hover:bg-accent-200 }
 .action-btn.delete { @apply bg-danger-100 text-danger-700 hover:bg-danger-200 }

 /* Responsive */
 @media (max-width: 768px) {
 .admin-sidebar { @apply -translate-x-full; }
 .admin-sidebar.active { @apply translate-x-0; }
 .admin-main { @apply ml-0; }
 .admin-content { @apply p-4; }
 .stats-grid { @apply grid-cols-1; }
 .admin-topbar { @apply px-4; }
 }
 </style>

 @stack('styles')
</head>
<body class="bg-surface-50">

 @if (!request()->routeIs('admin.login'))
 <!-- Premium Sidebar -->
 <aside class="admin-sidebar" id="adminSidebar">
 <div class="sidebar-brand">
 <a href="{{ route('admin.dashboard') }}">
 <span class="primary-dot"></span>
 <span class="bg-gradient-to-r from-primary-400 via-accent-400 to-danger-400 text-transparent bg-clip-text">RAIL</span>
 <span class="font-normal text-surface-400 text-lg">Admin</span>
 </a>
 </div>
 <nav class="sidebar-nav">
 <div class="nav-label">Navigation</div>
 <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
 <i class="fas fa-chart-pie"></i> <span>Tableau de bord</span>
 </a>
 <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
 <i class="fas fa-newspaper"></i> <span>Articles</span>
 </a>
 <a href="{{ route('admin.pages.index') }}" class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
 <i class="fas fa-file-alt"></i> <span>Pages</span>
 </a>
 <a href="{{ route('admin.projets.index') }}" class="{{ request()->routeIs('admin.projets.*') ? 'active' : '' }}">
 <i class="fas fa-project-diagram"></i> <span>Projets</span>
 </a>
 <a href="{{ route('admin.opportunites.index') }}" class="{{ request()->routeIs('admin.opportunites.*') ? 'active' : '' }}">
 <i class="fas fa-bullhorn"></i> <span>Opportunités</span>
 </a>
 <a href="{{ route('admin.galeries.index') }}" class="{{ request()->routeIs('admin.galeries.*') ? 'active' : '' }}">
 <i class="fas fa-images"></i> <span>Galeries</span>
 </a>
 <a href="{{ route('admin.partenaires.index') }}" class="{{ request()->routeIs('admin.partenaires.*') ? 'active' : '' }}">
 <i class="fas fa-handshake"></i> <span>Partenaires</span>
 </a>
 <a href="{{ route('admin.temoignages.index') }}" class="{{ request()->routeIs('admin.temoignages.*') ? 'active' : '' }}">
 <i class="fas fa-quote-right"></i> <span>Témoignages</span>
 </a>
 <a href="{{ route('admin.ressources.index') }}" class="{{ request()->routeIs('admin.ressources.*') ? 'active' : '' }}">
 <i class="fas fa-download"></i> <span>Ressources</span>
 </a>
 <a href="{{ route('admin.equipe.index') }}" class="{{ request()->routeIs('admin.equipe.*') ? 'active' : '' }}">
 <i class="fas fa-users"></i> <span>Équipe</span>
 </a>

 <div class="nav-label">Gestion</div>
 <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
 <i class="fas fa-envelope"></i> <span>Messages</span>
 </a>
 <a href="{{ route('admin.utilisateurs.index') }}" class="{{ request()->routeIs('admin.utilisateurs.*') ? 'active' : '' }}">
 <i class="fas fa-user-shield"></i> <span>Utilisateurs</span>
 </a>
 <a href="{{ route('admin.parametres.index') }}" class="{{ request()->routeIs('admin.parametres.*') ? 'active' : '' }}">
 <i class="fas fa-cog"></i> <span>Paramètres</span>
 </a>

 <div class="nav-label pt-4 mt-4 border-t border-surface-800/50">Compte</div>
 <a href="{{ route('home') }}" target="_blank">
 <i class="fas fa-external-link-alt"></i> <span>Voir le site</span>
 </a>
 <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
 <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
 </a>
 <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
 </nav>
 </aside>
 @endif

 <!-- Main Content Area -->
 <div class="admin-main" id="adminMain" style="{{ request()->routeIs('admin.login') ? 'margin-left:0;' : '' }}">
 @if (!request()->routeIs('admin.login'))
 <!-- Topbar -->
 <header class="admin-topbar">
 <div class="flex items-center gap-4">
 <button class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl hover:bg-surface-100 transition-all" id="sidebarToggle">
 <i class="fas fa-bars text-lg text-surface-900"></i>
 </button>
 <h1 class="topbar-title">@yield('title', 'Administration')</h1>
 </div>
 <div class="flex items-center gap-4">
 <span class="text-sm text-surface-600 hidden sm:block">{{ auth()->user()->name ?? '' }}</span>
 <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center text-white font-bold shadow-lg">
 {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
 </div>
 </div>
 </header>
 @endif

 <!-- Content Area -->
 <div class="admin-content">
 @if(session('success'))
 <div class="alert alert-success">
 <i class="fas fa-check-circle text-lg"></i>
 <span>{{ session('success') }}</span>
 </div>
 @endif
 @if(session('error'))
 <div class="alert alert-error">
 <i class="fas fa-exclamation-circle text-lg"></i>
 <span>{{ session('error') }}</span>
 </div>
 @endif
 @if(session('warning'))
 <div class="alert alert-warning">
 <i class="fas fa-exclamation-triangle text-lg"></i>
 <span>{{ session('warning') }}</span>
 </div>
 @endif

 @yield('content')
 </div>
 </div>

 <!-- Login Page Container -->
 @if (request()->routeIs('admin.login'))
 <div class="login-page">
 <div class="login-box">
 @yield('content')
 </div>
 </div>
 @endif

 <!-- Admin Scripts -->
 <script>
 const sidebarToggle = document.getElementById('sidebarToggle');
 const adminSidebar = document.getElementById('adminSidebar');
 const adminMain = document.getElementById('adminMain');

 if (sidebarToggle) {
 sidebarToggle.addEventListener('click', () => {
 adminSidebar.classList.toggle('active');
 adminMain.classList.toggle('expanded');
 });

 document.querySelectorAll('.sidebar-nav a').forEach(link => {
 link.addEventListener('click', () => {
 if (window.innerWidth < 768) {
 adminSidebar.classList.remove('active');
 adminMain.classList.remove('expanded');
 }
 });
 });
 }

 document.addEventListener('DOMContentLoaded', function() {
 const alerts = document.querySelectorAll('.alert');
 alerts.forEach(alert => {
 setTimeout(() => {
 alert.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
 alert.style.opacity = '0';
 alert.style.transform = 'translateX(20px)';
 setTimeout(() => alert.remove(), 300);
 }, 5000);
 });
 });
 </script>

 @stack('scripts')
</body>
</html>
