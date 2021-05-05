<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContingutController;
use App\Http\Controllers\TipusUsuariController;
use App\Http\Controllers\UsuariController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/logout',[UsuariController::class,'logout']);
Route::put('/usuaris/update',[UsuariController::class,'update']);
Route::put('/usuaris/update/foto',[UsuariController::class,'updateFoto']);
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
Route::group(['middleware'=>'auth'], function() {
    Route::get('/back/admin/home', function() {
        return view('back.home');
    });
    Route::get('/back/admin/u/adminify', [AdminController::class,'adminify']);
    Route::put('/back/admin/u/adminify', [AdminController::class,'makeAdmin']);
    Route::get('/back/admin/u/block/', [AdminController::class,'getBlocked']);
    Route::put('/back/admin/u/block', [AdminController::class,'blockUser']);
    Route::get('/back/admin/u/notify', [AdminController::class,'getUsersNotify']);
    Route::post('/back/admin/u/notify', [AdminController::class,'insertNotify']);
});

Auth::routes();
// Home
//Route::get('/home', [HomeController::class, 'index'])->name('home');

// Explorar
Route::get('/explorar',function() {
    return view('front.explorar');
});

// Recomendados
Route::get('/recomendados',function() {
    return view('front.recomendados');
});

// Destacados
Route::get('/destacados',function() {
    return view('front.destacados');
});
