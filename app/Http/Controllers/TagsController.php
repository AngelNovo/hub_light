<?php

namespace App\Http\Controllers;

use App\Models\TagsModel;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function getAll() {
        $tags = TagsModel::all();
        return $tags;
    }
}
