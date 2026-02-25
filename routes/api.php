<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/movies', [MovieController::class, "index"]);
Route::post('/movies', [MovieController::class, "store"]);

Route::get('/ratings', [RatingController::class, "index"]);
Route::post('/ratings', [RatingController::class, "store"]);
