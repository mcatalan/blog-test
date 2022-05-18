<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/post', [PostController::class, 'index'])->name('api.post.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('api.post.show');
Route::post('/post', [PostController::class, 'store'])->name('api.post.store');
