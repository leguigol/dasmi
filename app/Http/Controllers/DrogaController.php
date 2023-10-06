<?php

namespace App\Http\Controllers;

use App\Models\droga;
use Illuminate\Http\Request;

class DrogaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drogas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->inpds=='S'){
            $request->validate([
                'input_cuales' => 'required',
            ]);
        }else{
            $request->validate([
                'inpds' => 'required|in:S,N'
            ]);
        }
        if($request->inp=='S'){
            $request->validate([
                'input_veces' => 'required',
            ]);
        }

        $droga=new droga();
        $droga->padron_id=$request->id;
        if($request->chekds=='S'){
            $droga->droga=1;
        }else{
            $droga->droga=0;
        }    
        if($request->chekins=='S'){
            $droga->inyecta=1;
        }else{
            $droga->inyecta=0;
        }
        $droga->cuales=$request->input_cuales;
        if($request->chekfis=='S'){
            $droga->fisica=1;
        }else{
            $droga->fisica=0;
        }
        $droga->veces=$request->input_veces;
        $droga->diuresis=$request->input_diuresis;
        $droga->catarsis=$request->input_catarsis;
        $droga->sueño=$request->input_sue;
        $droga->save();

        return redirect()->route('hc.principal', $request->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\droga  $droga
     * @return \Illuminate\Http\Response
     */
    public function show(droga $droga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\droga  $droga
     * @return \Illuminate\Http\Response
     */
    public function edit(droga $droga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\droga  $droga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        //return $request;

        if($request->inpds=='S' && $request->inpfis=='N'){
            $request->validate([
                'input_cuales' => 'required'
            ]);
        }
        if($request->inpds=='S' && $request->inpfis=='S'){
            $request->validate([
                'input_cuales' => 'required',
                'input_veces' => 'required'
            ]);
        }
        if($request->inpdn=='N' && $request->inpfis=='S'){
            $request->validate([
                'input_veces' => 'required'
            ]);
        }

        $droga=droga::where('padron_id','=',$request->id)->first();

        if($request->inpds=='S'){
            $droga->droga=1;
        }else{
            $droga->droga=0;
        }    
        if($request->inpins=='S'){
            $droga->inyecta=1;
        }else{
            $droga->inyecta=0;
        }    
        $droga->cuales=$request->input_cuales;
        if($request->inpfis=='S'){
            $droga->fisica=1;
        }else{
            $droga->fisica=0;
        }    
        $droga->cuales=$request->input_veces;
        $droga->diuresis=$request->input_diuresis;
        $droga->catarsis=$request->input_catarsis;
        $droga->sueño=$request->input_sue;


        $droga->save();

        return redirect()->route('hc.principal', $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\droga  $droga
     * @return \Illuminate\Http\Response
     */
    public function destroy(droga $droga)
    {
        //
    }
}
