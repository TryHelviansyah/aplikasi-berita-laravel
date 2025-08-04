<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsViewController;
use App\Http\Controllers\ArticlePageController;
use App\Http\Controllers\PublicArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [NewsViewController::class, 'index'])->name('news.index');
Route::resource('my-articles', ArticlePageController::class);
Route::get('/articles', [PublicArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [PublicArticleController::class, 'show'])->name('articles.show');