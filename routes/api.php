<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/add', [PostController::class, 'store'])->name('post.store');
Route::get('/index', [PostController::class, 'index']);
Route::delete('delete/{id}', [PostController::class, 'destroy']);
Route::get('get/{id}', [PostController::class, 'edit']);
Route::get('search/{query}', [PostController::class, 'search']);
Route::post('update/{id}', [PostController::class, 'update']);
Route::get('show/{id}', [PostController::class, 'show']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [UserController::class, 'logout']);
    // Route::get('/user', [UserController::class, 'getUser']);
});
