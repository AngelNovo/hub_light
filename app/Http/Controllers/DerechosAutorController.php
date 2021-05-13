<?php

namespace App\Http\Controllers;

use App\Models\DerechosAutorModel;
use Illuminate\Http\Request;

class DerechosAutorController extends Controller
{
    public function getAll() {
        $derechos = DerechosAutorModel::all();
        return $derechos;
    }
}
