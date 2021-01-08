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

Route::get('/', function () {
    return view('auth.login');
})->name('main');

Auth::routes();

Route::resource('/empresa', 'EmpresaController');
Route::resource('/inventario_vehiculo', 'InventarioVehiculoController');
Route::resource('/usuario', 'UsuarioController');
Route::resource('/registro', 'RegistroController');
Route::resource('/persona', 'PersonaController');
