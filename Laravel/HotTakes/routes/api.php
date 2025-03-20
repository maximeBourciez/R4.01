<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaucesController;


Route::apiResource('sauces', SaucesController::class);
