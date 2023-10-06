<?php

namespace App\Http\Controllers;

use App\Models\horario_medico;
use App\Models\Medico;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Psy\Readline\Hoa\ConsoleOutput;

class HorarioController extends Controller
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
        $medicos=Medico::where('centro_id',Auth::user()->centro->id)->get();
        $horarios=horario_medico::where('medico_id',Auth::user()->centro->id)->get();
        return view('turnos.horario.create',compact('medicos','horarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request)
    {
        $request->validate([
            'hora_desde' => 'required|max:5|min:5',
            'hora_hasta' => 'required|max:5|min:5',
            'hora_int' => 'required|max:2|min:2'
        ]);
        $conta=count($request->dia);
        for($t=0;$t<$conta;$t++){
            $horario=new horario_medico();
            $horario->medico_id=$request->hora_medico;
            $horario->centro_id=Auth::user()->centro->id;
            $horario->dia=$request->dia[$t];
            $horario->desde=$request->horad[$t];
            $horario->hasta=$request->horah[$t];
            $horario->intervalo=$request->horaint[$t];
            $horario->save();        
        }

        return redirect()->route('dashboard');
        // return view('turnos.horario.create',compact('medicos','horarios'));

    }

    public function listar()
    {
        //$horarios=horario_medico::where('medico_id',Auth::user()->centro->id)->get();
        $horarios=horario_medico::all();
        return view('turnos.horario.listar',compact('horarios'));
    }
    /**
     * 
     */
    public function create()
    {
        $medicos=Medico::where('centro_id',Auth::user()->centro->id)->get();
        return view('horario.create', compact('medicos'));
    }

    public function dia()
    {
        $medicos=Medico::where('centro_id',Auth::user()->centro->id)->get();
        return view('turnos.horario.dia', compact('medicos'));
    }
    public function agregardia(Request $request)
    {
        $request->validate([
            'dia' => 'date|required',
            'hora_desde' => 'required|max:5|min:5',
            'hora_hasta' => 'required|max:5|min:5',
            'intervalo' => 'required|max:2|min:2'
        ]);

        $pfecha=$request->dia;

        $ano=substr($pfecha,0,4);
        $mes=substr($pfecha,5,2);
        $dia=substr($pfecha,8,2);

        $hini=$request->hora_desde;
        $hfin=$request->hora_hasta;
        $xint=$request->intervalo;
        $hora=substr(strval($hini),0,2);
        $min=substr(strval($hini),3,2);
        $hora2=substr(strval($hfin),0,2);
        $min2=substr(strval($hfin),3,2);
        $fechaaux=Carbon::create($ano,$mes,$dia);
        $fechaaux->setHour($hora);
        $fechaaux->setMinute($min);
        $fechaaux2=Carbon::create($ano,$mes,$dia);
        $fechaaux2->setHour($hora2);
        $fechaaux2->setMinute($min2);

        $copyaux=$fechaaux;
 
        $zano=$copyaux->year;
        $zmes=$copyaux->month;
        $zdia=$copyaux->day;
        $zhora=$copyaux->hour;
        $zmin=$copyaux->minute;
        $zhora2=$fechaaux2->hour;
        $zmin2=$fechaaux2->minute;

        $inter1=Carbon::create($zano,$zmes,$zdia,$zhora,$zmin);
        $inter2=Carbon::create($zano,$zmes,$zdia,$zhora2,$zmin2);
        $copia=$inter1;
        while($copia<=$inter2){

            $turno=New Turno();
            $turno->medico_id=$request->medico_id;
            $turno->centro_id=Auth::user()->centro->id;
            $turno->fechahora=$copia;
            $turno->save();
            $copia->addMinutes($xint);
        }

        return redirect()->route('turnos.xmedico');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $horario=horario_medico::find($id);
        $medicos=Medico::where('centro_id',Auth::user()->centro->id)->get();
        return view('turnos.horario.edit', compact('horario','medicos'));
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
            'hora_desde' => 'required|max:5|min:5',
            'hora_hasta' => 'required|max:5|min:5',
            'hora_int' => 'required|max:2|min:2'
        ]);
        $horario=horario_medico::find($id);
        $horario->medico_id=$request->hora_medico;
        $horario->dia=$request->hora_dia;
        $horario->desde=$request->hora_desde;
        $horario->intervalo=$request->hora_int;
        $horario->save();

        return redirect()->route('horario.listar')->with('info', 'MODIFICACION DE HORARIO OK !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario=horario_medico::find($id);
        $horario->delete();

        return redirect()->route('horario.listar')->with('info', 'ELIMINACION DE HORARIO OK !');

    }
}
