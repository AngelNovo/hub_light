<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContingutController;
use App\Http\Controllers\DerechosAutorController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TipoContenidoController;
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

Route::get('/', [ContingutController::class,'getHome']);

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
Route::get('/explorar/{id}',[ContingutController::class,'get']);
Route::post('/contingut',[ContingutController::class,'store']);
// *Drets autor*
Route::get('/derechosautor',[DerechosAutorController::class,'getAll']);
// *Tipo contenido*
Route::get('/tipocontenido',[TipoContenidoController::class,'getAll']);
// *Xat*

//  *Tags*
Route::get('/tags',[TagsController::class,'getAll']);
// *Usuari estadistiques*

//  *Contingut estadistiques*

// *ADMIN*
Route::group(['middleware'=>'auth'], function() {
    Route::get('/back/admin/home', function() {
        return view('back.home');
    });
    Route::get('/back/admin/dashboard', [AdminController::class,'dashboard']);
    Route::get('/back/admin/u/adminify', [AdminController::class,'adminify']);
    Route::put('/back/admin/u/adminify', [AdminController::class,'makeAdmin']);

    Route::get('/back/admin/u/block/', [AdminController::class,'getBlocked']);
    Route::put('/back/admin/u/block', [AdminController::class,'blockUser']);

    Route::get('/back/admin/u/notify', [AdminController::class,'getUsersNotify']);
    Route::post('/back/admin/u/notify', [AdminController::class,'insertNotify']);

    Route::get('/back/admin/u/notifyList', [AdminController::class,'getUsersNotifyList']);
    Route::delete('/back/admin/u/notifyList', [AdminController::class,'deleteNotifyFromList']);
    Route::put('/back/admin/u/notifyList', [AdminController::class,'acceptNotify']);

    Route::get('/back/admin/tipususer', [TipusUsuariController::class,'getAll']);
    Route::post('/back/admin/tipususer', [TipusUsuariController::class,'store']);
    Route::delete('/back/admin/tipususer', [TipusUsuariController::class,'delete']);

    Route::get('/back/admin/adultify', [AdminController::class,'getContent']);
    Route::put('/back/admin/adultify', [AdminController::class,'adultify']);
});

Auth::routes();

// Explorar
Route::get('/explorar',[ContingutController::class,'getAll']);

// Recomendados
Route::get('/recomendados',function() {
    return view('front.recomendados');
});

// Destacados
Route::get('/destacados',[ContingutController::class,'getDestacados']);

// Opciones
Route::get('/opciones/{id}',[UsuariController::class,'opciones']);
Route::put('/opciones/perfil',[UsuariController::class,'updatePerfil']);
