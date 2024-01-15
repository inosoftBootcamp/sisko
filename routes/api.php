<?php

use App\Http\Controllers\KelasController;
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

Route::get('kelas', [KelasController::class, 'index']);
Route::get('kelas/show/{id}', [KelasController::class, 'show']);
Route::post('kelas/store', [KelasController::class, 'store']);
Route::post('kelas/update/{id}', [KelasController::class, 'update']);
Route::post('kelas/delete/{id}', [KelasController::class, 'destroy']);
