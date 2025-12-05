<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAdminMiddleware;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/article/{article:slug}', [HomeController::class, 'show'])->name('articles.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', IsAdminMiddleware::class]) 
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
    
        // Page d'accueil du dashboard
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // Gestion des Thèmes
        Route::get('/themes/create', [AdminController::class, 'createTheme'])->name('themes.create');
        Route::post('/themes', [AdminController::class, 'storeTheme'])->name('themes.store');
        Route::get('/themes/{theme}/edit', [AdminController::class, 'editTheme'])->name('themes.edit');
        Route::put('/themes/{theme}', [AdminController::class, 'updateTheme'])->name('themes.update');
        Route::delete('/themes/{theme}', [AdminController::class, 'deleteTheme'])->name('themes.destroy');
        
        // Gestion des Articles
        Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('articles.create');
        Route::post('/articles', [AdminController::class, 'storeArticle'])->name('articles.store');
        Route::get('/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('articles.edit');
        Route::put('/articles/{article}', [AdminController::class, 'updateArticle'])->name('articles.update');
        Route::delete('/articles/{article}', [AdminController::class, 'deleteArticle'])->name('articles.destroy');
});

require __DIR__.'/auth.php';
