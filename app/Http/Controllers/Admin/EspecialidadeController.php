<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    
    public function index(){
        return view('admin.especialidades.index');
    }
    public function create(){
        return view('admin.especialidades.create');
    }
    public function store(Request $request){
        $especia=new Especialidade();
        $especia->especialidad_nombre=$request->especialidad_nombre;
        $especia->save();

        return view('admin.especialidades.index');

    }
    public function edit($id){
        $especia=Especialidade::find($id);

        return view('admin.especialidades.edit',compact('especia'));
    }

    public function update(Request $request,$id){
        $especia=Especialidade::find($id);
        $especia->especialidad_nombre=$request->especialidad_nombre;
        $especia->save();
        
        return view('admin.especialidades.index');

    }
}
