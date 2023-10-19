<?php

namespace App\Http\Controllers;

use App\Models\vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    public function create(){

        $vacunas=vacuna::all();

        return view('vacunas.create',compact('vacunas'));
    }
    public function index(){
        return view('vacunas.index');
    }
}
