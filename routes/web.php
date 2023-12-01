<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
 */

//--  GET  --//
Route::get('/',[MainController::class,'index'])->name('home');

//--  Esta ruta es para limpiar toda la tabla que contine las notas.
Route::get('/reset',[MainController::class,'reseTable'])->name('reset');

//--  POST  --//
Route::post('/store',[MainController::class,'store'])->name('store');
Route::post('/show',[MainController::class,'show'])->name('show');
Route::post('/delete',[MainController::class,'delete'])->name('delete');
