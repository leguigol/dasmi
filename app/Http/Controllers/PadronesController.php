<?php

namespace App\Http\Controllers;

use App\Exports\PadronesExport;
use App\Http\Requests\StorePadron;
use App\Imports\PadronImport;
use App\Models\Convenio;
use App\Models\padronauxiliar;
use App\Models\Padrone;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PadronesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        return view('padrones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convenios=Convenio::all();
        $planes=Plane::all();
        return view('padrones.create', compact('convenios','planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePadron $request)
    {
        $padron=new Padrone();
        $padron->afiliado=$request->padron_afiliado;
        $padron->apellido=strtoupper($request->padron_apellido);
        $padron->nombres=strtoupper($request->padron_nombres);
        $padron->documento=$request->padron_documento;
        $padron->cuil=$request->padron_cuil;
        $padron->added='S';
        $padron->alta=now();
        $padron->padron='F';
        $padron->estado='F';
        $padron->titular=$request->padron_titular;
        $padron->fechanac=$request->padron_fechanac;
        $padron->sexo=$request->padron_sexo;
        $padron->parentesco_id=$request->padron_parentesco;
        $padron->plan_id=$request->plan_convenio;
        $padron->convenio_id=$request->padron_convenio;
        $padron->centro_id=Auth::user()->centro_id;
        $padron->save();

        return view('padrones.index')->with('info', 'ALTA DE AFILIADO HECHA CORRECTAMENTE');

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

    public function importar(){
        return view('padrones.importar');
    }

    public function exportar(){
        return Excel::download(new PadronesExport, 'padron.xlsx');
    }
    public function procesarexcel(Request $request){

        ini_set('max_execution_time', 600);

        DB::table('padronauxiliars')->truncate();

        $file=$request->file('file');

        Excel::import(new PadronImport, $file);

        //apendiza los nuevos
        
        $padrons=DB::table('padronauxiliars')
        ->whereNotExists(function ($query){
            $query->select(DB::raw(1))
            ->from('padrones')
            ->whereColumn('padrones.documento','padronauxiliars.documento');
        })
        ->get();
        foreach($padrons as $pad){
            $padron=new Padrone();
            $padron->afiliado=$pad->afiliado;
            $padron->apellido=$pad->apellido;
            $padron->nombres=$pad->nombres;
            $padron->documento=$pad->documento;
            $padron->cuil=$pad->cuil;
            $padron->alta=$pad->alta;
            $padron->added='';
            $padron->padron=$pad->padron;
            $padron->zona=$pad->zona;
            $padron->titular=$pad->titular;
            $padron->fechanac=$pad->fechanac;
            $padron->sexo=$pad->sexo;
            $padron->parentesco_id=$pad->parentesco_id;
            $padron->estado='A';
            $padron->plan_id=$pad->plan_id;
            $padron->convenio_id=$pad->convenio_id;
            $padron->centro_id=$pad->centro_id;
            $padron->save();
        }
        $padrons=DB::table('padrones')
        ->whereNotExists(function ($query){
            $query->select(DB::raw(1))
            ->from('padronauxiliars')
            ->whereColumn('padrones.documento','padronauxiliars.documento');
        })
        ->get();
        foreach($padrons as $pad){
            $affected=Padrone::where('documento',$pad->documento)->update(['estado'=>'I','bajapadron'=>$request->date]);
        }    

        $padrons=DB::table('padronauxiliars')
        ->whereExists(function ($query){
            $query->select(DB::raw(1))
            ->from('padrones')
            ->whereColumn('padrones.documento','padronauxiliars.documento')
            ->where('padrones.estado','I');
        })
        ->get();
        foreach($padrons as $pad){
            $affected=Padrone::where('documento',$pad->documento)->update(['estado'=>'A','alta'=>$request->date]);
        }    
        return redirect(route('padrones.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
      * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convenios=Convenio::all();
        $padron=Padrone::find($id);
        $planes=Plane::all();
        return view('padrones.edit', compact('convenios','padron','planes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePadron $request, $id)
    {
        $padron=Padrone::find($id);
        $padron->afiliado=$request->padron_afiliado;
        $padron->apellido=strtoupper($request->padron_apellido);
        $padron->nombres=strtoupper($request->padron_nombres);
        $padron->documento=$request->padron_documento;
        $padron->cuil=$request->padron_cuil;
        $padron->added='S';
        $padron->alta=now();
        $padron->padron='F';
        $padron->titular=$request->padron_titular;
        $padron->fechanac=$request->padron_fechanac;
        $padron->sexo=$request->padron_sexo;
        $padron->parentesco_id=$request->padron_parentesco;
        $padron->plan_id=$request->plan_convenio;
        $padron->convenio_id=$request->padron_convenio;
        $padron->save();

        return view('padrones.index')->with('info', 'EDICION DE AFILIADO HECHA CORRECTAMENTE');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $padron=Padrone::find($id);
        $padron->delete();
        return view('padrones.index')->with('borrar','S');
        
    }
}
