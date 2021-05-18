<?php

namespace App\Http\Controllers;

use App\Models\InteraccioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteraccioController extends Controller
{
    public function store(Request $request) {
        if(isset($request->input('like'))) {
            InteraccioModel::firstOrNew([
                'megusta'=>$request->input('like'),
                'id_Usuari'=>Auth::user()->id,
                'id_Contingut'=>$request->input('id_contingut')
            ])
            ->where('id_Contingut',$request->input('propietari'));
        }
        if(isset($request->input('comentario'))) {
            InteraccioModel::firstOrNew([
                'comentario'=>$request->input('comentario'),
                'id_Usuari'=>Auth::user()->id,
                'id_Contingut'=>$request->input('id_contingut')
            ])
            ->where('id_Contingut',$request->input('propietari'));
        }
    }
}
