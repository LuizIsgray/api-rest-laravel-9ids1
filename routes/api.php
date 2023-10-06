<?php

use App\Http\Controllers\LoginController;
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

Route::get('productos/', [ProductoController::class, 'list']);
Route::post('productos/nuevo', [ProductoController::class, 'create']);
Route::get('productos/consultar', [ProductoController::class, 'get']);
Route::post('productos/eliminar', [ProductoController::class, 'delete']);
