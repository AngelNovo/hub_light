<?php

namespace App\Http\Controllers;

use App\Models\TipusUsuariModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipusUsuariController extends Controller
{
    public function getAll() {
        $results = DB::table('tipus_usuari')->get();
        return $results;
    }

    public function store(Request $request) {
        $request->validate([
            'tipus'=>'required'
        ]);
        $tipus=TipusUsuariModel::create([
            'tipus'=>$request->input('tipus')
        ]);
        $aux = ["correcte"=>$request->tipus];
        return redirect('/')->with('resposta',$aux);
    }
}
