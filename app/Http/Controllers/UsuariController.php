<?php
//Pdsnfskdfkd
namespace App\Http\Controllers;

use App\Models\SeguidorsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsuariController extends Controller
{
    public function getAll() {
        $results = DB::table('users')->get();
        return $results;
    }
    public function get($id) {
        // Info de usuario
        $result = User::find($id);
        $resultAmistad=0;

        if(isset(Auth::user()->id)){
            $resultAmistad=SeguidorsModel::where('id_Usuari',Auth::user()->id)
            ->orWhere('id_usuari',$id)
            ->orWhere('id_seguit',$id)
            ->orWhere('id_seguit',Auth::user()->id)
            ->get();
        }

        return view('front.perfil')
            ->with('user',$result)
            ->with('amistad', (sizeof($resultAmistad)>0)?1:0);
    }

    public function opciones($id) {
        $result = User::find($id);
        return view('front.opciones')->with('user',$result);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function update(Request $request) {
        $usuari = User::where('id',Auth::user()->id)
        ->update([
            "name"=>$request["name"],
            "email"=>$request["email"],
            "password"=>md5($request["password"])
        ]);
    }
    public function updateFoto(Request $request) {
        $nombre=Auth::user()->foto;
        $request->validate([
            'foto'=>'required|mimes:jpg,png,jpeg,gif|max:1024'
        ]);

        if($nombre!=="avatar.jpg") {
            unlink(public_path("/images/perfil/usuarios/$nombre"));
        }

        $newImageName=time().'-'.Auth::user()->name.'.'.$request->foto->extension();

        $request->foto->move(public_path('/images/perfil/usuarios'),$newImageName);
        $usuari = User::where('id',Auth::user()->id)
        ->update([
            "foto"=>$newImageName
        ]);
        return redirect($request->ruta);
    }
    public function updatePerfil(Request $request) {

        $update=[];

        $nombre=Auth::user()->foto;
        $request->validate([
            'foto'=>'mimes:jpg,png,jpeg,gif|max:4096',
            'fondo'=>'mimes:jpg,png,jpeg,gif|max:4096'
        ]);
        // Foto perfil
        if(isset($request->foto)) {
            if($nombre!=="avatar.jpg") {
                unlink(public_path("/images/perfil/usuarios/$nombre"));
            }
            $avatar=time().'-'.Auth::user()->name.'.'.$request->foto->extension();
            $update["foto"]=$avatar;
            $request->foto->move(public_path('/images/perfil/usuarios'),$avatar);
        }
        // Fondo
        if(isset($request->fondo)) {
            if($nombre!=="fondoDefault.jpg") {
                unlink(public_path("/images/perfil/usuarios/fondo/".Auth::user()->fondo));
            }
            $fondo=time().'-'.Auth::user()->name.'.'.$request->fondo->extension();
            $update["fondo"]=$fondo;
            $request->fondo->move(public_path('/images/perfil/usuarios/fondo'),$fondo);
        }
        // Alies
        if(isset($request->alias)) {
            $alies=$request->alias;
            $update["alies"]=$alies;
        }
        // Update
        $usuari = User::where('id',Auth::user()->id)
        ->update($update);
        return redirect("/opciones/".Auth::user()->id);

    }
}
