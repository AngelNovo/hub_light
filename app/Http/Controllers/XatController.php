<?php

namespace App\Http\Controllers;

use App\Models\AnalitiquesGeneralsModel;
use App\Models\ContingutModel;
use App\Models\MissatgeModel;
use App\Models\SeguidorsModel;
use App\Models\XatModel;
use App\Models\XatUsuarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class XatController extends Controller
{
    public function getChatsUser()
    {
        $xatUsers = XatUsuarisModel::where('xat_usuaris.id_usuari', Auth::user()->id)
            ->join('users', 'users.id', "=", "xat_usuaris.id_usuari")
            ->join('xat', 'xat.id', "=", "xat_usuaris.id_xat")
            ->select("users.foto", "xat_usuaris.id_usuari", "xat_usuaris.id_xat", 'xat.nom as nom_xat')
            ->get();

        foreach ($xatUsers as $x) {
            $x->integrantes = XatUsuarisModel::where('xat_usuaris.id_xat', $x->id_xat)
                ->join('users', 'users.id', '=', 'xat_usuaris.id_usuari')
                ->select("xat_usuaris.id_usuari", "users.foto", "users.name")
                ->get();

            $lastMessage = MissatgeModel::where('id_xat', $x->id_xat)->latest()->first("missatge");
            // $lastMessage=$lastMessage[sizeof($lastMessage)-1];
            $x->last_message = $lastMessage;
        }

        return $xatUsers;
    }

    public function getAmigos()
    {
        $usuarioActivo = Auth::user();
        $amigos = SeguidorsModel::whereRaw("(id_usuari = $usuarioActivo or id_seguit = $usuarioActivo) and  acceptat=1")
            ->join('users as u1', 'u1.id', '=', 'seguidors.id_usuari')
            ->join('users as u2', 'u2.id', '=', 'seguidors.id_seguit')
            // ->select("u1.id","u1.name")
            ->select("u1.name as nombre", "u2.name as nombre2")
            ->get();
        $aux = [];
        return $amigos;
        foreach ($amigos as $a) {
            if ($a->id_usuari != $usuarioActivo->id) {
                $auxObj["id_user"] = $a->id_usuari;

                $auxObj["name"] = $a->nombre;

                $aux[] = $auxObj;
            } else {
                $auxObj["id_user"] = $a->id_seguit;

                $auxObj["name"] = $a->nombre2;

                $aux[] = $auxObj;
            }
        }
        return $aux;
    }

    public function getAmigosNotChat(Request $request)
    {
        $usersChat = XatUsuarisModel::where('id_xat', $request->input('id_xat'))->get();
        $aux = [];
        foreach ($usersChat as $u) {
            $aux[] = $u->id_usuari;
        }
        $usuarioActivo = Auth::user()->id;
        $amigos = SeguidorsModel::whereRaw("(id_usuari = $usuarioActivo or id_seguit = $usuarioActivo) and  acceptat=1")
            ->whereNotIn("id_usuari", $aux)
            ->join('users as u1', 'u1.id', '=', 'seguidors.id_usuari')
            ->get();
        // return $amigos;
        $aux = [];
        foreach ($amigos as $a) {
            if ($a->id_usuari != $usuarioActivo) {
                $auxObj["id_user"] = $a->id_usuari;
                $auxObj["name"] = $a->name;
                $aux[] = $auxObj;
            } else {
                $auxObj["id_user"] = $a->id_seguit;
                $auxObj["name"] = $a->name;
                $aux[] = $auxObj;
            }
        }
        return $aux;
    }

    public function getMissatges($idChat)
    {
        $missatges = MissatgeModel::whereRaw("missatge.id_xat = $idChat and missatge.id > xat_usuaris.lastseen and xat_usuaris.id_usuari=" . Auth::user()->id)
            ->join("users", "users.id", "=", "missatge.id_usuari")
            ->join("xat", "xat.id", "=", "missatge.id_xat")
            ->join("xat_usuaris", "xat_usuaris.id_xat", "=", "xat.id")
            ->select('missatge.*', 'users.name', 'users.foto')
            ->orderBy("id", "desc")
            // ->groupBy("missatge.id")
            ->get();

        if (sizeof($missatges) == 0) {
            return [];
        }

        foreach ($missatges as $m) {
            if ($m->id_contingut != null) {
                $contingut = ContingutModel::where('id', $m->id_contingut)
                    ->select('portada', 'url', 'tipus_contingut')
                    ->get();
                $m->contingut = $contingut[0];
            }
        }

        $max = MissatgeModel::where('id_xat', $idChat)->latest('id')->first();
        $update = XatUsuarisModel::where(['id_usuari' => Auth::user()->id, 'id_xat' => $idChat])
            ->update([
                "lastseen" => $max->id
            ]);
        return $missatges;
    }

    public function getMissatgesAnteriores(Request $request)
    {
        $take = 10;
        $missatges = MissatgeModel::whereRaw("missatge.id_xat =  {$request->input('id_xat')} and missatge.id <= xat_usuaris.lastseen and xat_usuaris.id_usuari=" . Auth::user()->id)
            ->join("users", "users.id", "=", "missatge.id_usuari")
            ->join("xat", "xat.id", "=", "missatge.id_xat")
            ->join("xat_usuaris", "xat_usuaris.id_xat", "=", "xat.id")
            ->select('missatge.*', 'users.name', 'users.foto')
            ->take($take)
            ->skip($request->input('index') * $take)
            ->orderBy("id", "desc")
            ->get();


        if (sizeof($missatges) == 0) {
            return [];
        }

        foreach ($missatges as $m) {
            if ($m->id_contingut != null) {
                $contingut = ContingutModel::where('id', $m->id_contingut)
                    ->select('portada', 'url', 'tipus_contingut')
                    ->get();
                $m->contingut = $contingut[0];
            }
        }

        $max = MissatgeModel::where('id_xat', $request->input('id_xat'))->latest('id')->first();
        $update = XatUsuarisModel::where(['id_usuari' => Auth::user()->id, 'id_xat' => $request->input('id_xat')])
            ->update([
                "lastseen" => $max->id
            ]);
        return $missatges;
    }

    public function storeMissatge(Request $request)
    {
        $missatge = MissatgeModel::create([
            "missatge" => $request->input("missatge"),
            "id_xat" => $request->input("id_xat"),
            "id_usuari" => Auth::user()->id
        ]);

        $actius = DB::table('analitiques_generals')->max('id');
        $analitiques = AnalitiquesGeneralsModel::find($actius);
        $aux2 = AnalitiquesGeneralsModel::where('id', $actius)
            ->update([
                "missatges_totals" => $analitiques->missatges_totals + 1
            ]);

        return $missatge;
    }

    public function sendContent(Request $request)
    {
        $xats = $request->input("id_xat");
        foreach ($xats as $x) {
            $missatge = MissatgeModel::create([
                "id_usuari" => Auth::user()->id,
                "missatge" => "",
                "id_contingut" => $request->input('id_contingut'),
                "id_xat" => $x
            ]);
        }
        return $missatge;
    }

    public function createChat(Request $request)
    {
        $req = $request->input('users');
        $create = 0;
        foreach ($req as $r) {
            $create = XatUsuarisModel::create([
                "id_xat" => $request->input('id_xat'),
                "id_usuari" => $r,
                "lastseen" => 0
            ]);
        }
    }

    public function startChat(Request $request)
    {
        $req = $request->input('users');
        $create = 0;
        $xat = XatModel::create([
            "nom" => ($request->input('nom') == null) ? '' : $request->input('nom'),
            "url_foto" => ''
        ]);
        foreach ($req as $r) {
            $create = XatUsuarisModel::create([
                "id_xat" => $xat->id,
                "id_usuari" => $r,
                "lastseen" => 0
            ]);
        }
    }
}
