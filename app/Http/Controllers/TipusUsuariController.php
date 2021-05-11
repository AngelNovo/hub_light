<?php

namespace App\Http\Controllers;

use App\Models\TipusUsuariModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipusUsuariController extends Controller
{
    public function getAll() {
        $types = DB::table('tipus_usuari')->get();
        return view('back.typeCrud')->with('types',$types);
    }

    public function store(Request $request) {
        $request->validate([
            'tipus'=>'required'
        ]);
        $tipus=TipusUsuariModel::create([
            'tipus'=>$request->input('tipus')
        ]);
        $aux = ["correcte"=>$request->tipus];
        return redirect('/back/admin/tipususer')->with('resposta',$aux);
    }

    public function delete(Request $request) {
        $id = $request->input("id");
        return $id;
    }
}
