<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VoluntarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\ExcelController;
use App\Exports\DadosExport;
use App\Exports\PresencaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Artisan;




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
Route::get('/ani', function () {
    return view('aniversario');
});
Route::get('/music', function () {
    return view('music');
}); 
Route::get('/bonodori', function () {
    return view('anothers.bonodori');
}); 
Route::get('/natsu', function () {
    return view('anothers.natsu');
}); 
Route::get('/haru', function () {
    return view('anothers.haru');
}); 

Auth::routes();
/* Voluntario Padrão */
Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::GET('/sobre-voce', [App\Http\Controllers\HomeController::class, 'sobreyou'])->name('Sobre voce');
Route::GET('/info', [App\Http\Controllers\HomeController::class, 'info'])->name('info');
/* Route::GET('/upload', [App\Http\Controllers\HomeController::class, 'info'])->name('home');
Route::GET('/down', [App\Http\Controllers\HomeController::class, 'info'])->name('home');
 *//* Voluntario Controller */
Route::GET('/vontable', [App\Http\Controllers\VoluntarioController::class, 'index'])->name('vontable');
Route::GET('/createfiV', [App\Http\Controllers\VoluntarioController::class, 'create'])->name('creat');
Route::GET('/modyfiV/{id}', [App\Http\Controllers\VoluntarioController::class, 'edit'])->name('edit');
/* Route::GET('/test/{id}', [App\Http\Controllers\VoluntarioController::class, 'edit'])->name('edit');
 */
Route::delete('/deletefiV/{id}', [App\Http\Controllers\VoluntarioController::class, 'destroy'])->name('deletefiV');
Route::put('/voluntarioat/{id}', [App\Http\Controllers\VoluntarioController::class, 'update'])->name('voluntario.update');
Route::put('/voluntarioca', [App\Http\Controllers\VoluntarioController::class, 'store'])->name('voluntario.store');

/* Presença Controller */
Route::GET('/presenca', [App\Http\Controllers\PresencaController::class, 'index'])->name('presenca');
Route::POST('/presenca/entrada', [App\Http\Controllers\PresencaController::class, 'registrarEntrada'])->name('presenca.entrada');
Route::POST('/presenca/saida', [App\Http\Controllers\PresencaController::class, 'registrarSaida'])->name('presenca.saida');
Route::GET('/presenca/{codigo}', [App\Http\Controllers\PresencaController::class, 'codigovalido'])->name('presenca error');
Route::GET('/presen/tablea', [App\Http\Controllers\PresencaController::class, 'tabela'])->name('presenca.presencaTable');
Route::GET('/presen/waringpres/{id}', [App\Http\Controllers\PresencaController::class, 'waringpres'])->name('presenca.waringpres');

/* Pedido 
Route::get('/listar-pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('listar_pedidos');
Route::get('/criar-pedido', [App\Http\Controllers\PedidoController::class, 'create'])->name('criar_pedido');
Route::post('/salvar_pedido', [App\Http\Controllers\PedidoController::class, 'store'])->name('salvar_pedido');
Route::post('/responder-pedido/{id}', [App\Http\Controllers\PedidoController::class, 'responderPedido'])->name('responder_pedido');
*/
/*Import*/
Route::GET('/import_excel', [App\Http\Controllers\ExcelController::class, 'importForm'])->name('Import Formulario');
Route::GET('/export_excel', [App\Http\Controllers\ExcelController::class, 'exportForm'])->name('Export Formulario');
Route::POST('/import_excelFu', [App\Http\Controllers\ExcelController::class, 'import'])->name('Import');
Route::get('/exporta-usuario', function () {
    return Excel::download(new DadosExport(), 'usuarios.xlsx');
})->name('exportTable');

Route::get('/exporta-presenca', function () {
    return Excel::download(new PresencaExport(), 'presenca.xlsx');
})->name('exportTablepresenca');
/*pagamento*/
Route::GET('/pagamentofiV/{id}', [App\Http\Controllers\PagamentoController::class, 'index'])->name('pagamentofiV');
Route::put('/pagamentofiVpag/{id}', [App\Http\Controllers\PagamentoController::class, 'store'])->name('pagamentofiVStore');
Route::GET('/pass', [App\Http\Controllers\VoluntarioController::class, 'showChangePasswordForm'])->name('showChangePasswordForm');

Route::GET('/json', [App\Http\Controllers\HomeController::class, 'codigos'])->name('codigos');
Route::get('/qrcodeleitor', [App\Http\Controllers\QRCodeController::class, 'generate'])->name('qrcode.generate');
Route::GET('/qrcode', [App\Http\Controllers\PresencaController::class, 'registrarEntradaQrCode'])->name('qrcode');

/*bugs */
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application all cache has been cleared';
});
