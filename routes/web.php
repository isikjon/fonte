<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/catalog', [PageController::class, 'catalog'])->name('catalog');
Route::get('/catalog/{slug}', [PageController::class, 'catalogItem'])->name('catalog.item');
Route::get('/students', [PageController::class, 'students'])->name('students');
Route::get('/delivery', [PageController::class, 'delivery'])->name('delivery');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogItem'])->name('blog.item');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/doc/{slug}', [PageController::class, 'document'])->name('document');
