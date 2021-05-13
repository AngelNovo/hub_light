<?php

namespace App\Http\Controllers;

use App\Models\TipoContenidoModel;
use Illuminate\Http\Request;

class TipoContenidoController extends Controller
{
    public function getAll() {
        $tipoContenido = TipoContenidoModel::all();
        return $tipoContenido;
    }
}
