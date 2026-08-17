<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ArticleController;
use App\Http\Controllers\Public\ProjectController;
use App\Http\Controllers\Public\OpportunityController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\PartnerController;
use App\Http\Controllers\Public\TestimonialController;
use App\Http\Controllers\Public\ResourceController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\EquipeController;
use App\Http\Controllers\Public\ActivitesController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\OpportunityController as AdminOpportunityController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;

// Public Routes
Route::get('/health', fn () => response('ok'))->name('health');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/mission', [AboutController::class, 'index'])->name('about');

Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe');

Route::get('/activites', [ActivitesController::class, 'index'])->name('activites');

Route::get('/nouvelles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/nouvelles/categorie/{slug}', [ArticleController::class, 'category'])->name('articles.category');
Route::get('/nouvelles/archives/{month}', [ArticleController::class, 'archive'])->name('articles.archive');
Route::get('/nouvelles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/projets', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/opportunites', [OpportunityController::class, 'index'])->name('opportunities.index');
Route::get('/opportunites/type/{type}', [OpportunityController::class, 'type'])->name('opportunities.type');
Route::post('/opportunites/{opportunity}/apply', [OpportunityController::class, 'apply'])->name('opportunities.apply');
Route::get('/opportunites/{slug}', [OpportunityController::class, 'show'])->name('opportunities.show');

Route::get('/galeries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galeries/{slug}', [GalleryController::class, 'show'])->name('galleries.show');

Route::get('/partenaires', [PartnerController::class, 'index'])->name('partners.index');

Route::get('/temoignages', [TestimonialController::class, 'index'])->name('testimonials.index');

Route::get('/ressources', [ResourceController::class, 'index'])->name('resources.index');
Route::get('/ressources/categorie/{category}', [ResourceController::class, 'category'])->name('resources.category');
Route::get('/ressources/telechargement/{id}', [ResourceController::class, 'download'])->name('resources.download');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/mot-de-passe-oublie', [AuthController::class, 'showForgot'])->name('password.request');
    Route::post('/mot-de-passe-oublie', [AuthController::class, 'sendResetLink'])->name('password.email')->middleware('throttle:5,1');
    Route::get('/reinitialiser/{token}', [AuthController::class, 'showReset'])->name('password.reset');
    Route::post('/reinitialiser', [AuthController::class, 'reset'])->name('password.store');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('articles', AdminArticleController::class);
        Route::post('articles/{article}/images', [AdminArticleController::class, 'uploadImage'])->name('articles.images.upload');
        Route::post('articles/{article}/images/sort', [AdminArticleController::class, 'updateImages'])->name('articles.images.sort');
        Route::delete('articles/images/{image}', [AdminArticleController::class, 'deleteImage'])->name('articles.images.destroy');
        Route::resource('pages', AdminPageController::class);
        Route::resource('projets', AdminProjectController::class);
        Route::resource('opportunites', AdminOpportunityController::class);
        Route::resource('galeries', AdminGalleryController::class);
        Route::get('galeries/{gallery}/images', [AdminGalleryController::class, 'images'])->name('galeries.images');
        Route::post('galeries/{gallery}/images', [AdminGalleryController::class, 'uploadImage'])->name('galeries.images.upload');
        Route::delete('galeries/images/{image}', [AdminGalleryController::class, 'deleteImage'])->name('galeries.images.destroy');
        Route::resource('partenaires', AdminPartnerController::class);
        Route::resource('temoignages', AdminTestimonialController::class);
        Route::resource('ressources', AdminResourceController::class);
        Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);
        Route::post('contacts/{contact}/archive', [AdminContactController::class, 'archive'])->name('contacts.archive');
        Route::get('parametres', [AdminSettingController::class, 'index'])->name('parametres.index')->middleware('admin.role:admin,super_admin');
        Route::post('parametres', [AdminSettingController::class, 'update'])->name('parametres.update')->middleware('admin.role:admin,super_admin');
        Route::get('profil', [AdminSettingController::class, 'profil'])->name('profil');
        Route::post('profil', [AdminSettingController::class, 'updateProfil'])->name('profil.update');
        Route::resource('utilisateurs', AdminUserController::class)->middleware('admin.role:admin,super_admin');
        Route::resource('equipe', AdminTeamMemberController::class);
    });
});
