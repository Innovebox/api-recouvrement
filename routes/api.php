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

Route::get('/',[\App\Http\Controllers\API\EcheanceController::class,'version']);

Route::get('echeances/{date_cloture}',[\App\Http\Controllers\API\EcheanceController::class,'index']);


Route::get('echeances-show/{id}/',[\App\Http\Controllers\API\EcheanceController::class,'show']);

Route::get('echeances-filtre',[\App\Http\Controllers\API\EcheanceController::class,'filterByDate']);

Route::put('echeances-update',[\App\Http\Controllers\API\EcheanceController::class,'update']);
