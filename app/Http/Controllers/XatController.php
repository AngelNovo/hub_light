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
        $missatges=MissatgeModel::where('id_xat',$idChat)->get();
        return $missatges;
    }
}
