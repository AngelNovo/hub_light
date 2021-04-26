<?php

use App\Http\Controllers\tipus_usuari_controller;
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
    return view('home');
});

Route::get('/tipus_usuari', [tipus_usuari_controller::class,'get_all']);
Route::post('/tipus_usuari',[tipus_usuari_controller::class,'store']);
