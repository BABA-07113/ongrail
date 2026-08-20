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

 @include('partials.vite-assets')

 @stack('styles')
</head>
<body class="bg-surface-50">
 @php($authPage = request()->routeIs('admin.login') || request()->routeIs('admin.password.*'))

 @if (!$authPage)
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
  @if(\App\Models\Contact::unread()->count() > 0)
  <span class="nav-badge">{{ \App\Models\Contact::unread()->count() }}</span>
  @endif
  </a>
  <a href="{{ route('admin.profil') }}" class="{{ request()->routeIs('admin.profil*') ? 'active' : '' }}">
  <i class="fas fa-address-card"></i> <span>Profil & coordonnées</span>
  </a>
  @if(auth()->user() && auth()->user()->isAdmin())
  <a href="{{ route('admin.utilisateurs.index') }}" class="{{ request()->routeIs('admin.utilisateurs.*') ? 'active' : '' }}">
  <i class="fas fa-user-shield"></i> <span>Utilisateurs</span>
  </a>
  <a href="{{ route('admin.parametres.index') }}" class="{{ request()->routeIs('admin.parametres.*') ? 'active' : '' }}">
  <i class="fas fa-cog"></i> <span>Paramètres</span>
  </a>
  @endif

 <div class="nav-label pt-4 mt-4 border-t border-surface-800/50">Compte</div>
 <a href="{{ route('home') }}" target="_blank">
 <i class="fas fa-external-link-alt"></i> <span>Voir le site</span>
 </a>
 <a href="#" onclick="event.preventDefault(); document.getElementById('logoutModal').classList.remove('hidden'); document.getElementById('logoutModal').classList.add('flex');">
 <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
 </a>
 <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
 </nav>
 </aside>
 @endif

 <!-- Main Content Area -->
 @if ($authPage)
 <div class="login-page">
 <div class="login-box {{ request()->routeIs('admin.login') ? '' : 'login-box--narrow' }}">
 @yield('content')
 </div>
 </div>
 @else
 <div class="admin-main" id="adminMain">
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
 @endif

 <!-- Logout Confirmation Modal -->
 <div id="logoutModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
 <div class="absolute inset-0 bg-surface-950/60 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden'); this.parentElement.classList.remove('flex');"></div>
 <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 border border-surface-200">
 <div class="flex items-start gap-4">
 <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl shrink-0">
 <i class="fas fa-sign-out-alt"></i>
 </div>
 <div>
 <h3 class="font-display font-bold text-lg text-surface-900">Confirmer la déconnexion</h3>
 <p class="mt-1 text-sm text-surface-500">Vous allez être déconnecté(e) de l'espace administration. Voulez-vous continuer ?</p>
 </div>
 </div>
 <div class="mt-6 flex justify-end gap-3">
 <button type="button" onclick="document.getElementById('logoutModal').classList.add('hidden'); document.getElementById('logoutModal').classList.remove('flex');" class="btn btn-outline">Annuler</button>
 <button type="button" onclick="document.getElementById('logout-form').submit();" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Se déconnecter</button>
 </div>
 </div>
 </div>

 <!-- Archive Confirmation Modal -->
 <div id="archiveModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
 <div class="absolute inset-0 bg-surface-950/60 backdrop-blur-sm" onclick="document.getElementById('archiveModal').classList.add('hidden'); document.getElementById('archiveModal').classList.remove('flex');"></div>
 <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 border border-surface-200">
 <div class="flex items-start gap-4">
 <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl shrink-0">
 <i class="fas fa-archive"></i>
 </div>
 <div>
 <h3 class="font-display font-bold text-lg text-surface-900">Confirmer l'archivage</h3>
 <p class="mt-1 text-sm text-surface-500">Ce message sera archivé et ne sera plus visible dans la liste principale. Voulez-vous continuer ?</p>
 </div>
 </div>
 <div class="mt-6 flex justify-end gap-3">
 <button type="button" onclick="document.getElementById('archiveModal').classList.add('hidden'); document.getElementById('archiveModal').classList.remove('flex');" class="btn btn-outline">Annuler</button>
 <form id="archiveForm" method="POST" action="">
 @csrf
 <button type="submit" class="btn btn-warning"><i class="fas fa-archive"></i> Archiver</button>
 </form>
 </div>
 </div>
 </div>

 <!-- Delete Confirmation Modal -->
 <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
 <div class="absolute inset-0 bg-surface-950/60 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
 <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 border border-surface-200">
 <div class="flex items-start gap-4">
 <div class="w-12 h-12 rounded-2xl bg-fire-100 text-fire-600 flex items-center justify-center text-xl shrink-0">
 <i class="fas fa-trash-alt"></i>
 </div>
 <div>
 <h3 class="font-display font-bold text-lg text-surface-900">Confirmer la suppression</h3>
 <p class="mt-1 text-sm text-surface-500">Cette action est irréversible. Voulez-vous vraiment supprimer cet élément ?</p>
 </div>
 </div>
 <div class="mt-6 flex justify-end gap-3">
 <button type="button" onclick="closeDeleteModal()" class="btn btn-outline">Annuler</button>
 <form id="deleteForm" method="POST" action="">
 @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Supprimer</button>
 </form>
 </div>
 </div>
 </div>

 <!-- Edit Modal -->
 <div id="editModal" class="fixed inset-0 z-50 hidden items-start justify-center p-4 pt-10 overflow-y-auto">
 <div class="absolute inset-0 bg-surface-950/60 backdrop-blur-sm" onclick="closeEditModal()"></div>
 <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-3xl border border-surface-200 mb-10">
 <div class="flex items-center justify-between px-6 py-4 border-b border-surface-100">
 <h3 class="font-display font-bold text-lg text-surface-900" id="editModalTitle">Modifier</h3>
 <button onclick="closeEditModal()" class="w-8 h-8 rounded-lg hover:bg-surface-100 flex items-center justify-center text-surface-400 hover:text-surface-600 transition-colors">
 <i class="fas fa-times text-sm"></i>
 </button>
 </div>
 <div id="editModalBody" class="p-6">
 <div class="flex items-center justify-center py-12">
 <div class="w-8 h-8 border-2 border-primary-500 border-t-transparent rounded-full animate-spin"></div>
 </div>
 </div>
 </div>
 </div>

 <!-- Admin Scripts -->
 <script>
 const sidebarToggle = document.getElementById('sidebarToggle');
 const adminSidebar = document.getElementById('adminSidebar');
 const adminMain = document.getElementById('adminMain');

 function openDeleteModal(url) {
 document.getElementById('deleteForm').setAttribute('action', url);
 const modal = document.getElementById('deleteModal');
 modal.classList.remove('hidden');
 modal.classList.add('flex');
 }

 function closeDeleteModal() {
 const modal = document.getElementById('deleteModal');
 modal.classList.add('hidden');
 modal.classList.remove('flex');
 }

 function openArchiveModal(url) {
 document.getElementById('archiveForm').setAttribute('action', url);
 const modal = document.getElementById('archiveModal');
 modal.classList.remove('hidden');
 modal.classList.add('flex');
 }

 function openEditModal(url) {
 const modal = document.getElementById('editModal');
 const body = document.getElementById('editModalBody');
 body.innerHTML = '<div class="flex items-center justify-center py-12"><div class="w-8 h-8 border-2 border-primary-500 border-t-transparent rounded-full animate-spin"></div></div>';
 modal.classList.remove('hidden');
 modal.classList.add('flex');
 document.body.style.overflow = 'hidden';

 fetch(url)
 .then(r => r.text())
 .then(html => {
 const parser = new DOMParser();
 const doc = parser.parseFromString(html, 'text/html');
 const form = doc.querySelector('.admin-card form');
 const title = doc.querySelector('.admin-card .card-header h3');
 if (form) {
 if (title) document.getElementById('editModalTitle').textContent = title.textContent.trim();
 const wrapper = document.createElement('div');
 wrapper.appendChild(form.cloneNode(true));
 body.innerHTML = wrapper.innerHTML;
 const scripts = doc.querySelectorAll('script');
 scripts.forEach(s => {
 const newScript = document.createElement('script');
 newScript.textContent = s.textContent;
 document.body.appendChild(newScript);
 });
 initModalForms();
 } else {
 body.innerHTML = '<div class="text-center py-12 text-surface-500"><i class="fas fa-exclamation-triangle text-2xl mb-3 text-amber-400"></i><p>Formulaire introuvable.</p></div>';
 }
 })
 .catch(() => {
 body.innerHTML = '<div class="text-center py-12 text-surface-500"><i class="fas fa-exclamation-triangle text-2xl mb-3 text-amber-400"></i><p>Erreur lors du chargement du formulaire.</p></div>';
 });
 }

 function closeEditModal() {
 const modal = document.getElementById('editModal');
 modal.classList.add('hidden');
 modal.classList.remove('flex');
 document.body.style.overflow = '';
 document.getElementById('editModalBody').innerHTML = '<div class="flex items-center justify-center py-12"><div class="w-8 h-8 border-2 border-primary-500 border-t-transparent rounded-full animate-spin"></div></div>';
 }

 function initModalForms() {
 document.querySelectorAll('#editModalBody form').forEach(form => {
 form.addEventListener('submit', function(e) {
 e.preventDefault();
 const submitBtn = this.querySelector('[type="submit"]');
 if (submitBtn) { submitBtn.disabled = true; submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...'; }

 const formData = new FormData(this);
 const url = this.action;
 const method = this.querySelector('input[name="_method"]');

 fetch(url, {
 method: method ? method.value.toUpperCase() : 'POST',
 body: formData,
 headers: {
 'X-Requested-With': 'XMLHttpRequest',
 'Accept': 'application/json'
 }
 })
 .then(r => {
 if (r.redirected) { window.location.href = r.url; return null; }
 return r.text();
 })
 .then(text => {
 if (!text) return;
 try {
 const data = JSON.parse(text);
 if (data.redirect) { window.location.href = data.redirect; }
 else { window.location.reload(); }
 } catch {
 window.location.reload();
 }
 })
 .catch(() => { window.location.reload(); });
 });
 });
 }

 document.addEventListener('keydown', function(e) {
 if (e.key === 'Escape') {
 closeDeleteModal();
 closeEditModal();
 document.getElementById('archiveModal').classList.add('hidden');
 document.getElementById('archiveModal').classList.remove('flex');
 document.getElementById('logoutModal').classList.add('hidden');
 document.getElementById('logoutModal').classList.remove('flex');
 }
 });

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
