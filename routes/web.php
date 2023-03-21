<?php

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

Route::resource('contatos', ContatoController::class);
Route::get('/contatos/{contato}/edit', [ContatoController::class, 'edit'])->name('contatos.edit');
Route::put('/contatos/{contato}', [ContatoController::class, 'update'])->name('contatos.update');
Route::delete('/contatos/{contato}', [ContatoController::class, 'destroy'])->name('contatos.destroy');
Route::get('/contatos/relatorio', 'ContatoController@relatorio')->name('contatos.relatorio');
