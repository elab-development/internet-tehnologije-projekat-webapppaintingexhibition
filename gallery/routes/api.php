<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\ExhibitController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PieceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/pg', [ArtistController::class, 'indexPaginate']);
Route::get('/artists/{id}', [ArtistController::class, 'show']);

Route::get('/galleries', [GalleryController::class, 'index']);
Route::get('/galleries/{id}', [GalleryController::class, 'show']);

Route::get('/exhibits', [ExhibitController::class, 'index']);
Route::get('/exhibits/{id}', [ExhibitController::class, 'show']);

Route::get('/pieces', [PieceController::class, 'index']);
Route::get('/pieces/pg', [PieceController::class, 'indexPaginate']);
Route::get('/pieces/{id}', [PieceController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('/artists', ArtistController::class)
        ->only(['store', 'update', 'destroy']);

        Route::resource('/galleries', GalleryController::class)
        ->only(['store', 'update', 'destroy']);

        Route::resource('/exhibits', ExhibitController::class)
        ->only(['store', 'update', 'destroy']);

        Route::resource('/pieces', PieceController::class)
        ->only(['store', 'update', 'destroy']);

    Route::post('/logout', [UserAuthController::class, 'logout']);
});
