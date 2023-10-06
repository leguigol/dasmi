<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Centro;
use Illuminate\Http\Request;

class CentrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.centros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.centros.create');
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
            'centro_nombre' => 'required',
            'centro_domicilio' => 'required',
            'centro_nro' => 'required',
            'centro_localidad' => 'required',
            'centro_telefono' => 'required',
            'centro_responsable' => 'required'
        ]);

        $centro=new Centro;
        $centro->centro_nombre=$request->centro_nombre;
        $centro->centro_domicilio=$request->centro_domicilio;
        $centro->centro_nro=$request->centro_nro;
        $centro->centro_localidad=$request->centro_localidad;
        $centro->centro_telefono=$request->centro_telefono;
        $centro->centro_responsable=$request->centro_responsable;
        $centro->save();
        
        return redirect()->route('admin.centros.index')->with('info', 'Alta Correcta');

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
        $centro=Centro::find($id);
        return view('admin.centros.edit', compact('centro'));
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
        $request->validate([
            'centro_nombre' => 'required',
            'centro_domicilio' => 'required',
            'centro_nro' => 'required',
            'centro_localidad' => 'required',
            'centro_telefono' => 'required',
            'centro_responsable' => 'required'
        ]);

        $centro=Centro::find($id);

        $centro->centro_nombre=$request->centro_nombre;
        $centro->centro_domicilio=$request->centro_domicilio;
        $centro->centro_nro=$request->centro_nro;
        $centro->centro_localidad=$request->centro_localidad;
        $centro->centro_telefono=$request->centro_telefono;
        $centro->centro_responsable=$request->centro_responsable;

        $centro->save();

        return redirect()->route('admin.centros.index')->with('info', 'Se actualizo correctamente la informacion');;
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
