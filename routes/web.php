<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/article/listeArticle', [ArticleController::class, 'show']);
Route::get('/article/{id}', [ArticleController::class, 'voirDetails']);
Route::patch('/articleModif/{id}', [ArticleController::class, 'update']); //permet de renvoyer le formulaire avec patch
Route::get('/modifier/{id}', [ArticleController::class, 'edit']); //permet de renvoyer la vue qui permet de modifier article
Route::delete('/articleSupprimer/{id}', [ArticleController::class, 'destroy']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/profil', [UserController::class, 'profil']);
    Route::get('/user', [UserController::class, 'user']);
    Route::get('/articles', [UserController::class, 'articles']);
    Route::get('/commentaires', [UserController::class, 'commentaires']);
    Route::post('/article/AjouterArticle', [ArticleController::class, 'store']);
    Route::get('/articles/ajouter', [UserController::class, 'ajouter']);
    Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser']);
});

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profilUser']);
    Route::patch('/updateProfile/{id}', [UserController::class, 'updateProfile']);
    Route::patch('/updatePasswd/{id}', [UserController::class, 'updatePasswd']);
    Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser']);
});

Route::get('/', [UserController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route pour l'authentication
Auth::routes();
