<?php

namespace App\Http\Controllers;

use App\Models\SeguidorsModel;
use Illuminate\Http\Request;

class SeguidorsController extends Controller
{
    public function store(Request $request) {
        $request=$request->all();
        $seguidors=SeguidorsModel::create([

        ]);
    }
}
