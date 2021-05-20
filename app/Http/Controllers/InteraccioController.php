<?php

namespace App\Http\Controllers;

use App\Models\ContingutModel;
use App\Models\ContingutTagModel;
use App\Models\EstadisticaContingutModel;
use App\Models\InteraccioModel;
use App\Models\User;
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

        if(null!==($request->input('megusta'))) {
            $recomenats=ContingutTagModel::where('id_contingut',$interaccio->id_contingut)
            ->join('tags','tags.id',"=",'id_tag')
            ->get('tags.nombre');
            $usuario = User::where('id',Auth::user()->id)->get()->first();
            $recomenatsRaw=explode(";",$usuario->recomenat);
            // return $recomenats;
            foreach($recomenats as $r){
                if(sizeof($recomenatsRaw)>30) {
                    array_pop($recomenatsRaw);
                    array_unshift($recomenatsRaw,$r->nombre);
                }else {
                    array_unshift($recomenatsRaw,$r->nombre);
                }
                $recomenatsRaw=implode(';',$recomenatsRaw);
                return $recomenatsRaw;

            }
            return $recomenatsRaw;
        }

        //4: devolvemos una respuesta response() con el valor que queramos
    }
}
