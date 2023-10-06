<?php

namespace App\Http\Controllers;

use App\Models\practica;
use Illuminate\Http\Request;

class PracticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.nomenclador.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nomenclador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'practica_codigo' => 'required|unique:practicas,codigo',            
            'practica_descrip' => 'required',
            'tipo' => 'required',
            'auto' => 'required'
        ]);

        $practica=new practica();

        $practica->codigo=$request->practica_codigo;
        $practica->descripcion=$request->practica_descrip;
        $practica->tipo=$request->tipo;
        $practica->auto=$request->auto;

        $practica->save();

        return view('admin.nomenclador.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $practica=practica::find($id);

        return view('admin.nomenclador.edit', compact('practica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function edit(practica $practica)
    {
        return view('admin.nomenclador.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'practica_descrip' => 'required',
            'tipo' => 'required',
            'auto' => 'required'
        ]);

        $practica=Practica::find($id);

        $practica->descripcion=$request->practica_descrip;
        $practica->tipo=$request->tipo;
        $practica->auto=$request->auto;

        $practica->save();


        return view('admin.nomenclador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function destroy(practica $practica)
    {
        //
    }
}
