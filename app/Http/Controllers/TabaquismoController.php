<?php

namespace App\Http\Controllers;

use App\Models\tabaquismo;
use Illuminate\Http\Request;

class TabaquismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            if($request->fuma=='S'){
                $request->validate([
                    'fuma' => 'required|in:S,N',
                    'input_desde' => 'required',
                    'input_canti' => 'required',
                    'input_minutos' => 'required',
                    'piensa' => 'required',
                ]);
            }else{
                $request->validate([
                    'fuma' => 'required|in:S,N',
                    'piensa' => 'required',
            ]);
        }
        
        $tabaco=new tabaquismo();
        $tabaco->padron_id=$request->id;
        $tabaco->fuma=$request->fuma;
        $tabaco->desdefuma=$request->input_desde;
        $tabaco->canti=$request->input_canti;
        if($request->nuncafumo==1){
            $tabaco->nunca=1;
        }else{
            $tabaco->nunca=0;
        }
        if($request->dejofumar==1){
            $tabaco->dejo=1;
        }else{
            $tabaco->dejo=0;
        }
        $tabaco->desdedejo=$request->desdecuando;
        $tabaco->minutos=$request->input_minutos;
        $tabaco->piensa=$request->piensa;
        $tabaco->save();

        return redirect()->route('hc.principal', $request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tabaquismo  $tabaquismo
     * @return \Illuminate\Http\Response
     */
    public function show(tabaquismo $tabaquismo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tabaquismo  $tabaquismo
     * @return \Illuminate\Http\Response
     */
    public function edit(tabaquismo $tabaquismo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tabaquismo  $tabaquismo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        if($request->fuma=='S'){
            $request->validate([
                'fuma' => 'required|in:S,N',
                'input_desde' => 'required',
                'input_canti' => 'required',
                'input_minutos' => 'required',
                'piensa' => 'required',
            ]);
        }else{
            $request->validate([
                'fuma' => 'required|in:S,N',
                'piensa' => 'required',
        ]);
        }

        $tabaco=tabaquismo::where('padron_id','=',$request->id)->first();

        $tabaco->fuma=$request->fuma;
        $tabaco->desdefuma=$request->input_desde;
        $tabaco->canti=$request->input_canti;
        if($request->nuncafumo=='on'){
            $tabaco->nunca=1;
        }else{
            $tabaco->nunca=0;
        }
        if($request->dejofumar=='on'){
            $tabaco->dejo=1;
        }else{
            $tabaco->dejo=0;
        }
        $tabaco->desdedejo=$request->desdecuando;
        $tabaco->minutos=$request->input_minutos;
        $tabaco->piensa=$request->piensa;
        $tabaco->save();

        return redirect()->route('hc.principal', $request->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tabaquismo  $tabaquismo
     * @return \Illuminate\Http\Response
     */
    public function destroy(tabaquismo $tabaquismo)
    {
        //
    }
}
