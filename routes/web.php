<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\MovimentacaoController;
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

//MIDDLEWARE AUTENTICAÇÃO
Route::middleware(['auth'])->group(function () {

    //ROTA RAIZ
    Route::get('/', function () {
        return redirect()->route('funcionarios.index');
    });

    // FUNCIONÁRIO-----------------------------------------------------------------
    Route::resource('/bonificacao/funcionarios', FuncionarioController::class);

    Route::get('/bonificacao/extrato/{id}', [FuncionarioController::class, 'extrato'])
        ->name('funcionarios.extrato');

    // --------------------------------------------------------------------------

    // MOVIMENTAÇÃO-----------------------------------------------------------------
    Route::resource('/bonificacao/movimentacoes', MovimentacaoController::class);
    // --------------------------------------------------------------------------

});

Auth::routes();
