<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovimentoEstoqueController;
use App\Http\Controllers\MovimentosFinanceirosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\Relatorios\SaldoEmpresa;
use App\Http\Controllers\Selects\EmpresaNomeTipo;
use App\Http\Controllers\Selects\ProdutoPorNome;
use App\Http\Controllers\UsersController;
use App\Models\MovimentosEstoque;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function(){
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('empresas', EmpresaController::class);

Route::resource('produtos', ProdutosController::class);

Route::resource('users', UsersController::class);

Route::resource('movimentos-financeiros', MovimentosFinanceirosController::class)->except(['edit', 'update']);

Route::post('/empresas/buscar-por/nome/tipo', EmpresaNomeTipo::class);

Route::post('/empresas/buscar-por/nome', EmpresaNomeTipo::class);

Route::post('/produto/buscar-por/nome', ProdutoPorNome::class);
Route::get('/empresas/relatorio/saldo/{empresa}', SaldoEmpresa::class)->name('empresas.relatorios.saldo');

Route::delete('/movimentos_estoque/{id}', [MovimentoEstoqueController::class, 'destroy'])->name('movimentos_estoque.destroy');
Route::post('/movimentos_estoque', [MovimentoEstoqueController::class, 'store'])->name('movimentos_estoque.store');

});


