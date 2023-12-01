<?php

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

Route::apiResource('transactions', \App\Http\Controllers\StoreController::class);

//Route::get('/transactions', [\App\Http\Controllers\StoreController::class, 'index']);
//Route::post('/transactions', [\App\Http\Controllers\StoreController::class, 'store']);
//Route::get('/transactions/{id}', [\App\Http\Controllers\StoreController::class, 'update']);
