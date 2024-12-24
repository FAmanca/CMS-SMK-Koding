<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home', [
        'articles' => Post::all(),
    ]);
})->name('home');

// AUTH
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('signup', [AuthController::class, 'signup'])->name('signup');
    Route::get('signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('regsiter', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('manageusers', [UserController::class, 'index'])->name('manageuser')->middleware('checkadmin');

// ARTICLE
Route::group(['prefix' => 'article', 'as' => 'article.', 'middleware' => ['checkadmin'] ], function () {
    Route::get('create', [ArticleController::class, 'create'])->name('create');
    Route::get('manage', [ArticleController::class, 'manage'])->name('manage');
    Route::post('store', [ArticleController::class, 'store'])->name('store');
    Route::delete('delete/{post}', [ArticleController::class, 'destroy'])->name('delete');
    Route::post('edit/{post}', [ArticleController::class, 'edit'])->name('edit');
    Route::post('update/{post}', [ArticleController::class, 'update'])->name('update');
});

// CATEGORY
Route::group(['prefix' => 'category', 'as' => 'category.', 'middleware' => ['checkadmin']], function () {
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
});
