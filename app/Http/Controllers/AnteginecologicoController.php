<?php

namespace App\Http\Controllers;

use App\Models\Anteginecologico;
use Illuminate\Http\Request;

class AnteginecologicoController extends Controller
{
    public function store(Request $request){

        $gineco=new Anteginecologico();

        $gineco->padron_id=$request->id;
        $gineco->menarca=$request->menarca;
        $gineco->irs=$request->irs;
        $gineco->ritmo=$request->ritmo;
        $gineco->fum=$request->fum;
        $gineco->pap=$request->pap;
        $gineco->mx=$request->mx;
        $gineco->mac=$request->mac;
        $gineco->g=$request->g;
        $gineco->a=$request->a;
        $gineco->p=$request->p;
        $gineco->c=$request->c;

        $gineco->save();

        return redirect()->route('hc.principal', $request->id);

    }

    public function update(Request $request){

        $gineco=Anteginecologico::where('padron_id','=',$request->id)->first();

        $gineco->menarca=$request->menarca;
        $gineco->irs=$request->irs;
        $gineco->ritmo=$request->ritmo;
        $gineco->fum=$request->fum;
        $gineco->pap=$request->pap;
        $gineco->mx=$request->mx;
        $gineco->mac=$request->mac;
        $gineco->g=$request->g;
        $gineco->a=$request->a;
        $gineco->p=$request->p;
        $gineco->c=$request->c;
        $gineco->save();

        return redirect()->route('hc.principal', $request->id);


    }
}
