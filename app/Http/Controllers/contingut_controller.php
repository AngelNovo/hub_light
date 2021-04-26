<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contingut_controller extends Controller
{
    public function get_all() {
        $results = DB::table('contingut')->get();

    }
}
