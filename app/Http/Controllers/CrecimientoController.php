<?php

namespace App\Http\Controllers;

use App\Models\Crecimiento;
use App\Models\Padrone;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CrecimientoController extends Controller
{
    public function index($id){

        $padron=Padrone::find($id)->first();
        $crecimiento=Crecimiento::where('padron_id','=',$id)->get();
        return view('crecimiento.index',compact('padron','crecimiento'));
    }

    public function create($id){
        $padron=Padrone::find($id)->first();
        return view('crecimiento.create',compact('padron'));        
    }

    public function store(Request $request){
        $request->validate([
            'fechanac' => 'required',
            'fechacon' => 'required',
            'sexo' => 'required|in:M,V',
            'estatura' => 'required',
            'valorestatura' => 'required',
            'peso' => 'required',
            'valorpeso' => 'required',
            'imc' => 'required'
        ]);

        $creci=new Crecimiento();
        $creci->padron_id=$request->id;
        $creci->fecha_consulta=$request->fechacon;
        $creci->fecha_nacimiento=$request->fechanac;
        $creci->sexo=$request->sexo;
        $creci->estatura=$request->estatura;
        $creci->z_estatura=$request->valorestatura;
        $creci->peso=$request->peso;
        $creci->z_peso=$request->valorpeso;
        $creci->imc=$request->imc;
        $creci->centro_id=Auth::user()->centro->id;
        $creci->user_id=Auth::user()->centro_id;
        $creci->save();

        return redirect()->route('hc.principal', $request->id);
    }
    public function destroy($id){
        $crecimiento=Crecimiento::find($id);
        $padron_id=$crecimiento->padron_id;
        $crecimiento->delete();
        $padron=Padrone::find($padron_id);
        $crecimiento=Crecimiento::where('padron_id','=',$padron_id)->get();

        return redirect()->route('crecimiento.index',$padron_id)->with('borrar','S');
    }
    public function edit($id){
        $crecimiento=Crecimiento::find($id);
        $padron_id=$crecimiento->padron_id;
        $padron=Padrone::find($padron_id);
        return view('crecimiento.edit',compact('crecimiento','padron'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'fechanac' => 'required',
            'fechacon' => 'required',
            'sexo' => 'required|in:M,V',
            'estatura' => 'required',
            'valorestatura' => 'required',
            'peso' => 'required',
            'valorpeso' => 'required',
            'imc' => 'required'
        ]);
        $creci=Crecimiento::find($id);
        $padron_id=$creci->padron_id;
        $creci->padron_id=$request->id;
        $creci->fecha_consulta=$request->fechacon;
        $creci->fecha_nacimiento=$request->fechanac;
        $creci->sexo=$request->sexo;
        $creci->estatura=$request->estatura;
        $creci->z_estatura=$request->valorestatura;
        $creci->peso=$request->peso;
        $creci->z_peso=$request->valorpeso;
        $creci->imc=$request->imc;
        $creci->centro_id=Auth::user()->centro->id;
        $creci->user_id=Auth::user()->centro_id;
        $creci->save();

        return redirect()->route('crecimiento.index',$padron_id)->with('modificar','S');

    }
}
