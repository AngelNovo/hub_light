<?php

use App\Http\Controllers\ContingutController;
use App\Http\Controllers\TipusUsuariController;
use App\Http\Controllers\UsuariController;
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
    return view('front.home');
});

// *Usuari*
Route::get('/usuaris',[UsuariController::class,'getAll']);
Route::get('/usuaris/{id}',[UsuariController::class,'get']);
Route::post('/usuaris/{id}',[UsuariController::class,'get']);
// *Tipus usuari*
Route::get('/tipusUsuari', [TipusUsuariController::class,'getAll']);
Route::post('/tipusUsuari',[TipusUsuariController::class,'store']);
// *Contingut*
Route::get('/contingut',[ContingutController::class,'getAll']);
Route::get('/contingut/{id}',[ContingutController::class,'get']);
// *Drets autor*

// *Xat*

// *Usuari estadistiques*

//  *Contingut estadistiques*

// *ADMIN*
Route::get('/back/admin/login/{id}',[UsuariController::class,'getAdmin']);
Route::get('/back/admin/home', function() {
    return view('back.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
