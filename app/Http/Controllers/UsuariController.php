<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariController extends Controller
{
    public function getAll() {
        $results = DB::table('users')->get();
        return $results;
    }
    public function get($id) {
        $result = User::find($id);
        return $result;
    }
    public function getAdmin($id) {
        $result = User::find($id);
        return view('back.home')->with('user',$result);
    }
}
