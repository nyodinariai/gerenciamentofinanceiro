<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovimentosFinanceirosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsersController;
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

Route::resource('movimentos-financeiros', MovimentosFinanceirosController::class);

});


