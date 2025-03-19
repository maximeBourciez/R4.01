<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


use App\Http\Controllers\SaucesController;
// Routes pour les sauces
Route::get('/', [SaucesController::class, 'index'])->name('sauces.index');
Route::get('/sauces', [SaucesController::class, 'index'])->name('sauces.index');
Route::get('/sauces/create', [SaucesController::class, 'create'])->name('sauces.create');
Route::post('/sauces/store', [SaucesController::class, 'store'])->name('sauces.store');
Route::get('/sauce/{id}', [SaucesController::class, 'show'])->name('sauces.show');
Route::get('/sauces/edit/{id}', [SaucesController::class, 'edit'])->name('sauces.edit');
Route::put('/sauces/update/{id}', [SaucesController::class, 'update'])->name('sauces.update');
Route::delete('/sauces/destroy/{id}', [SaucesController::class, 'destroy'])->name('sauces.destroy');

// Routes pour une sauce unique
Route::get('sauces/react/{id}/{reaction}', [SaucesController::class, 'like'])->name('sauce.react');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
});
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
