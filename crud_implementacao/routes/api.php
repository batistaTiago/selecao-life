<?php

use Illuminate\Http\Request;

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

Route::get('/pessoa/{id}', 'PessoaController@getPessoaById');
Route::post('/pessoa', 'PessoaController@createNewPessoa');
Route::put('/pessoa/{id}', 'PessoaController@updatePessoa');
Route::delete('/pessoa/{id}', 'PessoaController@deletePessoaById');