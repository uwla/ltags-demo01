<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('post', PostController::class);
Route::post('/post/tagged', [PostController::class, 'taggedBy']);
Route::post('/post/tagged_all', [PostController::class, 'taggedByAll']);
