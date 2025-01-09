<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\RpiMaquinaController;
use App\Http\Controllers\MapsController;
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

Route::prefix('maquinas')->group(function () {
    Route::post('/dados', [MaquinaController::class, 'storeDado']);
    Route::post('/dados/{maquina_id}', [MaquinaController::class, 'indexMaquinasDados']);
    Route::get('/', [MaquinaController::class, 'indexMaquinas']);
});

Route::prefix('points')->group(function () {
    Route::get('/', [MapsController::class, 'index']);
    Route::post('/create', [MapsController::class, 'store']);
    Route::put('/{id}', [MapsController::class, 'update']);
    Route::delete('/{id}', [MapsController::class, 'destroy']);
});
