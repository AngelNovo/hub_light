<?php

namespace App\Http\Controllers;

use App\Models\AnalitiquesGeneralsModel;
use App\Models\ContingutModel;
use App\Models\ContingutTagModel;
use App\Models\EstadisticaContingutModel;
use App\Models\SeguidorsModel;
use App\Models\TagsModel;
use App\Models\TipoContenidoModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContingutController extends Controller
{

    public function getHome() {
        $content=AnalitiquesGeneralsModel::all();
        $content = $content[sizeof($content)-1];
        $last_data=$content->created_at;
        // Cada dia crea unas estadisticas generales nuevas
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

    public function getAll($offset) {
        $results = DB::table('contingut')
        ->select('contingut.id','portada', 'link_copyright', 'url', 'descripcio', 'majoria_edat', 'reportat', 'users.name as propietario', 'tipus_contingut', 'drets_autor','contingut.created_at', 'contingut.updated_at')
        ->join('users','users.id','=','contingut.propietari')
        ->orderBy('created_at',"desc")
        ->limit(30,$offset)
        ->get();
        return $results;
        // return view ('front.explorar')->with('results',$results);
    }
    public function get($id) {
        $resultAmistad=[];
        $results = DB::table('contingut')
        ->select('contingut.id','portada','contingut.titulo', 'link_copyright', 'url', 'descripcio', 'majoria_edat', 'users.id as id_user','users.foto as foto_perfil','users.name as propietario', 'tipus_contingut', 'drets_autor','estadistiques_contingut.q_likes as likes', 'contingut.created_at')
        ->join('users','users.id','=','contingut.propietari')
        ->join('estadistiques_contingut','contingut.estadistica',"=",'estadistiques_contingut.id_estadistica')
        ->where('contingut.id',$id)
        ->get();

        $id_user=DB::table('users')
        ->select('users.id')
        ->join('contingut','contingut.propietari','=','users.id')
        ->where(['contingut.id'=>$id])
        ->get();
        $id_user=$id_user[0]->id;
        // return $id_user;

        if(isset(Auth::user()->id)){
            $resultAmistad=SeguidorsModel::where('id_Usuari',)
            ->orWhere('id_usuari',$id_user)
            ->orWhere('id_seguit',$id_user)
            ->orWhere('id_seguit',Auth::user()->id)
            ->get();
        }

        $tags=ContingutModel::where('id_contingut',$id)
        ->join('contingut_tag','contingut_tag.id_contingut','=','contingut.id')
        ->join('tags','tags.id','=','contingut_tag.id_tag')->get('nombre');

        return view('front.contenido')
            ->with('results',$results[0])
            ->with('amistad', (sizeof($resultAmistad)>0)?1:0)
            ->with('tags',$tags);
    }

    public function getRecomendados($offset) {
        $auth=Auth::user()->id;
        $info=User::where('id',$auth)->get();
        $recomenatsListRaw=$info[0]->recomenat;
        $recomenatsListArray=explode(';',$recomenatsListRaw);
        // return $recomenatsListArray;

        $recomendados = ContingutModel::
        whereIn("tags.nombre",$recomenatsListArray)
        ->join("contingut_tag","contingut_tag.id_contingut","=","id")
        ->join("tags","tags.id","=","contingut_tag.id_tag")
        ->limit(30,$offset)
        ->get();
        return $recomendados;
        // return view('front.recomendados')->with('info',$info);
    }

    public function getDestacados() {

        $limit=ContingutModel::all()->count();

        $limit = ceil($limit/10);

        $contingut=DB::table('contingut')
        ->select('contingut.id','portada', 'link_copyright', 'url', 'descripcio', 'majoria_edat', 'reportat', 'users.name as propietario', 'tipus_contingut', 'drets_autor','estadistiques_contingut.q_likes as likes', 'contingut.created_at')
        ->join('users','users.id','=','contingut.propietari')
        ->join('estadistiques_contingut','contingut.estadistica',"=",'estadistiques_contingut.id_estadistica')
        ->orderBy('likes','desc')
        ->limit($limit)
        ->get();
        return view('front.destacados')->with('contingut',$contingut);
    }

    public function buscador() {

        $resultados=[];
        $users=User::get(['id','name']);
        $cont=ContingutModel::whereNotNull('titulo')->get(['id','titulo']);

        $tags=TagsModel::get(['id',"nombre"]);

        array_push($resultados,$users);
        array_push($resultados,$cont);
        array_push($resultados,$tags);
        return $resultados;
    }

    public function store(Request $request) {

        $typeContent=$request->input('tipoC');
        $titulo=$request->input('titol');
        $tags = explode(",",$request->input('tags'));
        $rights=$request->input('derechoA');
        $linkCopy=$request->input('linkCopy');
        $desc=$request->input('desc');
        $portada=$request->input('portada');
        $overAge=($request->input('ageRestrict')=="on") ? 1 : 0;
        $pId=Auth::user()->id;
        $id_contingut=DB::table('contingut')->max('id');

        // Validaciones
        $info=TipoContenidoModel::find($typeContent);
        $info->Descripcio=explode(' ',$info->Descripcio);
        $info->Descripcio=implode(',',$info->Descripcio);
        // return $info->espai;

        $request->validate([
            'arxiu'=>"required|mimes:$info->Descripcio|max:$info->espai",
            'derechoA'=>"required",
            'tipoC'=>"required"
        ]);

        $url=public_path('/contenido/'.$typeContent);
        // Mueve las imagenes a su directorio conveniente
        if($request->hasFile('portada')) {
            $portada=time().'-'.Auth::user()->name.'.'.$request->portada->extension();
            $request->portada->move(public_path('/contenido/1'),$portada);
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

            if(!empty($tags)) {

                foreach($tags as $t) {
                    $exists=TagsModel::where('nombre',"=",$t)->first();
                    if(!$exists) {
                        $tag=TagsModel::create([
                            "nombre"=>trim(strtolower($t))
                        ]);
                        ContingutTagModel::create([
                            "id_contingut"=>$id_contingut+1,
                            "id_tag"=>$tag->id
                        ]);
                    }else {
                        ContingutTagModel::create([
                            "id_contingut"=>$id_contingut+1,
                            "id_tag"=>$exists->id
                        ]);
                    }
                }

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

}
