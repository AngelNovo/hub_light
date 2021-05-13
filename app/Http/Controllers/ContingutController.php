<?php

namespace App\Http\Controllers;

use App\Models\ContingutModel;
use Illuminate\Http\Request;
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
        $typeContent=$request->input('tipoC');
        $rights=$request->input('derechoA');
        $linkCopy=$request->input('linkCopy');
        $desc=$request->input('desc');
        $portada=$request->input('portada');
        $overAge=$request->input('ageRestrict');
        $pId=$request->input('propietariId');
        $file=$request->input('arxiu');

    }
}
