<?php

namespace App\Http\Controllers;

use App\Models\AnalitiquesGeneralsModel;
use App\Models\AvisModel;
use App\Models\AvisUsuariModel;
use App\Models\ContingutModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function updateAnalytics($aux){
        $actius = DB::table('analitiques_generals')->max('id');
        $analitiques = AnalitiquesGeneralsModel::find($actius);
        if($aux==0) {
            $aux2 = AnalitiquesGeneralsModel::where('id',$actius)
            ->update([
                "usuaris_actius"=>$analitiques->usuaris_actius+1,
                "usuaris_suspes"=>$analitiques->usuaris_suspes-1
            ]);
        }else if($aux==1) {
            $aux2 = AnalitiquesGeneralsModel::where('id',$actius)
            ->update([
                "usuaris_actius"=>$analitiques->usuaris_actius-1,
                "usuaris_suspes"=>$analitiques->usuaris_suspes+1
            ]);
        }else if($aux==2) {
            $aux2 = AnalitiquesGeneralsModel::where('id',$actius)
            ->update([
                "usuaris_enperill"=>$analitiques->usuaris_enperill+1,
                "usuaris_actius"=>$analitiques->usuaris_actius-1
            ]);
        }else if($aux ==3 ) {
            $aux2 = AnalitiquesGeneralsModel::where('id',$actius)
            ->update([
                "usuaris_enperill"=>$analitiques->usuaris_enperill-1,
                "usuaris_actius"=>$analitiques->usuaris_actius+1
            ]);
        }else {
            $aux2 = AnalitiquesGeneralsModel::where('id',$actius)
            ->update([
                "usuaris_enperill"=>$analitiques->usuaris_enperill-1,
                "usuaris_suspes"=>$analitiques->usuaris_suspes+1
            ]);
        }
    }

    public function dashboard() {
        $content=AnalitiquesGeneralsModel::all();
        return view('back.dashboard')->with('content',$content);
    }

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
        ->where('suspes',0)
        ->get();
        $this->data = [
            "avis"=>$avis,
            "users"=>$users
        ];
        return view('back.notificacion')->with('users',$users)->with('data',$this->data);
    }

    public function getContent() {
        $content = ContingutModel::all();
        return view('back.adultify')->with('content',$content);
    }

    public function adultify(Request $request) {
        $id= $request->input('id');
        $val= $request->input('val');
        $content = ContingutModel::where('id',$id)
        ->update([
            'es_admin'=>$id,
            'tipus'=>$val
        ]);
        return 1;

    }

    public function getUsersNotifyList() {
        $avis = DB::table('avis_usuari')
        ->select("users.id as idUser","users.name as name","avis.explicacio as explicacio","avis_usuari.id as id")
        ->join("users","users.id","=","avis_usuari.id_usuari")
        ->join("avis","avis.id","=","avis_usuari.id_avis")
        ->where('acceptat',0)
        ->orderBy("avis_usuari.id","desc")
        ->get();

        return view('back.notifyList')->with('avis',$avis);
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

        $us =User::find($id);

        $nivell = ($aux==1) ? 0 : 10;
        $user = User::where('id',$id)
        ->update([
            'suspes'=>$aux,
            'nivell_gravetat'=>$nivell
        ]);
        if($us->nivell_gravetat<5 && $us->nivell_gravetat>0) {
                $this->updateAnalytics(3);
                $this->updateAnalytics($aux);
            return 1;
        }

        $this->updateAnalytics($aux);


        return 1;

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

    public function acceptNotify(Request $request) {
        $id = $request->id;

        $update = AvisUsuariModel::where('id',$id)
        ->update([
            "acceptat"=>1
        ]);

        $avisUsuari = AvisUsuariModel::find($id);
        $gravetat = AvisModel::find($avisUsuari->id_avis);
        $idUser = $avisUsuari->id_usuari;
        $gravetat = $gravetat->gravetat;

        $user = User::find($idUser);
        $userGrav = $user->nivell_gravetat;

       if($userGrav-$gravetat>0 && $userGrav-$gravetat<=10) {
            $update = User::where('id',$idUser)
            ->update([
                "nivell_gravetat"=>$userGrav-$gravetat
            ]);
            if($userGrav-$gravetat>0 && $userGrav-$gravetat<5) {
                if($userGrav-$gravetat<1) {
                    $this->updateAnalytics(4);
                    return 1;
                }
                $this->updateAnalytics(2);
            };
            return 1;
        }
        $update = User::where('id',$idUser)
        ->update([
            "suspes"=>1,
            "nivell_gravetat"=>0
        ]);
        $user = User::find($idUser);
        if($userGrav-$gravetat<1) {
            $this->updateAnalytics(4);
            return 1;
        }
        if($user->suspes===1) {
            $this->updateAnalytics(1);
        }
        return 1;

    }

    public function deleteNotifyFromList(Request $request) {

        $id = $request->input('id');

        $tipus =DB::table('avis_usuari')
        ->where('id',$id)
        ->delete();
        return true;
    }
}
