<?php

namespace App\Http\Controllers;

use App\Models\SeguidorsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguidorsController extends Controller
{
    public function store(Request $request) {
        $request=$request->all();
        $seguidors=SeguidorsModel::create([
            "id_usuari"=>Auth::user()->id,
            "id_seguit"
        ]);
    }
}
