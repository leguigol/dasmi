<?php

namespace App\Http\Controllers;

use App\Models\Alcoholismo;
use Illuminate\Http\Request;

class AlcoholismoController extends Controller
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
        $alcohol=new Alcoholismo();
        $alcohol->padron_id=$request->id;
        if($request->inpbs=='S'){
            $alcohol->bebe=1;
        }else{
            $alcohol->bebe=0;
        }    
        if($request->cris=='S'){
            $alcohol->critica=1;
        }else{
            $alcohol->critica=0;
        }    
        if($request->tomas=='S'){
            $alcohol->tomaba=1;
        }else{
            $alcohol->tomaba=0;
        }    
        if($request->sins=='S'){
            $alcohol->ganas=1;
        }else{
            $alcohol->ganas=0;
        }    
        if($request->culs=='S'){
            $alcohol->culpable=1;
        }else{
            $alcohol->culpable=0;
        }    
        if($request->mas=='S'){
            $alcohol->mañana=1;
        }else{
            $alcohol->mañana=0;
        }    

        $alcohol->save();

        return redirect()->route('hc.principal', $request->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alcohol=alcoholismo::where('padron_id','=',$request->id)->first();

        if($request->inpbs=='S'){
            $alcohol->bebe=1;
        }else{
            $alcohol->bebe=0;
        }    
        if($request->cris=='S'){
            $alcohol->critica=1;
        }else{
            $alcohol->critica=0;
        }    
        if($request->tomas=='S'){
            $alcohol->tomaba=1;
        }else{
            $alcohol->tomaba=0;
        }    
        if($request->sins=='S'){
            $alcohol->ganas=1;
        }else{
            $alcohol->ganas=0;
        }    
        if($request->culs=='S'){
            $alcohol->culpable=1;
        }else{
            $alcohol->culpable=0;
        }    
        if($request->mas=='S'){
            $alcohol->mañana=1;
        }else{
            $alcohol->mañana=0;
        }    

        $alcohol->save();

        return redirect()->route('hc.principal', $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
