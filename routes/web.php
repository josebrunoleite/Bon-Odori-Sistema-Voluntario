<?php

use App\Http\Controllers\VoluntarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PresencaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/tabelaAll', function () {
    return view('tabelas.test');
    Route::post('/minha-rota', [MeuController::class, 'minhaFuncao'])->name('minha_rota');

});
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::GET('/vontable', [App\Http\Controllers\VoluntarioController::class, 'index'])->name('index');
Route::GET('/modyfiV/{id}', [App\Http\Controllers\VoluntarioController::class, 'show'])->name('index');
Route::GET('/test/{id}', [App\Http\Controllers\VoluntarioController::class, 'show'])->name('index');

Route::GET('/presenca', [App\Http\Controllers\PresencaController::class, 'index'])->name('presenca');
Route::POST('/presenca/entrada', [App\Http\Controllers\PresencaController::class, 'registrarEntrada'])->name('presenca.entrada');
Route::POST('/presenca/saida', [App\Http\Controllers\PresencaController::class, 'registrarSaida'])->name('presenca.saida');
Route::GET('/presenca/{codigo}', [App\Http\Controllers\PresencaController::class, 'codigovalido'])->name('presenca');
