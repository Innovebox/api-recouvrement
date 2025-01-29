<?php

use App\Http\Controllers\API\FactureController;
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

Route::get('echeances-conventions/{date_cloture}',[\App\Http\Controllers\API\EcheanceController::class,'indexconventions']);
Route::get('echeances-conventions-filtre/{date_cloture}',[\App\Http\Controllers\API\EcheanceController::class,'filterByDateconventions']);

Route::get('echeances-show/{id}/',[\App\Http\Controllers\API\EcheanceController::class,'show']);

Route::get('echeances-by-facture/{id}',[\App\Http\Controllers\API\EcheanceController::class,'echeancesbyfacture']);

Route::get('echeances-filtre/{date_cloture}',[\App\Http\Controllers\API\EcheanceController::class,'filterByDate']);

Route::get('echeances-valide',[\App\Http\Controllers\API\EcheanceController::class,'isvalide']);

Route::put('echeances-delete',[\App\Http\Controllers\API\EcheanceController::class,'delete']);

Route::put('echeances-delete-all',[\App\Http\Controllers\API\EcheanceController::class,'deleteall']);

Route::put('echeances-update',[\App\Http\Controllers\API\EcheanceController::class,'update']);

Route::put('echeances-update-montant',[\App\Http\Controllers\API\EcheanceController::class,'updatemontant']);

Route::put('update-echeances-convention',[\App\Http\Controllers\API\EcheanceController::class,'updatemontantConvention']);

Route::put('echeances-updateobservation',[\App\Http\Controllers\API\EcheanceController::class,'updateObservation']);

Route::put('updatevalide',[\App\Http\Controllers\API\EcheanceController::class,'updatevalide']);

Route::put('updatevalideall',[\App\Http\Controllers\API\EcheanceController::class,'updatevalideall']);

Route::get('echeances-convention',[\App\Http\Controllers\API\EcheanceConventionController::class,'index']);


Route::post('factures', [FactureController::class, 'store']);
Route::post('factures-cheques', [FactureController::class, 'facturescheques']);
