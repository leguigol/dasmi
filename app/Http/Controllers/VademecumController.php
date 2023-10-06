<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Admin\Vademecum as AdminVademecum;
use App\Models\vademecum;
use Illuminate\Http\Request;

class VademecumController extends Controller
{
    public function index()
    {
        return view('admin.vademecum.index');
    }
    public function show($id)
    {
        $droga=Vademecum::find($id);

        return view('admin.vademecum.edit', compact('droga'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'droga_monodroga' => 'required',
            'droga_presentacion' => 'required',
            'droga_laboratorio' => 'required',
            'droga_accion' => 'required',
        ]);

        $droga=vademecum::find($id);

        $droga->monodroga=$request->droga_monodroga;
        $droga->presentacion=$request->droga_presentacion;
        $droga->laboratorio=$request->droga_laboratorio;
        $droga->accion=$request->droga_accion;

        $droga->save();

        return view('admin.vademecum.index');

    }
    public function create()
    {
        return view('admin.vademecum.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'droga_monodroga' => 'required',
            'droga_producto' => 'required',
            'droga_presentacion' => 'required',
            'droga_laboratorio' => 'required',
            'droga_accion' => 'required',
        ]);

        $droga=new vademecum();

        $droga->monodroga=$request->droga_monodroga;
        $droga->producto=$request->droga_producto;
        $droga->presentacion=$request->droga_presentacion;
        $droga->laboratorio=$request->droga_laboratorio;
        $droga->accion=$request->droga_accion;

        $droga->save();

        return view('admin.vademecum.index');

    }
    
}
