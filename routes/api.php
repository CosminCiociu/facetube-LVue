<?php

use App\Http\Controllers\Api\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('companies', \App\Http\Controllers\Api\CompanyController::class);
Route::apiResource('videos', \App\Http\Controllers\Api\VideoController::class);
Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);
Route::get('/livesearch', [ \App\Http\Controllers\Api\VideoController::class, 'getVideosBySearch']);
Route::get('/search', [ \App\Http\Controllers\Api\VideoController::class, 'getVideosForSearchPage']);
Route::get('/related-videos', [ \App\Http\Controllers\Api\VideoController::class, 'getRelatedVideosByCategory']);