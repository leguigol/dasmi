<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\especialidade;
use App\Models\prestadore;
use Illuminate\Support\Facades\Auth;


class PrestadoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.prestadores.index');
    }
    public function create(){
        $especia=especialidade::all();
        return view('admin.prestadores.create',compact('especia'));
    }
    public function store(Request $request){
        $request->validate([
            'prestador_nombre' => 'required',
            'prestador_domicilio' => 'required',
            'prestador_localidad' => 'required',
            'prestador_especialidad' => 'required'
        ]);
        $presta=new prestadore();
        $presta->prestador_nombre=$request->prestador_nombre;
        $presta->domicilio=$request->prestador_domicilio;
        $presta->localidad=$request->prestador_localidad;
        $presta->especialidad_id=$request->prestador_especialidad;
        $presta->centro_id=Auth::user()->centro_id;
        $presta->save();

        return view('admin.prestadores.index');
    }
    public function show($id){
        $presta=prestadore::find($id);
        $especia=especialidade::all();
        return view('admin.prestadores.edit',compact('presta','especia'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'prestador_nombre' => 'required',
            'prestador_domicilio' => 'required',
            'prestador_localidad' => 'required',
            'prestador_especialidad' => 'required'
        ]);
        $presta=Prestadore::find($id);
        $presta->prestador_nombre=$request->prestador_nombre;
        $presta->domicilio=$request->prestador_domicilio;
        $presta->localidad=$request->prestador_localidad;
        $presta->especialidad_id=$request->prestador_especialidad;
        $presta->fecha_baja=$request->prestador_febaja;
        $presta->centro_id=Auth::user()->centro_id;

        $presta->save();

        return view('admin.prestadores.index');

    }
}
