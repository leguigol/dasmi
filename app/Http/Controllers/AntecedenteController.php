<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use Illuminate\Http\Request;

class AntecedenteController extends Controller
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

        $personal=new Antecedente();
        $personal->padron_id=$request->id;
        if($request->hta==null){
            $personal->hta=0;
        }else{
            $personal->hta=1;
        }
        if($request->acv==null){
            $personal->acv=0;
        }else{
            $personal->acv=1;
        }
        if($request->dbt==null){
            $personal->dbt=0;
        }else{
            $personal->dbt=1;
        }
        if($request->iam==null){
            $personal->am=0;
        }else{
            $personal->am=1;
        }
        if($request->tbc==null){
            $personal->tbc=0;
        }else{
            $personal->tbc=1;
        }
        if($request->hiv==null){
            $personal->hiv=0;
        }else{
            $personal->hiv=1;
        }
        if($request->asma==null){
            $personal->asma=0;
        }else{
            $personal->asma=1;
        }
        if($request->chagas==null){
            $personal->chagas=0;
        }else{
            $personal->chagas=1;
        }
       if($request->epoc==null){
            $personal->epoc=0;
        }else{
            $personal->epoc=1;
        }
        if($request->tumores==null){
            $personal->tumores=0;
        }else{
            $personal->tumores=1;
        }
        if($request->alergia==null){
            $personal->alergia=0;
        }else{
            $personal->alergia=1;
        }
        if($request->psiqui==null){
            $personal->psiquiatrico=0;
        }else{
            $personal->psiquiatrico=1;
        }
        if($request->reuma==null){
            $personal->reuma=0;
        }else{
            $personal->reuma=1;
        }
        if($request->neuro==null){
            $personal->neurologico=0;
        }else{
            $personal->neurologico=1;
        }
        if($request->ets==null){
            $personal->ets=0;
        }else{
            $personal->ets=1;
        }
        if($request->otros==null){
            $personal->otros=0;
        }else{
            $personal->otros=1;
        }
        if($request->chekss=='S'){
            $personal->relaciones=1;
        }else{
            $personal->relaciones=0;
        }
        if($request->chekms=='S'){
            $personal->alergiamedica=1;
        }else{
            $personal->alergiamedica=0;
        }
        $personal->cuales=$request->cuales;
        $personal->interna1=$request->inte1;
        $personal->interna2=$request->inte2;
        $personal->interna3=$request->inte3;

        $personal->save();

        return redirect()->route('hc.principal', $request->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function show(Antecedente $antecedente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function edit(Antecedente $antecedente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $personal=Antecedente::where('padron_id','=',$request->id)->first();

        if($request->hta==null){
            $personal->hta=0;
        }else{
            $personal->hta=1;
        }
        if($request->acv==null){
            $personal->acv=0;
        }else{
            $personal->acv=1;
        }
        if($request->dbt==null){
            $personal->dbt=0;
        }else{
            $personal->dbt=1;
        }
        if($request->iam==null){
            $personal->am=0;
        }else{
            $personal->am=1;
        }
        if($request->tbc==null){
            $personal->tbc=0;
        }else{
            $personal->tbc=1;
        }
        if($request->hiv==null){
            $personal->hiv=0;
        }else{
            $personal->hiv=1;
        }
        if($request->asma==null){
            $personal->asma=0;
        }else{
            $personal->asma=1;
        }
        if($request->chagas==null){
            $personal->chagas=0;
        }else{
            $personal->chagas=1;
        }
       if($request->epoc==null){
            $personal->epoc=0;
        }else{
            $personal->epoc=1;
        }
        if($request->tumores==null){
            $personal->tumores=0;
        }else{
            $personal->tumores=1;
        }
        if($request->alergia==null){
            $personal->alergia=0;
        }else{
            $personal->alergia=1;
        }
        if($request->psiqui==null){
            $personal->psiquiatrico=0;
        }else{
            $personal->psiquiatrico=1;
        }
        if($request->reuma==null){
            $personal->reuma=0;
        }else{
            $personal->reuma=1;
        }
        if($request->neuro==null){
            $personal->neurologico=0;
        }else{
            $personal->neurologico=1;
        }
        if($request->ets==null){
            $personal->ets=0;
        }else{
            $personal->ets=1;
        }
        if($request->otros==null){
            $personal->otros=0;
        }else{
            $personal->otros=1;
        }
        if($request->chekss=='S'){
            $personal->relaciones=1;
        }else{
            $personal->relaciones=0;
        }
        if($request->chekms=='S'){
            $personal->alergiamedica=1;
        }else{
            $personal->alergiamedica=0;
        }
        $personal->cuales=$request->cuales;
        $personal->interna1=$request->inte1;
        $personal->interna2=$request->inte2;
        $personal->interna3=$request->inte3;

        $personal->save();

        return redirect()->route('hc.principal', $request->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antecedente $antecedente)
    {
        //
    }
}
