<?php

namespace App\Http\Controllers;

use App\Models\Alcoholismo;
use App\Models\Antecedente;
use App\Models\Antefamiliare;
use App\Models\Anteginecologico;
use App\Models\droga;
use App\Models\Padrone;
use App\Models\tabaquismo;

class AntecedentesController extends Controller
{
    public function index($id)
    {

        $padron=Padrone::find($id);
        $tabaco=tabaquismo::where('padron_id','=',$id)->first();
        return view('antecedentes.index', compact('padron','tabaco'))->with('focus','tabaquismo');
    }
    public function checktabaco($id){
        $padron=Padrone::find($id);
        $tabaco=tabaquismo::where('padron_id','=',$id)->first();
        return view('antecedentes.index', compact('padron','tabaco'),['focus'=>'tabaquismo']);
    }
    public function checkalcohol($id){
        $padron=Padrone::find($id);
        $alcohol=alcoholismo::where('padron_id','=',$id)->first();
        return view('antecedentes.index', compact('padron','alcohol'),['focus'=>'alcoholismo']);

    }
    public function checkdroga($id){
        $padron=Padrone::find($id);
        $droga=droga::where('padron_id','=',$id)->first();
        return view('antecedentes.index', compact('padron','droga'),['focus'=>'droga']);

    }
    public function checkpersonal($id){
        $padron=Padrone::find($id);
        $personal=Antecedente::where('padron_id','=',$id)->first();
        return view('antecedentes.index', compact('padron','personal'),['focus'=>'personal']);

    }
    public function checkfamiliares($id){
        $padron=Padrone::find($id);
        $antefamiliares=Antefamiliare::where('padron_id','=',$id)->first();
        return view('antecedentes.index', compact('padron','antefamiliares'),['focus'=>'antefamiliares']);

    }
    public function checkgineco($id){
        $padron=Padrone::find($id);
        $anteginecologicos=Anteginecologico::where('padron_id','=',$id)->first();
        return view('antecedentes.index', compact('padron','anteginecologicos'),['focus'=>'anteginecologicos']);

    }

}
