<?php

namespace App\Http\Controllers;

use App\Models\vacuna;
use App\Models\padrone;
use App\Models\VacunasPaciente;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class VacunaController extends Controller
{
    public function create($id){

        $vacunas=vacuna::all();
        $padron=padrone::find($id);
        return view('vacunas.create',compact('vacunas','padron'));
    }
    public function index(){
        return view('vacunas.index');
    }
    public function store(Request $request){
        
        //return $request;     
        $id=$request->id;   
        VacunasPaciente::where('padron_id', $id)->delete();

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'opcion_') === 0 && $value) {
                $id_vacuna = substr($key, 7); 
                if ($value==null){
                    $value='N';
                }
                echo $value;
                $vacuna=new VacunasPaciente();
                $vacuna->vacuna_id=$id_vacuna;
                $vacuna->vacuna_value=$value;
                $vacuna->padron_id=$id;
                $vacuna->medico_id=Auth::user()->id;
                $vacuna->centro_id=Auth::user()->centro->id;        
                $vacuna->save();
            }
        }
        
        return redirect()->route('hc.principal', $id);

    }
}
