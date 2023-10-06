<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorizacionRequest;
use App\Models\Auto_cab;
use App\Models\Auto_det;
use App\Models\Cateautori;
use App\Models\Medico;
use App\Models\Padrone;
use App\Models\practica;
use App\Models\prestadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutorizacioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $prestadores=prestadore::all();
        $padrones=Padrone::all();
        $afidata=Padrone::select('id','afiliado','apellido','nombres')->limit(10)->get();
        $etiquetas=Cateautori::all();
        return view('autorizaciones.create',compact('prestadores','padrones','afidata','etiquetas'));
    }
    public function store(AutorizacionRequest $request)
    {

        $practica = $request->input('practica');
        $cantidad = $request->input('cantidad');
        $coseguro = $request->input('coseguro');
        $auto=New Auto_cab();
        $auto->prestador_id=intval($request->prestador);
        $auto->afiliado_id=intval($request->afiliado);
        $auto->fechaprescrip=$request->fechaprescri;
        $auto->matricula=intval($request->matricula);
        $auto->medico=$request->medico;
        $auto->staff=$request->staff;
        $auto->diagnostico=$request->diagnostico;
        $auto->observaciones=$request->observaciones;
        if ($request->has('categorias')) {
            $auto->cateauto = intval($request->categorias);
        } else {
            $auto->cateauto = null;
        }
        $auto->coseguro=floatval($request->contador);
        $auto->centro_id=Auth::user()->centro->id;
        $auto->user_id=Auth::user()->centro_id;
        $auto->save();

        $clave=$auto->getKey();

        for($i=0;$i<count($practica);$i++){
            $autodet=New Auto_det();
            $autodet->autocab_id=$clave;
            $autodet->practica_id=intval($practica[$i]);
            $autodet->cantidad=intval($cantidad[$i]);
            $autodet->coseguro=intval($coseguro[$i]);
            $autodet->save();
        }

        Session()->flash('success','Autorizacion Nº: '.$clave.' grabada correctamente!');
        return redirect()->route('autorizaciones.create');

    }

    public function traerAfiliados(){


        $afidata=Padrone::select('id','afiliado','apellido','nombres')->where('apellido', 'LIKE', '%'. request()->get('q'). '%')->orWhere('afiliado','LIKE','%'. request()->get('q'). '%')->where('centro_id',Auth::user()->centro->id)->get();
        return response()->json($afidata);
    }

    public function buscaConvenio(Request $request){
        $convenio=Padrone::select('convenio_id')
        ->with('convenio')
        ->Where('id',$request->input('id'))
        ->get();

        $convenio = $convenio->map(function ($item) {
            $item->nombreConvenio = $item->convenio->convenio_nombre;
            unset($item->convenio); // Opcional: Elimina el objeto completo de la relación "convenio"
            return $item;
        });
        return response()->json($convenio);
    }

    public function traerPracticas(){


        $practi=practica::select('id','codigo','descripcion')->where('descripcion', 'LIKE', '%'. request()->get('q'). '%')
        ->orWhere('codigo', 'LIKE', '%'. request()->get('q'). '%')
        ->get();

        return response()->json($practi);
    }

    public function traerMedico(Request $request)
    {
        $valor=$request->input('valor');
        $afidata=Medico::select('id','medico_apellido','medico_nombres','medico_matricula')
        ->where('medico_matricula', $valor)
        ->where('centro_id',Auth::user()->centro->id)
        ->get();
        return response()->json($afidata);

    }
    public function traerCategoria(Request $request)
    {
        $valor=$request->input('valor');
        $cosecate=Cateautori::select('coseguro')->where('id',$valor)->first();
        return response()->json($cosecate);
    }

}
