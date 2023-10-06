<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Centro;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;


class MedicosController extends Controller
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
        return view('admin.medicos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicos.create');
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
            'medico_nombres' => 'required',
            'medico_apellido' => 'required',
            'medico_matricula' => 'required|numeric',
            'medico_especialidad' => 'required'
        ]);

        $medico=new Medico();
        $medico->medico_nombres=$request->medico_nombres;
        $medico->medico_apellido=$request->medico_apellido;
        $medico->medico_matricula=$request->medico_matricula;
        $medico->medico_especialidad=$request->medico_especialidad;
        $medico->medico_estado=$request->medico_estado;
        $medico->save();

        return redirect()->route('admin.medicos.index')->with('info', 'Alta de Medico ok');;

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
        $medico=Medico::find($id);
        return view('admin.medicos.edit',compact('medico'));
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
            'medico_nombres' => 'required',
            'medico_apellido' => 'required',
            'medico_matricula' => 'required|numeric',
            'medico_especialidad' => 'required'
        ]);
        $medico=Medico::find($id);
        $medico->medico_nombres=$request->medico_nombres;
        $medico->medico_apellido=$request->medico_apellido;
        $medico->medico_matricula=$request->medico_matricula;
        $medico->medico_especialidad=$request->medico_especialidad;
        $medico->medico_estado=$request->medico_estado;
        $medico->save();

        return redirect()->route('admin.medicos.index')->with('info', 'Se actualizo correctamente la informacion');
        
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
    public function asignar(Medico $medico){
        $centros=Centro::pluck('centro_nombre', 'id');
        return view('admin.medicos.asignar', compact('medico','centros'));
    }
    public function gcentro(Request $request, $id){
        $medico=Medico::find($id);
        $medico->centro_id=$request->id_centro;
        $medico->save();
        return view('admin.medicos.index');

    }
}
