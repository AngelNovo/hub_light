<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContingutController;
use App\Http\Controllers\DerechosAutorController;
use App\Http\Controllers\InteraccioController;
use App\Http\Controllers\SeguidorsController;
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

// *Usuari*
Route::get('/usuaris',[UsuariController::class,'getAll']);
Route::get('/usuaris/{id}',[UsuariController::class,'get']);
Route::get('/logout',[UsuariController::class,'logout']);
Route::put('/usuaris/update',[UsuariController::class,'update']);
Route::put('/usuaris/update/foto',[UsuariController::class,'updateFoto']);
// Seguidors
Route::post('/usuaris/add/friend',[SeguidorsController::class,'store']);
Route::put('/usuaris/add/friend',[SeguidorsController::class,'edit']);
// *Tipus usuari*
Route::get('/tipusUsuari', [TipusUsuariController::class,'getAll']);
Route::post('/tipusUsuari',[TipusUsuariController::class,'store']);
// *Contingut*
Route::get('/contingut/{id}',[ContingutController::class,'get']);
Route::post('/contingut',[ContingutController::class,'store']);
Route::get('/comment/{id}',[InteraccioController::class,'getComments']);
// *Drets autor*
Route::get('/derechosautor',[DerechosAutorController::class,'getAll']);
// *Tipo contenido*
Route::get('/tipocontenido',[TipoContenidoController::class,'getAll']);
// Notificaciones
Route::get('/notificaciones/{id}',[SeguidorsController::class,'getNotificaciones']);
// *Xat*

//  *Tags*
Route::get('/tags',[TagsController::class,'getAll']);
// *Usuari estadistiques*

//  *Contingut estadistiques*

// Buscador
Route::get('/buscador',[ContingutController::class,'buscador']);

// *ADMIN*
Route::group(['middleware'=>'auth'], function() {
    // Home
    Route::get('/', function() {
        return view('front.home');
    });
    Route::get('/home/getall',[ContingutController::class,'getHome']);
    // Backend
    Route::get('/back/admin/home', function() {
        return redirect('/back/admin/dashboard');
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

    Route::get('/back/admin/tipocontent', [TipoContenidoController::class,'getTypeContent']);
    Route::post('/back/admin/tipuscontent',[TipoContenidoController::class,'store']);
    Route::delete('/back/admin/tipuscontent',[TipoContenidoController::class,'delete']);
    Route::put('/back/admin/tipuscontent',[TipoContenidoController::class,'edit']);

    Route::get('/back/admin/rights', [DerechosAutorController::class,'getRights']);
    Route::post('/back/admin/rights',[DerechosAutorController::class,'store']);
    Route::delete('/back/admin/rights',[DerechosAutorController::class,'deleteRight']);
    Route::put('/back/admin/rights',[DerechosAutorController::class,'edit']);

    // Opciones
    Route::get('/opciones/{id}',[UsuariController::class,'opciones']);
    Route::put('/opciones/perfil',[UsuariController::class,'updatePerfil']);

    // Comentarios y likes
    Route::post('/comment', [InteraccioController::class,'store']);

    // Tags
    Route::get('/back/admin/tags',[TagsController::class,'getTags']);
    Route::delete('/back/admin/tags',[TagsController::class,'deleteTag']);
    Route::post('/back/admin/tags',[TagsController::class,'storeTag']);

    // Recomendados
    Route::get('/recomendados/{offset}',[ContingutController::class,'getRecomendados']);
    Route::get('/recomendados',function() {
        return view('front.recomendados');
    });
});

Auth::routes();

// Explorar
Route::get('/explorar',function() {
    return view('front.explorar');
});
Route::get('/explorar/{off}',[ContingutController::class,'getAll']);

// Destacados
Route::get('/destacados',[ContingutController::class,'getDestacados']);
Route::get('/destacados/vista',[ContingutController::class,'getDestacadosVista']);

// Verificar correo
Route::get('/verifica/{id}',[UsuariController::class,'verifica']);
