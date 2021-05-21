<?php

namespace App\Http\Controllers;

use App\Models\AvisUsuariModel;
use App\Models\InteraccioModel;
use App\Models\SeguidorsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguidorsController extends Controller
{
    public function store(Request $request) {
        $request=$request->all();
        $seguidors=SeguidorsModel::create([
            "id_usuari"=>Auth::user()->id,
            "id_seguit"=>$request["seguit"]
        ]);
    }

    public function edit(Request $request) {
        $request=$request->all();
        $seguidors=SeguidorsModel::where('id',$request["id"])
        ->update([
            "acceptat"=>1
        ]);
    }

    public function getNotificaciones() {
        $notificaciones=[];
        if(isset(Auth::user()->id)) {
            $seguidors=SeguidorsModel::where(['id_seguit'=>Auth::user()->id,"acceptat"=>0])->get();
            $interaccions=InteraccioModel::where(['visto'=>0,'contingut.propietari'=>Auth::user()->id])
            ->join("contingut","contingut.id","=","id_contingut")
            ->get();
            $avis_usuari=AvisUsuariModel::where(['id_usuari'=>Auth::user()->id,"acceptat"=>1])
            ->join("avis","avis.id","=","id_avis")
            ->get();
            array_push($notificaciones,$seguidors);
            array_push($notificaciones,$interaccions);
            array_push($notificaciones,$avis_usuari);
            return $notificaciones;
        }
    }
}
