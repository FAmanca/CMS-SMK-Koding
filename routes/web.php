<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home',[
        'articles' => Post::all(),
    ]);
})->name('home');

// ARTICLE
Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
    Route::get('create', [ArticleController::class, 'create'])->name('create');
    Route::post('store', [ArticleController::class, 'store'])->name('store');
});

// CATEGORY
Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
});

