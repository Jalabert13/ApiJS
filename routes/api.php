<?php

use App\Http\Controllers\Api\MonstruoController;
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

Route::controller(MonstruoController::class)->group(function (){
    Route::get('/monstruos', 'index');
    Route::post('/monstruo', 'store');
    Route::get('/monstruo/{id}', 'show');
    Route::put('/monstruo/{id}', 'update');
    Route::delete('/monstruo/{id}', 'destroy');
});
