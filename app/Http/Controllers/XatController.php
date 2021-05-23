<?php

namespace App\Http\Controllers;

use App\Models\MissatgeModel;
use App\Models\XatUsuarisModel;
use Illuminate\Http\Request;

class XatController extends Controller
{
    public function getChatsUser($idUser) {
        $xatUsers=XatUsuarisModel::where('id_usuari',$idUser)->get();
        return $xatUsers;
    }

    public function getMissatges($idChat) {
        $missatges=MissatgeModel::where(['missatge.id_xat',$idChat])
        ->join("users","users.id","=","missatge.id_usuari")
        ->join("xat_usuaris")
        ->select('missatge.*','users.name','users.foto')
        ->get();
        return $missatges;
    }

    public function storeMissatge(Request $request) {
        $missatge=MissatgeModel::create([
            "missatge"=>$request->input("missatge"),
            "id_xat"=>$request->input("id_xat"),
            "id_contingut"=>null,
        ]);
        return $missatge;
    }

    public function sendContent(Request $request) {
        $missatge=MissatgeModel::create([
            "missatge"=>null,
            "id_contingut"=>$request->input('id_contingut'),
            "id_xat"=>$request->input("id_xat")
        ]);
        return $missatge;
    }
}
