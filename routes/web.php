<?php

use App\Http\Controllers\ShortURLController;
use Illuminate\Support\Facades\Route;

Route::get('/{link:short}', [ShortURLController::class, 'redirect']);
// Route::get('/{short}', [ShortURLController::class, 'redirectOldWay']);
Route::get('/', [ShortURLController::class, 'index']);
Route::post('/', [ShortURLController::class, 'shorten']);
