<?php

namespace App\Http\Controllers;

use App\Models\InteraccioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteraccioController extends Controller
{
    public function store(Request $request) {
        // dd($request);
        // return $request->all();

        $id_activo=Auth::user()->id;

        //1: recogemos el registro, si no existe lo crea y devuelve
        $interaccio=InteraccioModel::firstOrCreate([
            "id_usuari" => $id_activo,
            "id_contingut" => $request->input("id_contingut")
        ]);

        //2: rellenamos el objeto con los valores del request
        $interaccio->fill($request->all());
        // return $interaccio;

        //3: guardamos (update) el objeto
        $interaccio->save();

        if(isset($request->input('megusta'))) {

        }

        //4: devolvemos una respuesta response() con el valor que queramos
    }
}
