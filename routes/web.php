<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPenjualanController;
use App\Http\Controllers\ItemController;

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
//     return view('datapenjualan');
// });
// Route::get('/databarang', function () {
//     return view('databarang');
// });

Route::get('/', [DataPenjualanController::class, 'index']);
// Route::get('/databarang', [ItemController::class, 'index']);   
// Route::post('/databarang', [ItemController::class, 'store']);
// Route::delete('/databarang/{kode}', [ItemController::class, 'destroy']);
// Route::put('/databarang/{kode}', [ItemController::class, 'update']);   
Route::resource('databarang', 'App\Http\Controllers\ItemController');