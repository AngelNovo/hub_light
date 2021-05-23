<?php

namespace App\Http\Controllers;

use App\Models\MissatgeModel;
use App\Models\XatUsuarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XatController extends Controller
{
    public function getChatsUser($idUser) {
        $xatUsers=XatUsuarisModel::where('id_usuari',$idUser)->get();
        return $xatUsers;
    }

    public function getMissatges($idChat) {
        $missatges=MissatgeModel::where("missatge.id_xat", $idChat)
        ->join("users","users.id","=","missatge.id_usuari")
        ->join("xat","xat.id","=","missatge.id_xat")
        ->join("xat_usuaris","xat_usuaris.id_xat","=","xat.id")
        ->select('missatge.*','users.name','users.foto')
        ->orderBy("created_at","desc")
        ->limit(10)
        ->get();
        return $missatges;
    }

    public function storeMissatge(Request $request) {
        $missatge=MissatgeModel::create([
            "missatge"=>$request->input("missatge"),
            "id_xat"=>$request->input("id_xat"),
            "id_usuari"=>Auth::user()->id
        ]);
        return $missatge;
    }

    public function sendContent(Request $request) {
        $missatge=MissatgeModel::create([
            "id_usuari"=>Auth::user()->id,
            "id_contingut"=>$request->input('id_contingut'),
            "id_xat"=>$request->input("id_xat")
        ]);
        return $missatge;
    }
}
