<?php
use App\Http\Controllers\VoluntarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PresencaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vontable', [App\Http\Controllers\VoluntarioController::class, 'index'])->name('index');
Route::get('/modyfiV/{id}', [App\Http\Controllers\VoluntarioController::class, 'show'])->name('index');
Route::get('/test/{id}', [App\Http\Controllers\VoluntarioController::class, 'show'])->name('index');

// Remova a rota duplicada para '/presenca'
// Route::get('/presenca', [App\Http\Controllers\PresencaController::class, 'index'])->name('presenca');

Route::post('/pontoflex', [App\Http\Controllers\PresencaController::class, 'registrarEntrada'])->name('presenca.entrada');
Route::post('/presenca/saida', [App\Http\Controllers\PresencaController::class, 'registrarSaida'])->name('presenca.saida');
