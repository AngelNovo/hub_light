<?php

namespace App\Http\Controllers;

use App\Models\MissatgeModel;
use App\Models\SeguidorsModel;
use App\Models\XatUsuarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XatController extends Controller
{
    public function getChatsUser() {
        $xatUsers=XatUsuarisModel::where('xat_usuaris.id_usuari',Auth::user()->id)
        ->join('users','users.id',"=","xat_usuaris.id_usuari")
        ->join('xat','xat.id',"=","xat_usuaris.id_xat")
        ->select("users.foto","xat_usuaris.id_usuari","xat_usuaris.id_xat",'xat.nom as nom_xat')
        ->get();

        foreach($xatUsers as $x) {
            $x->integrantes=XatUsuarisModel::where('xat_usuaris.id_xat',$x->id_xat)
            ->join('users','users.id','=','xat_usuaris.id_usuari')
            ->select("xat_usuaris.id_usuari","users.foto","users.name")
            ->get();

            $lastMessage=MissatgeModel::where('id_xat',$x->id_xat)->latest()->first("missatge");
            // $lastMessage=$lastMessage[sizeof($lastMessage)-1];
            $x->last_message=$lastMessage;
        }

        return $xatUsers;
    }

    public function getAmigos() {
        $usuarioActivo=Auth::user()->id;
        $amigos=SeguidorsModel::whereRaw("id_usuari = $usuarioActivo or id_seguit = $usuarioActivo ")
        ->join('users as u1','u1.id','=','seguidors.id_usuari')
        ->join('users as u2','u2.id','=','seguidors.id_seguit')
        ->select()
        ->get();
        return $amigos;
    }

    public function getMissatges($idChat) {
        $missatges=MissatgeModel::where("missatge.id_xat", $idChat)
        ->join("users","users.id","=","missatge.id_usuari")
        ->join("xat","xat.id","=","missatge.id_xat")
        ->join("xat_usuaris","xat_usuaris.id_xat","=","xat.id")
        ->select('missatge.*','users.name','users.foto')
        ->orderBy("id","desc")
        ->limit(10)
        ->groupBy("missatge.id")
        ->get();

        $update=XatUsuarisModel::where(['id_usuari'=>Auth::user()->id,'id_xat'=>$idChat])
        ->update([
            "lastseen"=>$missatges[sizeof($missatges)-1]->id
        ]);
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

    public function createChat(Request $request) {
        $req=$request->input('users');
        $create=0;
        foreach($req as $r) {
            $create=XatUsuarisModel::create([
                "id_xat"=>$request->input('id_xat'),
                "id_usuari"=>$r->id_usuari,
                "lastseen"=>0
            ]);
        }
    }
}
