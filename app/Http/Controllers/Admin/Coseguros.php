<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convenio;
use App\Models\coseguro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Coseguros extends Controller
{
    public function index(){
        return view('admin.coseguros.index');
    }

    public function create(){
        $convenios=Convenio::all();
        return view('admin.coseguros.create',compact('convenios'));
    }
    public function store(Request $request){

        $request->validate([
            'desde' => 'required|numeric',
            'hasta' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'coseguro' => 'required',
            'vigencia' => 'required',
        ]);


        $conve2=Coseguro::Where('convenio_id','=',$request->convenio)
        ->where(function($q) use ($request){
            $q->WhereBetween('pca_desde',[$request->desde,$request->hasta])
            ->orWhereBetween('pca_hasta',[$request->desde,$request->hasta]);
        })
        ->where('vigencia','>=',$request->vigencia)
        ->get();

        if(!$conve2->isEmpty()){
            $mensaje="ESOS COSEGUROS YA ESTAN CARGADOS";
            return back()->withErrors([$mensaje])->withInput();
        }
        $cose=new Coseguro();
        $cose->pca_desde=$request->desde;
        $cose->pca_hasta=$request->hasta;
        $cose->cantidad=$request->cantidad;
        $cose->convenio_id=$request->convenio;
        $cose->coseguro=$request->coseguro;
        $cose->vigencia=$request->vigencia;
        $cose->save();

        $convenios=Convenio::all();

        return view('admin.coseguros.index',compact('convenios'))->with('info','alta ok');

    }
    public function traerCoseguro(Request $request)
    {
        $valor=$request->input('practica');

        $cose=Coseguro::select('coseguro')
        ->where(function($q) use ($valor){
          $q->Where('pca_desde','<=', $valor)
            ->Where('pca_hasta','>=', $valor);
        })
        ->where('convenio_id',$request->input('convenio'))
        ->where('vigencia','>=',$request->input('vigencia'))
        ->first();
        return response()->json($cose);

    }
    

}
