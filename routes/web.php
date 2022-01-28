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
    return view('videos');
})->name('home');

Route::get('/{videoId}', function () {
    return view('singleVideo');
})->name('single.video');

Route::get('/categories', function () {
    return view('videos');
})->name('categories');


Route::get('admin/videos', function () {
    return view('videos');
})
// ->middleware(['auth'])
->name('videos');

Route::get('admin/videos/create', function () {
    return view('videos');
})
// ->middleware(['auth'])
->name('videos.create');

Route::get('admin/videos/{id}/edit', function () {
    return view('videos');
})
// ->middleware(['auth'])
->name('videos.edit');

require __DIR__.'/auth.php';
