<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', 'AuthController@index');
    Route::post('logout', 'AuthController@logout');
});
Route::get("search/{n_inventario}", [ProductoController::class, 'search']);
Route::get("innerjoin",[ProductoController::class,'innerjoin']);