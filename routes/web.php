<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RepositoryController::class, 'index']);
Route::get('/repositories/search', [RepositoryController::class, 'search']);
Route::get('/api/all', [ApiController::class, 'index']);
Route::get('/api/find', [ApiController::class, 'find']);
Route::get('/api/find/{id}', [ApiController::class, 'delete']);
