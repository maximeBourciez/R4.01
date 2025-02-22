<?php

use Illuminate\Support\Facades\Route;




// Routes pour les sauces
use App\Http\Controllers\SaucesController;
Route::get('/', [SaucesController::class, 'index'])->name('home');
Route::get('/sauce/add', [SaucesController::class, 'onAddTry'])->name('add.sauce');
Route::post('/sauce/store', [SaucesController::class, 'store'])->name('store.sauce');
Route::get('/sauce/show/{id}', [SaucesController::class, 'show'])->name('show.sauce');

// Routes pour les utilisateurs
use App\Http\Controllers\UtilisateursController;
Route::get('/inscription', [UtilisateursController::class, 'inscription'])->name('inscription');
Route::post('/inscription', [UtilisateursController::class, 'traitementInscription'])->name('traitementInscription');
Route::get('/connexion', [UtilisateursController::class, 'connexion'])->name('connexion');
Route::post('/connexion', [UtilisateursController::class, 'traitementConnexion'])->name('traitementConnexion');
Route::get('/deconnexion', [UtilisateursController::class, 'deconnexion'])->name('logout');
Route::get('/profil', [UtilisateursController::class, 'profil'])->name('profil');
Route::post('/profil', [UtilisateursController::class, 'traitementProfil'])->name('traitementProfil');    