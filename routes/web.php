<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CategoryController;

Route::get('/', [PublicController::class,'home'])->name('welcome');
Route::get('/profile', [PublicController::class, 'profile'])->middleware('auth')->name('profile');

// rotte per ARTICLES
Route::get('/articles/index', [ArticleController::class,'index'])->name('index.articles');

Route::get('/articles/create', [ArticleController::class,'create'])->name('create.articles');

Route::post('/articles/store', [ArticleController::class, 'store'])->name('store.articles');

Route::get('/articles/show/{article}', [ArticleController::class,'show'])->name('show.articles');

Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('edit.articles');

Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('update.articles');

Route::delete('/article/delete/{article}', [ArticleController::class, 'destroy'])->name('delete.articles');

// rotta category
Route::get('/category/index/{category}', [CategoryController::class,'categoryIndex'])->name('index.category');

// rotta country
Route::get('/country/index/{country}', [CountryController::class,'countryIndex'])->name('index.country');
