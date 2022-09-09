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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

//Route Pedidos
Route::get('contratar/servicio/{id}', [App\Http\Controllers\PedidosController::class, 'index']);
Route::post('solicitar/servicio',     [App\Http\Controllers\PedidosController::class, 'create'])->name('pedidos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Servicios
Route::get('/home/servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('servicios');
Route::get('/home/servicios/create', [App\Http\Controllers\ServiciosController::class, 'create'])->name('servicios_create');
Route::get('/home/servicios/delete/{id}', [App\Http\Controllers\ServiciosController::class, 'delete']);
Route::get('/home/servicios/duplicate/{id}', [App\Http\Controllers\ServiciosController::class, 'duplicate']);
Route::get('/home/pedidos', [App\Http\Controllers\ServiciosController::class, 'show']);
Route::get('/home/cambiar/estado/{id}/{estado}', [App\Http\Controllers\ServiciosController::class, 'changeEstado'])->name('estado');

//Route Categorias
Route::get('/home/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias');
Route::get('/home/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias_create');
Route::post('/home/categorias/store', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias_store');
Route::get('/home/categorias/delete/{id}', [App\Http\Controllers\CategoriaController::class, 'delete']);
Route::get('/home/categorias/duplicate/{id}', [App\Http\Controllers\CategoriaController::class, 'duplicate']);