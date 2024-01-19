<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Padrone;
use App\Models\Prestadore;
use App\Models\Internacione;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class InternacioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $internaciones=Internacione::all();
        return view('internaciones.index',compact('internaciones'));
    }
    public function indexAdmin()
    {
        $internaciones=Internacione::all();
        return view('internaciones.indexAdmin',compact('internaciones'));
    }
    public function create($id)
    {
        $padron=Padrone::find($id);
        $prestadores=Prestadore::all();

        return view('internaciones.create',compact('padron','prestadores'));
    }
    public function preview()
    {
        return view('internaciones.preview');
    }
    public function show($id)
    {
        $internacion=Internacione::find($id);
        $prestadores=Prestadore::all();
        $padron=Padrone::where('id',"=",$internacion->padron_id)->first();
        return view('internaciones.show',compact('internacion','padron','prestadores'));
    }
    public function destroy($id)
    {
        $internacion=Internacione::find($id);
        $internacion->delete();
        return view('internaciones.index')->with('borrar','S');
        
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'prestador' => 'required|not_in:Seleccione una opcion',
            'ingreso' => 'date',
            'hingreso' => 'date_format:H:i',
            'medico' => 'required',
            'tipoint' => 'required|not_in:Seleccione una opcion',
            'servicio' => 'required|not_in:Seleccione una opcion',
            'diagnostico' => 'required',

        ]);

        $internacion=Internacione::find($id);        
        $internacion->user_id = Auth::id();
        $internacion->centro_id = Auth::user()->centro->id;
        $internacion->prestador_id=$request->input('prestador');
        $internacion->padron_id = $request->input('id');
        $internacion->fechahora = Carbon::now(); 
        $internacion->fecha_ingreso = $request->input('ingreso');
        $internacion->hora_ingreso = $request->input('hingreso');
        $internacion->medico=$request->input('medico');
        $internacion->tipo_internacion = $request->input('tipoint');
        $internacion->servicio = $request->input('servicio');
        $internacion->diagnostico = $request->input('diagnostico');
        $internacion->observaciones = $request->input('observaciones');
    
        $internacion->save();        

        return redirect()->route('internaciones.index');

    }
    public function edit($id)
    {
        $internacion=Internacione::find($id);
        $prestadores=Prestadore::all();
        $padron=Padrone::where('id',"=",$internacion->padron_id)->first();

        return view('internaciones.edit',compact('internacion','prestadores','padron'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'prestador' => 'required|not_in:Seleccione una opcion',
            'ingreso' => 'date',
            'hingreso' => 'date_format:H:i',
            'medico' => 'required',
            'tipoint' => 'required|not_in:Seleccione una opcion',
            'servicio' => 'required|not_in:Seleccione una opcion',
            'diagnostico' => 'required',

        ]);

        $internacion=new Internacione();

        $internacion->user_id = Auth::id();
        $internacion->centro_id = Auth::user()->centro->id;
        $internacion->prestador_id=$request->input('prestador');
        $internacion->padron_id = $request->input('id');
        $internacion->fechahora = Carbon::now(); 
        $internacion->fecha_ingreso = $request->input('ingreso');
        $internacion->hora_ingreso = $request->input('hingreso');
        $internacion->medico=$request->input('medico');
        $internacion->tipo_internacion = $request->input('tipoint');
        $internacion->servicio = $request->input('servicio');
        $internacion->diagnostico = $request->input('diagnostico');
        $internacion->observaciones = $request->input('observaciones');
    
        $internacion->save();        

        return redirect()->route('internaciones.index');

    }

}
