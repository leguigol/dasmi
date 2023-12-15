<?php

namespace App\Http\Controllers;

use App\Models\Padrone;


use Illuminate\Http\Request;

class CrecimientoController extends Controller
{
    public function index($id){

        $padron=Padrone::find($id)->first();
        return view('crecimiento.index',compact('padron'));
    }
}
