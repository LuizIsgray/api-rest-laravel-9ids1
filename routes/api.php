<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);

Route::get('productos', [ProductoController::class, 'list']);
Route::post('productos', [ProductoController::class, 'create']);
Route::get('productos/{id}', [ProductoController::class, 'get']);
Route::put('productos/{id}', [ProductoController::class, 'update']);
Route::delete('productos/{id}', [ProductoController::class, 'delete']);

Route::get('clientes', [ClienteController::class, 'list']);
Route::post('clientes', [ClienteController::class, 'create']);
Route::get('clientes/{id}', [ClienteController::class, 'get']);
Route::put('clientes/{id}', [ClienteController::class, 'update']);
Route::delete('clientes/{id}', [ClienteController::class, 'delete']);

Route::get('pedidos', [PedidoController::class, 'list']);
Route::post('pedidos', [PedidoController::class, 'create']);
Route::get('pedidos/{id}', [PedidoController::class, 'get']);
Route::put('pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('pedidos/{id}', [PedidoController::class, 'delete']);

