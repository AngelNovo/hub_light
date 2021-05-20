<?php

namespace App\Http\Controllers;

use App\Models\ContingutTagModel;
use App\Models\TagsModel;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function getAll() {
        $tags = TagsModel::all();
        return $tags;
    }

    public function getTags() {
        $tags = TagsModel::all();
        return view('back.tags')->with('tags',$tags);
    }

    public function deleteTag(Request $request) {

        $tags =TagsModel::where("id",$request->input("id"))->delete();

        return 1;
    }

    public function storeTag(Request $request) {
        $newTag=TagsModel::create([
            'nombre'=>$request->input('nombre')
        ]);
        return redirect('/back/admin/tags');
    }
}
