<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $result = User::find($id);
        return view('front.perfil')->with('user',$result);
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

        $newImageName=time().'-'.$request->name.'.'.$request->foto->extension();

        $request->foto->move(public_path('/images/perfil/usuarios'),$newImageName);
        $usuari = User::where('id',Auth::user()->id)
        ->update([
            "foto"=>$newImageName
        ]);
        return redirect($request->ruta);
    }
    public function updatePerfil(Request $request) {
        $nombre=Auth::user()->foto;
        $request->validate([
            'foto'=>'required|mimes:jpg,png,jpeg,gif|max:1024',
            'fondo'=>'required|mimes:jpg,png,jpeg,gif|max:1024'
        ]);

        if($nombre!=="avatar.jpg") {
            unlink(public_path("/images/perfil/usuarios/$nombre"));
        }

        $newImageName=time().'-'.$request->name.'.'.$request->foto->extension();
        $request->foto->move(public_path('/images/perfil/usuarios'),$newImageName);

        $fondo = Auth::user()->fondo;
        if($fondo!=="fondoDefault.jpg") {
            unlink(public_path("/images/fondo/$fondo"));
        }

        $newImageName=time().'-'.$request->name.'.'.$request->fondo->extension();
        $request->fondo->move(public_path('/images/fondo'),$newImageName);

        $usuari = User::where('id',Auth::user()->id)
        ->update([
            "foto"=>$newImageName,
            "alias"=>$request->input('alias'),
            "fondo"=>$fondo
        ]);
        return redirect($request->ruta);
    }
}
