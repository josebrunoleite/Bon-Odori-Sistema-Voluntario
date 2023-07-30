<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VoluntarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\ExcelController;



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
/* Voluntario Padrão */
Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::GET('/sobre-voce', [App\Http\Controllers\HomeController::class, 'sobreyou'])->name('home');
Route::GET('/info', [App\Http\Controllers\HomeController::class, 'info'])->name('home');
Route::GET('/upload', [App\Http\Controllers\HomeController::class, 'info'])->name('home');
Route::GET('/down', [App\Http\Controllers\HomeController::class, 'info'])->name('home');
/* Voluntario Controller */
Route::GET('/vontable', [App\Http\Controllers\VoluntarioController::class, 'index'])->name('index');
Route::GET('/createfiV', [App\Http\Controllers\VoluntarioController::class, 'create'])->name('creat');
Route::GET('/modyfiV/{id}', [App\Http\Controllers\VoluntarioController::class, 'edit'])->name('edit');
Route::GET('/test/{id}', [App\Http\Controllers\VoluntarioController::class, 'edit'])->name('edit');
Route::put('/voluntarioat/{id}', [App\Http\Controllers\VoluntarioController::class, 'update'])->name('voluntario.update');
Route::put('/voluntarioca', [App\Http\Controllers\VoluntarioController::class, 'store'])->name('voluntario.store');
/* Presença Controller */
Route::GET('/presenca', [App\Http\Controllers\PresencaController::class, 'index'])->name('presenca');
Route::POST('/presenca/entrada', [App\Http\Controllers\PresencaController::class, 'registrarEntrada'])->name('presenca.entrada');
Route::POST('/presenca/saida', [App\Http\Controllers\PresencaController::class, 'registrarSaida'])->name('presenca.saida');
Route::GET('/presenca/{codigo}', [App\Http\Controllers\PresencaController::class, 'codigovalido'])->name('presenca');
/* Pedido 
Route::get('/listar-pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('listar_pedidos');
Route::get('/criar-pedido', [App\Http\Controllers\PedidoController::class, 'create'])->name('criar_pedido');
Route::post('/salvar_pedido', [App\Http\Controllers\PedidoController::class, 'store'])->name('salvar_pedido');
Route::post('/responder-pedido/{id}', [App\Http\Controllers\PedidoController::class, 'responderPedido'])->name('responder_pedido');
*/
/*Import*/
Route::GET('/import_excel', [App\Http\Controllers\ExcelController::class, 'importForm'])->name('Import Formulario');
Route::POST('/import_excelFu', [App\Http\Controllers\ExcelController::class, 'import'])->name('Import');
