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
        ->select('contingut.id','portada', 'link_copyright', 'url', 'descripcio', 'majoria_edat', 'reportat', 'contingut.estadistica', 'users.name as propietario', 'tipus_contingut', 'drets_autor', 'contingut.created_at', 'contingut.updated_at')
        ->join('users','users.id','=','contingut.propietari')
        ->orderBy('created_at',"desc")
        ->get();
        return view ('front.explorar')->with('results',$results);
    }
    public function get($id) {
        $results = DB::table('contingut')
        ->select('contingut.id','portada', 'link_copyright', 'url', 'descripcio', 'majoria_edat', 'reportat', 'contingut.estadistica', 'users.name as propietario', 'tipus_contingut', 'drets_autor', 'contingut.created_at', 'contingut.updated_at')
        ->join('users','users.id','=','contingut.propietari')
        ->where('contingut.id',$id)
        ->get();
        return $results;
    }

    public function store(Request $request) {

        $typeContent=$request->input('tipoC');
        $titulo=$request->input('titol');
        $rights=$request->input('derechoA');
        $linkCopy=$request->input('linkCopy');
        $desc=$request->input('desc');
        $portada=$request->input('portada');
        $overAge=($request->input('ageRestrict')=="on") ? 1 : 0;
        $pId=Auth::user()->id;

        if($typeContent==1) {
            $request->validate([
                'arxiu'=>'required|mimes:jpg,png,jpeg,gif,svg|max:4096',
                'derechoA'=>"required",
                'tipoC'=>"required"
            ]);
        }else if($typeContent==2) {
            $request->validate([
                'arxiu'=>'required|mimes:pdf,txt|max:4096',
                'titulo'=>"required",
                'derechoA'=>"required",
                'tipoC'=>"required"
            ]);
        }else if($typeContent==3) {
            $request->validate([
                'portada'=>'required|mimes:jpg,png,jpeg,gif,svg|max:4096',
                'arxiu'=>'required|mimes:mp3,ogg|max:20000',
                'derechoA'=>"required",
                'tipoC'=>"required"
            ]);
        }else if ($typeContent==4) {
            $request->validate([
                'portada'=>'required|mimes:jpg,png,jpeg,gif,svg|max:4096',
                'arxiu'=>'required|mimes:mp4,ogg|max:20000',
                'derechoA'=>"required",
                'tipoC'=>"required"
            ]);
        }else if($typeContent==5) {
            $request->validate([
                'portada'=>'required|mimes:jpg,png,jpeg,gif,svg|max:4096',
                'arxiu'=>'required|mimes:mp4,ogg|max:4096',
                'derechoA'=>"required",
                'tipoC'=>"required"
            ]);
        }

        $url=public_path('/contenido/'.$typeContent);

        if($portada) {
            $portada=time().'-'.Auth::user()->name.'.'.$request->portada->extension();
            $request->portada->move($url,$portada);
        }

        if($request->hasFile('arxiu')) {
            $archivo=time().'-'.Auth::user()->name.'.'.$request->arxiu->extension();
            $request->arxiu->move($url,$archivo);

            $statistic=EstadisticaContingutModel::create();

            $subido=ContingutModel::create([
                'propietari'=>$pId,
                'titulo'=>$titulo,
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
            if($subido) {
                $actius = DB::table('analitiques_generals')->max('id');
                $analitiques = AnalitiquesGeneralsModel::find($actius);
                $aux2 = AnalitiquesGeneralsModel::where('id',$actius)
                ->update([
                    "contenido_total"=>$analitiques->contenido_total+1
                ]);
                return redirect('/');
            }
        }

        return "El archivo no es correcto o su peso es superior al límite";
    }

}
