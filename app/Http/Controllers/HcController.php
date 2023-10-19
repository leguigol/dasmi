<?php

namespace App\Http\Controllers;

use App\Models\Alcoholismo;
use App\Models\Antecedente;
use App\Models\Antefamiliare;
use App\Models\Anteginecologico;
use App\Models\ciap2;
use App\Models\droga;
use App\Models\estudio;
use App\Models\Evolucione;
use App\Models\Factore;
use App\Models\hcplane;
use App\Models\hcproblema;
use App\Models\medicamento;
use App\Models\Padrone;
use App\Models\pendiente;
use App\Models\practica;
use App\Models\proceso;
use App\Models\tabaquismo;
use App\Models\VacunasPaciente;
use App\Models\vademecum;
use Illuminate\Http\Request;



class HcController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('hc.index');
    }
    public function principal($id)
    {
        $padron=Padrone::find($id);
        $tabaco=tabaquismo::where('padron_id','=',$id)->first();
        $alcohol=Alcoholismo::where('padron_id','=',$id)->first();
        $droga=Droga::where('padron_id','=',$id)->first();
        $personal=Antecedente::where('padron_id','=',$id)->first();
        $familiares=Antefamiliare::where('padron_id','=',$id)->first();
        $gineco=Anteginecologico::where('padron_id','=',$id)->first();
        $factores=Factore::where('padron_id','=',$id)->first();
        $evoluciones=Evolucione::where('padron_id','=',$id)->get();
        $hcproblema=hcproblema::where('padron_id','=',$id)->get();
        $pendiente=pendiente::where('padron_id','=',$id)->get();
        $drogashc=medicamento::where('padron_id','=',$id)->get();
        $practicashc=estudio::where('padron_id','=',$id)->get();
        $procesoshc=hcplane::where('padron_id','=',$id)->get();
        $vacunas=VacunasPaciente::where('padron_id','=',$id)->get();

        return view('hc.principal',compact('padron','tabaco','alcohol','droga','personal','familiares','gineco','factores','evoluciones','hcproblema','pendiente','drogashc','practicashc','procesoshc','vacunas'));
    }

    public function create($id)
    {
        $padron=Padrone::find($id);
        $problemas=ciap2::all();
        $procesos=proceso::all();
        $practicas=practica::all();        
        $drogas=vademecum::all();
        return view('hc.create',compact('padron','problemas','procesos','practicas','drogas'));
    }
    public function show($id)
    {
        $evolucion=Evolucione::where('id','=',$id)->first();
        $pid=$evolucion->padron_id;
        $padron=Padrone::find($pid);
        $problemas=ciap2::all();
        $problemashc=hcproblema::where('evolucion_id','=',$id)->get();
        $procesos=proceso::all();
        $procesoshc=hcplane::where('evolucion_id','=',$id)->get();
        $practicas=practica::all();
        $practicashc=estudio::where('evolucion_id','=',$id)->get();
        $drogas=vademecum::all();
        $drogashc=medicamento::where('evolucion_id','=',$id)->get();
        $pendiente=pendiente::where('evolucion_id','=',$id)->first();
        return view('hc.show',compact('padron','evolucion','problemas','problemashc','procesos','procesoshc','practicas','practicashc','drogas','drogashc','pendiente'));

    }
}
