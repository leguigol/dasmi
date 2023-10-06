<?php

namespace App\Http\Controllers;

use App\Models\estudio;
use App\Models\Evolucione;
use App\Models\hcplane;
use App\Models\hcproblema;
use App\Models\medicamento;
use App\Models\Padrone;
use App\Models\pendiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EvolucioneController extends Controller
{
    public function store(Request $request)
    {
        //grabo primera parte

        $request->validate([
            'subjetivo' => 'required',
            'objetivo' => 'required',
        ]);

        $evo=new Evolucione();
        $evo->padron_id=$request->id;
        $evo->fecha=$request->fecha;
        $evo->subjetivo=$request->subjetivo;
        $evo->objetivo=$request->objetivo;
        $evo->medico_id=Auth::user()->id;
        $evo->centro_id=Auth::user()->centro->id;
        $evo->save();

        $numevo=Evolucione::latest()->first()->id;
        $padronid=$request->id;

        if($request->problema!='Seleccione una opcion'){
            $conta=count($request->problema);
            for($t=0;$t<$conta;$t++){
                // // $aux=$request->problemainicio[$t];
                // // $dia=substr($aux,0,2);
                // return $request->problemainicio[$t];
    
                $hcpro=new hcproblema();
                $hcpro->evolucion_id=$numevo;
                $hcpro->padron_id=$padronid;
                $hcpro->problema_id=$request->problemaid[$t];
                $hcpro->inicio=$request->problemainicio[$t];
                if(isset($request->problemares[$t])){
                    $hcpro->resolucion=$request->problemares[$t];
                }else{
                    $hcpro->resolucion=null;
                }
                $hcpro->save();    
                    // echo $request->problemaid[$t]."<br>";
            }        
        }

        if($request->proceso!='Seleccione una opcion'){
            $conta=count($request->procesoid);
            for($t=0;$t<$conta;$t++){
                $hcplan=new hcplane();
                $hcplan->evolucion_id=$numevo;
                $hcplan->padron_id=$padronid;
                $hcplan->detalle=$request->detalle;
                $hcplan->proceso_id=$request->procesoid[$t];
                $hcplan->problema_id=$request->problemaid[$t];
                $hcplan->save();
            }    
        }

        if($request->practicaid!=null){
            $conta=count($request->practicaid);
            for($t=0;$t<$conta;$t++){
                $estudio=new estudio();
                $estudio->evolucion_id=$numevo;
                $estudio->padron_id=$padronid;
                $estudio->estudio_id=$request->practicaid[$t];
                $estudio->fecha=$request->estudiofecha[$t];
                $estudio->save();
            }    
        }

        if($request->drogaid!=null){
            $conta=count($request->drogaid);
            for($t=0;$t<$conta;$t++){
                $droga=new medicamento();
                $droga->evolucion_id=$numevo;
                $droga->padron_id=$padronid;
                $droga->medicamento_id=$request->drogaid[$t];
                $droga->indicacion=$request->drogaindica[$t];
                $droga->fecha=$request->drogafecha[$t];
                if(isset($request->cronico[$t])){
                    $droga->cronico=1;
                }else{
                    $droga->cronico=0;
                }
                $droga->save();
            }    
        }    

        if($request->pendiente!=null){
            $pendiente=new pendiente();
            $pendiente->evolucion_id=$numevo;
            $pendiente->padron_id=$padronid;
            $pendiente->pendiente=$request->pendiente;
            $pendiente->save();
        }
        return redirect()->route('hc.principal', $request->id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'subjetivo' => 'required',
            'objetivo' => 'required',
        ]);

        $numevo=$request->id;

        $evo=Evolucione::find($numevo);
        $evo->subjetivo=$request->subjetivo;
        $evo->objetivo=$request->objetivo;
        // $evo->medico_id=Auth::user()->id;
        // $evo->centro_id=Auth::user()->centro->id;
        $evo->save();

        $padronid=$evo->padron_id;

        DB::table('hcproblemas')->where('evolucion_id',$numevo)->delete();

        if($request->problema!='Seleccione una opcion'){
            $conta=count($request->problema);
            for($t=0;$t<$conta;$t++){
                // // $aux=$request->problemainicio[$t];
                // // $dia=substr($aux,0,2);
                // return $request->problemainicio[$t];
    
                $hcpro=new hcproblema();
                $hcpro->evolucion_id=$numevo;
                $hcpro->padron_id=$padronid;
                $hcpro->problema_id=$request->problemaid[$t];
                $hcpro->inicio=$request->problemainicio[$t];
                if(isset($request->problemares[$t])){
                    $hcpro->resolucion=$request->problemares[$t];
                }else{
                    $hcpro->resolucion=null;
                }
                $hcpro->save();    
                    // echo $request->problemaid[$t]."<br>";
            }        
        }

        DB::table('hcplanes')->where('evolucion_id',$numevo)->delete();

        if($request->proceso!='Seleccione una opcion'){
            $conta=count($request->procesoid);
            for($t=0;$t<$conta;$t++){
                $hcplan=new hcplane();
                $hcplan->evolucion_id=$numevo;
                $hcplan->padron_id=$padronid;
                $hcplan->detalle=$request->detalle;
                $hcplan->proceso_id=$request->procesoid[$t];
                $hcplan->problema_id=$request->problemaid[$t];
                $hcplan->save();
            }    
        }

        DB::table('estudios')->where('evolucion_id',$numevo)->delete();

        if($request->practicaid!=null){
            $conta=count($request->practicaid);
            for($t=0;$t<$conta;$t++){
                $estudio=new estudio();
                $estudio->evolucion_id=$numevo;
                $estudio->padron_id=$padronid;
                $estudio->estudio_id=$request->practicaid[$t];
                $estudio->fecha=$request->estudiofecha[$t];
                $estudio->save();
            }    
        }

        DB::table('medicamentos')->where('evolucion_id',$numevo)->delete();

        if($request->drogaid!=null){
            $conta=count($request->drogaid);
            for($t=0;$t<$conta;$t++){
                $droga=new medicamento();
                $droga->evolucion_id=$numevo;
                $droga->padron_id=$padronid;
                $droga->medicamento_id=$request->drogaid[$t];
                $droga->indicacion=$request->drogaindica[$t];
                $droga->fecha=$request->drogafecha[$t];
                if(isset($request->cronico[$t])){
                    $droga->cronico=1;
                }else{
                    $droga->cronico=0;
                }
                $droga->save();
            }    
        }    

        $pendiente=Pendiente::where('evolucion_id',$numevo)->first();
        $pendiente->pendiente=$request->pendiente;
        $pendiente->save();

        return redirect()->route('hc.principal', $padronid);

    }
    public function showevos($id){
        
        $evos=Evolucione::where('padron_id','=',$id)->get();
        $padron=Padrone::find($id);
        return view('hc.showevos',compact('evos','padron'));

    }
}
