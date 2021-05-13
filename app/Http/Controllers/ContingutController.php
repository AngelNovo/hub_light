<?php

namespace App\Http\Controllers;

use App\Models\ContingutModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContingutController extends Controller
{
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
        $request->validate([
            'portada'=>'mimes:jpg,png,jpeg,gif|max:4096',
            'arxiu'=>'required|mimes:jpg,png,jpeg,gif|max:10000',
            'file'=>"required",
            'derechoA'=>"required",
            'tipoC'=>"required"
        ]);

        $typeContent=$request->input('tipoC');
        $rights=(null!=$request->input('derechoA'))? $request->input('derechoA'):"";
        $linkCopy=(null!=$request->input('linkCopy')) ? $request->input('linkCopy') : "";
        $desc= (null!=$request->input('desc')) ? $request->input('desc') : "";
        $portada=$request->input('portada');
        $overAge=$request->input('ageRestrict');
        $file=$request->input('arxiu');
        $pId=Auth::user()->id;
        $titol=(null!=$request->input('titol')) ? $request->input('titol') : "";

        $url=public_path('/contenido/'.$typeContent);

        $archivo=time().'-'.Auth::user()->name.'.'.$file->extension();
        $file->move($url,$archivo);

        $subido=ContingutModel::create([
            'propietari'=>$pId,
            'titol'=>$titol,
            'drets_autor'=>$rights,
            'tipus_contingut'=>$typeContent,
            'link_copyright'=>$linkCopy,
            'descripcio'=>$desc,
            'majoria_edat'=>$overAge,
            'portada'=>$portada,
            'url'=>$archivo,
            'reportat'=>0
        ]);



    }

}
