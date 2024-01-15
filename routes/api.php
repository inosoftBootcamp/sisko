<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
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

Route::controller(KelasController::class)->group(function(){
    Route::get('kelas', 'index');
    Route::get('kelas/show/{id}', 'show');
    Route::post('kelas/store', 'store');
    Route::post('kelas/update/{id}', 'update');
    Route::post('kelas/delete/{id}', 'destroy');
});

Route::controller(SiswaController::class)->group(function(){
    Route::get('siswa', 'index');
    Route::get('siswa/show/{id}', 'show');
    Route::post('siswa/store', 'store');
    Route::post('siswa/update/{id}', 'update');
    Route::post('siswa/delete/{id}', 'destroy');
});
