<?php

namespace App\Http\Controllers;

use App\Models\tipus_usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tipus_usuari_controller extends Controller
{
    public function get_all() {
        $results = DB::table('tipus_usuari')->get();
        dd($results);
    }

    public function store(Request $request) {
        $request->validate([
            'tipus'=>'required'
        ]);
        $tipus=tipus_usuari::create([
            'tipus'=>$request->input('tipus')
        ]);
        $aux = ["correcte"=>$request->tipus];
        return redirect('/')->with('resposta',$aux);
    }
}
