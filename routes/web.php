<?php

use App\Http\Controllers\RepositoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RepositoryController::class, 'index']);
Route::get('/repositories/search', [RepositoryController::class, 'search']);
