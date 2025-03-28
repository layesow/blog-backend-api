<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\CommentaireController;

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//route admin
Route::middleware(['auth:sanctum', /* 'role:admin' */])->group(function () {
    Route::get('admin/articles', [ArticleController::class, 'index']);
    Route::post('admin/articles', [ArticleController::class, 'store']);
    Route::get('admin/articles/{id}', [ArticleController::class, 'show']);  // Affichage d'un article spécifique
    Route::put('admin/articles/{id}', [ArticleController::class, 'update']);  // Mise à jour d'un article spécifique
    Route::delete('admin/articles/{id}', [ArticleController::class, 'destroy']);  // Suppression d'un article spécifique
});



//route front
Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{id}', [ArticleController::class, 'show']);  // Affichage d'un article spécifique
