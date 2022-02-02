<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('default');
})->name('home');

Route::get('video/{videoId}', function () {
    return view('default');
})->name('single.video');

Route::get('/categories', function () {
    return view('default');
})->name('categories');

Route::get('/category/{categoryId}', function () {
    return view('default');
})->name('specific.category');

Route::get('admin/videos', function () {
    return view('default');
})
// ->middleware(['auth'])
->name('videos');

Route::get('admin/videos/create', function () {
    return view('default');
})
// ->middleware(['auth'])
->name('videos.create');

Route::get('admin/videos/{id}/edit', function () {
    return view('default');
})
// ->middleware(['auth'])
->name('videos.edit');

Route::get('/search', function () {
    return view('default');
})->name('search');


require __DIR__.'/auth.php';
