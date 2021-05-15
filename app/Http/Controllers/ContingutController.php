<?php

namespace App\Http\Controllers;

use App\Models\AnalitiquesGeneralsModel;
use App\Models\ContingutModel;
use App\Models\EstadisticaContingutModel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ContingutController extends Controller
{

    public function getHome() {
        $content=AnalitiquesGeneralsModel::all();
        $content = $content[sizeof($content)-1];
        $last_data=$content->created_at;
        $last_data = explode("T",$last_data);
        $last_data = $last_data[0];
        $last_data = explode("-",$last_data);
        $last_data = (int)$last_data[2];
        $now=(int)date("d");

        if($now-$last_data>=1){
            $new_statistic=AnalitiquesGeneralsModel::create([
                "usuaris_suspes"=>$content->usuaris_suspes,
                "usuaris_actius"=>$content->usuaris_actius,
                "usuaris_enperill"=>$content->usuaris_enperill,
                "contenido_total"=>$content->contenido_total
            ]);
        }

        return view('front.home');
    }

    public function getAll() {
        $results = DB::table('contingut')
        ->select('contingut.id','titol','portada', 'link_copyright', 'url', 'descripcio', 'majoria_edat', 'reportat', 'contingut.estadistica', 'users.name', 'tipus_contingut', 'drets_autor', 'contingut.created_at', 'contingut.updated_at')
        ->join('users','users.id','=','contingut.propietari')
        ->get();
        return view ('front.explorar')->with('results',$results);
    }
    public function get($id) {
        $results = DB::table('contingut')
        ->select('contingut.id','titol','portada', 'link_copyright', 'url', 'descripcio', 'majoria_edat', 'reportat', 'contingut.estadistica', 'users.name', 'tipus_contingut', 'drets_autor', 'contingut.created_at', 'contingut.updated_at')
        ->join('users','users.id','=','contingut.propietari')
        ->where('contingut.id',$id)
        ->get();
        return $results;
    }

    public function store(Request $request) {
        // return $request;
        // return $request;
        // $request->validate([
        //     'portada'=>'mimes:jpg,png,jpeg,gif|max:4096',
        //     'arxiu'=>'required|mimes:jpg,png,jpeg,gif|max:10000',
        //     'file'=>"required",
        //     'derechoA'=>"required",
        //     'tipoC'=>"required"
        // ]);

        $typeContent=$request->input('tipoC');
        $rights=$request->input('derechoA');
        $linkCopy=$request->input('linkCopy');
        $desc=$request->input('desc');
        $portada=$request->input('portada');
        $overAge=($request->input('ageRestrict')=="on") ? 1 : 0;
        $pId=Auth::user()->id;

        $url=public_path('/contenido/'.$typeContent);

        if($request->hasFile('arxiu')) {
            $archivo=time().'-'.Auth::user()->name.'.'.$request->arxiu->extension();
            $request->arxiu->move($url,$archivo);

            $statistic=EstadisticaContingutModel::create();

            // $last_statistic=EstadisticaContingutModel::all();
            // $last_statistic_id=$last_statistic[sizeof($last_statistic)-1];

            $subido=ContingutModel::create([
                'propietari'=>$pId,
                'drets_autor'=>$rights,
                'tipus_contingut'=>$typeContent,
                'link_copyright'=>$linkCopy,
                'descripcio'=>$desc,
                'majoria_edat'=>$overAge,
                'portada'=>$portada,
                'url'=>$archivo,
                'reportat'=>0,
                'estadistica'=>$statistic->id
            ]);
        }

        $actius = DB::table('analitiques_generals')->max('id');
        $analitiques = AnalitiquesGeneralsModel::find($actius);
            $aux2 = AnalitiquesGeneralsModel::where('id',$actius)
            ->update([
                "contenido_total"=>$analitiques->contenido_total+1
            ]);
        return redirect('/');
    }

}
