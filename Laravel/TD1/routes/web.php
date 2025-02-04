<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ClientController;

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');