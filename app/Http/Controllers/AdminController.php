<?php

namespace App\Http\Controllers;

use App\Models\AvisModel;
use App\Models\AvisUsuariModel;
use App\Models\TipusUsuariModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminify() {
        $users = DB::table('users')
        ->select('id','name','es_admin')->get();

        return view('back.adminify')->with('users',$users);
    }

    public function getBlocked() {
        $users = DB::table('users')
        ->select('id','name','suspes')->get();
        return view('back.bloqueado')->with('users',$users);
    }

    public function getUsersNotify() {
        $avis = AvisModel::all();
        $users = DB::table('users')
        ->select('users.id','users.name')
        ->get();
        $this->data = [
            "avis"=>$avis,
            "users"=>$users
        ];
        // dd($this->data);
        return view('back.notificacion')->with('users',$users)->with('data',$this->data);
    }

    public function makeAdmin(Request $request) {
        $id = $request->input('id');
        $aux= $request->input('aux');
        $tipus = ($aux==0) ? 1 : 2 ;
        $user = User::where('id',$id)
        ->update([
            'es_admin'=>$aux,
            'tipus'=>$tipus
        ]);
        if($user) {
            return 1;
        }
        return 0;

    }

    public function blockUser(Request $request) {
        $id = $request->input('id');
        $aux= $request->input('aux');
        $user = User::where('id',$id)
        ->update([
            'suspes'=>$aux
        ]);
        if($user) {
            return 1;
        }
        return 0;

    }

    public function insertNotify(Request $request) {
        $usuari=$request->input('user');
        $avis=$request->input('avis');
        $avisUsuari = AvisUsuariModel::create([
            "id_usuari"=>$usuari,
            "id_avis"=>$avis
        ]);
        if($avisUsuari) {
            return 1;
        }
        return 0;
    }
}
