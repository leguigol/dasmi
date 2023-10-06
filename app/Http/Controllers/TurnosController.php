<?php

namespace App\Http\Controllers;

use App\Models\horario_medico;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Padrone;
use App\Models\Turno;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class TurnosController extends Controller
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

        // $turnos=Turno::join('medicos','turnos.medico_id','=','medicos.id')
        // ->where('turnos.centro_id','=',Auth::user()->centro->id)
        // ->select('turnos.id','medico_apellido','fechahora')
        // ->get();
        $turnos=turno::join('medicos', 'turnos.medico_id', '=', 'medicos.id')
        ->select(DB::raw("DATE(fechahora) as fecha"),'medico_apellido', DB::raw('count(*) as turnos'))
        ->groupBy(DB::raw("DATE(fechahora)"),'medicos.medico_apellido')
        ->get();
        
        $events=array();        
        foreach($turnos as $turno){
            $events[]=[
                'id' => $turno->id,
                'medico_id' => $turno->medico_id,
                'title' => $turno->padron_id,
                'start' => $turno->fechahora,
                'end' => $turno->fechahora,
            ];    
        }
        return $events; 
        return view('turnos.index', ['events' => $events]);
    }    
    public function indexFecha()
    {
        return view('turnos.xfecha');
    }

    public function indexAfiliado()
    {
        return view('turnos.xafiliado');
    }

    public function listarFecha(Request $request)
    {
        $fecha=Carbon::parse($request->fecha);
        $ano=$fecha->year;
        $mes=$fecha->month;
        $dia=$fecha->day;

        $medicos=Medico::join('turnos','turnos.medico_id','=','medicos.id')
        ->select('medicos.id','medico_apellido', 'medico_nombres',DB::raw('count(*) as turnos'))
        ->where('turnos.padron_id','=',null)
        ->whereYear('turnos.fechahora',$ano)
        ->whereMonth('turnos.fechahora',$mes)
        ->whereDay('turnos.fechahora',$dia)
        ->distinct('medicos.id')
        ->groupBy('medicos.id','medicos.medico_apellido','medicos.medico_nombres')
        ->get();
        return view('turnos.listoxmedico', compact('medicos'));
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
        $turno=Turno::find($request->id);
        $turno->padron_id=$request->padronid;
        $turno->telefono=$request->telefono;
        $turno->observa=$request->observaciones;
        $turno->save();

        if($request->enfermeria=="SI"){
            $fechahora=$turno->fechahora;
        
            $nuevafecha1=Carbon::create($fechahora);
            $nuevafecha2=Carbon::create($fechahora);

            $nuevafecha1=$nuevafecha1->subMinutes(10);
            $nuevafecha2=$nuevafecha2->subMinute(1);
            
            $time1=$nuevafecha1->toDateTimeString();
            // $time2=$nuevafecha2->toDateTimeString();
            
            // $time1b=substr($time1,11,8);
            // $time2b=substr($time2,11,8);
            // //saco id de enfermeria
    
            $idenfe=Medico::where('medico_apellido','like','ENFER%')
            ->where('centro_id','=',Auth::user()->centro->id)
            ->select('id')
            ->first();
   
            $turenf=Turno::where('centro_id','=',Auth::user()->centro->id)->
                            where('medico_id','=',$idenfe->id)->
                            whereDate('fechahora','=',$nuevafecha1->format('Y-m-d'))->
                            whereTime('fechahora','=',$time1)->
                            get();    
            
            if($turenf->count()==0){
                return view('turnos.errores')->with('info','NO HAY AGENDA DE ENFERMERIA');
            }else{
                $firstenf=$turenf->first();
                $turenf2=Turno::find($firstenf->id);
                $turenf2->padron_id=$request->padronid;
                $turenf2->telefono=$request->telefono;
                $turenf2->observa=$request->observaciones;
                $turenf2->save();
            }    
        }    
        //Grabo enfermeria


        $turnos=Turno::join('medicos','turnos.medico_id','=','medicos.id')
        ->leftjoin('padrones','turnos.padron_id','=','padrones.id')
        ->where('turnos.centro_id','=',Auth::user()->centro->id)
        ->where('medico_id','=',$request->medicoid)
        ->select('turnos.id','turnos.centro_id','padron_id','medico_id','medico_apellido','fechahora','padrones.apellido','padrones.afiliado','padrones.nombres')
        ->get();
        $turnos2=$turnos->first();
        $events=array();        

        foreach($turnos as $turno){
            $color=null;
            if($turno->padron_id!=null){
                $color='#D15007';
            }
            if($turno->asistio!=null){
                $color='green';
            }
            $events[]=[
                'id' => $turno->id,
                'medico_id' => $turno->medico_id,
                'title' => $turno->apellido . ' ' . $turno->nombres,
                'start' => $turno->fechahora,
                'end' => $turno->fechahora,
                'color' => $color,
            ];    
        }
        return view('turnos.showxmedico', ['events' => $events])->with('medico',$turnos2->medico_apellido . " ". $turnos2->medico_nombres);
        
    }
    public function agendaBorrar(){
        $medicos=Medico::where('centro_id',Auth::user()->centro->id)->get();
        return view('turnos.agenda.borrar', compact('medicos'));
    }

    public function agendaDelete(Request $request){

        $fecha=$request->ano.'-'.$request->mes.'-1';
        $nfecha=new DateTime($fecha);
        $pfecha=$nfecha->format('Y-m-d');
        $ufecha=$nfecha->format('Y-m-t');

        $ano=substr($pfecha,0,4);
        $mes=substr($pfecha,5,2);
        $dia=substr($pfecha,8,2);

        $bano=substr($ufecha,0,4);
        $bmes=substr($ufecha,5,2);
        $bdia=substr($ufecha,8,2);

        $l1=date('y-m-d',strtotime($ano.'-'.$mes.'-'.$dia));
        $l2=date('y-m-d',strtotime($bano.'-'.$bmes.'-'.$bdia));
        $turnos=Turno::where('medico_id',$request->medico_id)
        ->whereBetween('fechahora',[$l1,$l2])
        ->where('disponible','=','N ')
        ->get();
        if($turnos->count()){
            return redirect()->route('agenda.borrar')->withErrors(['aviso'=>    'HAY TURNOS ASIGNADOS YA, VERIFIQUE !']);
        }
        
        DB::table('turnos')->where('medico_id',$request->medico_id)
            ->whereBetween('fechahora',[$l1,$l2])
                ->delete();
            return redirect()->route('agenda.index')->with('info','AGENDA BORRADA !');
    }

    public function agendaIndex(){
        $medicos=Medico::where('centro_id',Auth::user()->centro->id)->get();
        return view('turnos.agenda.index', compact('medicos'));

    }
    public function agendaStore(Request $request)
    {
        $horarios=horario_medico::where('medico_id',$request->medico_id)->get();
        $fecha=$request->ano.'-'.$request->mes.'-1';
        $nfecha=new DateTime($fecha);
        $pfecha=$nfecha->format('Y-m-d');
        $ufecha=$nfecha->format('Y-m-t');
        $uano=substr($ufecha,0,4);
        $umes=substr($ufecha,5,2);
        $udia=substr($ufecha,8,2);
        $fechaauxult=Carbon::create($uano,$umes,$udia);

        $ano=substr($pfecha,0,4);
        $mes=substr($pfecha,5,2);
        $dia=substr($pfecha,8,2);

        $bano=substr($ufecha,0,4);
        $bmes=substr($ufecha,5,2);
        $bdia=substr($ufecha,8,2);

        $l1=date('y-m-d',strtotime($ano.'-'.$mes.'-'.$dia));
        $l2=date('y-m-d',strtotime($bano.'-'.$bmes.'-'.$bdia));
        $turnos=Turno::where('medico_id',$request->medico_id)
        ->whereBetween('fechahora',[$l1,$l2])
        ->get();
        if($turnos->count()){
            return redirect()->route('agenda.index')->with('info','HORARIOS YA GENERADOS !');
        }

        foreach($horarios as $horario){
            switch($horario->dia){
                case 'LUNES':
                    $tdia=1;
                    break;
                case 'MARTES':
                    $tdia=2;
                    break;
                case 'MIERCOLES':
                    $tdia=3;
                    break;
                case 'JUEVES':
                    $tdia=4;
                    break;
                case 'VIERNES':
                    $tdia=5;
                    break;
            }
            // echo $horario->dia.'<br>';
            $hini=$horario->desde;
            $hfin=$horario->hasta;
            $xint=$horario->intervalo;

            $ano=substr($pfecha,0,4);
            $mes=substr($pfecha,5,2);
            $dia=substr($pfecha,8,2);
            $hora=substr(strval($hini),0,2);
            $min=substr(strval($hini),3,2);

            $bano=substr($ufecha,0,4);
            $bmes=substr($ufecha,5,2);
            $bdia=substr($ufecha,8,2);

            $hora2=substr(strval($hfin),0,2);
            $min2=substr(strval($hfin),3,2);
            $fechaaux=Carbon::create($ano,$mes,$dia);
            $fechaaux->setHour($hora);
            $fechaaux->setMinute($min);
            $fechaaux2=Carbon::create($ano,$mes,$dia);
            $fechaaux2->setHour($hora2);
            $fechaaux2->setMinute($min2);

            
            $copyaux=$fechaaux;
            while($copyaux<=$fechaauxult){

                    $dt=$copyaux->dayOfWeek;
                    // echo $copyaux->isoFormat('D/M/YYYY HH:mm').'-'.$dt.'-'.$tdia.'<br>';
                    if($tdia==$dt){
                        // echo 'im in...'.'<br>';
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
                            $turno->medico_id=$horario->medico_id;
                            $turno->centro_id=Auth::user()->centro->id;
                            $turno->fechahora=$copia;
                            $turno->save();

                            // echo "fecha:". $copia .'<br>';
                            $copia->addMinutes($xint);
                        }
                    }    
                $fechaaux->addDay(1);
                // if($fechaaux>$fechaauxult){
                //     // echo $fechaaux->isoFormat('D/M/YYYY HH:mm').'-'.$dt.'<br>';
                // }        
            }

        }
        return redirect()->route('agenda.index')->with('info','HORARIOS GENERADOS CORRECTAMENTE !');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                $turno=Turno::select('turnos.id','turnos.padron_id','turnos.medico_id','turnos.fechahora','turnos.telefono','turnos.observa','padrones.afiliado','padrones.apellido','padrones.nombres','padrones.documento','padrones.convenio_id','convenios.convenio_nombre')->leftJoin('padrones','turnos.padron_id','=','padrones.id')->leftjoin('convenios','padrones.convenio_id','=','convenios.id')
                ->where('turnos.id','=',$id)
                ->first();
        return view('turnos.show', compact('turno'));
    }
    public function show2($id)
    {
                $turno=Turno::select('turnos.id','turnos.padron_id','turnos.medico_id','turnos.fechahora','turnos.telefono','turnos.observa','padrones.afiliado','padrones.apellido','padrones.nombres','padrones.documento','padrones.convenio_id','convenios.convenio_nombre')->leftJoin('padrones','turnos.padron_id','=','padrones.id')->leftjoin('convenios','padrones.convenio_id','=','convenios.id')
                ->where('turnos.id','=',$id)
                ->first();
        return view('turnos.show', compact('turno'))->with('info','xafi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function traer($afiliado)
    {
        $padron=Padrone::select('id','afiliado','apellido','nombres','documento','fechanac','convenio_id')->with('convenio')->where('afiliado','=',$afiliado)->first();

        return response()->json([
            'padron' => $padron,
        ]);
    }
    public function listoxafiliado(Request $request)
    {
        
        // return $request;
        $padron=Padrone::find($request->id);
        $turnos=Turno::select('id','fechahora','asistio')->where('padron_id','=',$request->id)->get();
        return view('turnos.viewtxafiliado',compact('turnos','padron'))->with('info','afi');
    }
    public function edit($id)
    {
        $turno=Turno::find($id);
        if($turno){
            return response()->json([
                'status'=>200,
                'turnos'=>$turno,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'no se encontro el turno', 
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $turno=Turno::find($id);
        $turno->padron_id=null;
        $turno->telefono=null;
        $turno->observa=null;
        $turno->asistio=null;
        $turno->user_id=Auth::user()->id;
        $turno->save();

        $turnos=Turno::join('medicos','turnos.medico_id','=','medicos.id')
        ->leftjoin('padrones','turnos.padron_id','=','padrones.id')
        ->where('turnos.centro_id','=',Auth::user()->centro->id)
        ->where('medico_id','=',$turno->medico_id)
        ->select('turnos.id','turnos.centro_id','padron_id','medico_id','medico_apellido','fechahora','padrones.apellido','padrones.afiliado','padrones.nombres')
        ->get();
        $turnos2=$turnos->first();
        $events=array();        
        foreach($turnos as $turno){
            $color=null;
            if($turno->padron_id!=null){
                $color='#D15007';
            }
            if($turno->asistio!=null){
                $color='green';
            }
            $events[]=[
                'id' => $turno->id,
                'medico_id' => $turno->medico_id,
                'title' => $turno->apellido . ' ' . $turno->nombres,
                'start' => $turno->fechahora,
                'end' => $turno->fechahora,
                'color' => $color,
            ];    
        }
        return view('turnos.showxmedico', ['events' => $events])->with('medico',$turnos2->medico_apellido . " ". $turnos2->medico_nombres);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $turno=Turno::find($id);
        // if(!$turno){
        //     return response()->json([
        //         'error' => 'Unable to locate the event'
        //     ],404);
        // }
        // $turno->delete();
        // return $id;

    }
    public function confirmar($id,$medico){
        $turno=Turno::find($id);
        $turno->asistio='S';

        $turno->save();

        if($turno){
            return response()->json([
                'status'=>200,
                //'turnos'=>$turno,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'no se encontro el turno', 
            ]);
        }


    }
    public function indexMedico(){
        $medicos=Medico::where('centro_id','=',Auth::user()->centro->id)->where('medico_estado','=','A')->get();
        return view('turnos.xmedico',compact('medicos'));
    }
    public function sobreturno($mid,$fechahora){
        $nuevafecha1=Carbon::create($fechahora);

        // $nuevafecha2=Carbon::create($fechahora);

        // $nuevafecha1=$nuevafecha1->subMinutes(10);
        // $nuevafecha2=$nuevafecha2->subMinute(1);
        
        // $time1=$nuevafecha1->toDateTimeString();

        $nuevafecha1=$nuevafecha1->addMinute(1);

        $turno=new Turno();
        $turno->medico_id=$mid;
        $turno->centro_id=Auth::user()->centro->id;
        $turno->fechahora=$nuevafecha1->format('Y-m-d H:i:s');
        $turno->save();

        if($turno){
            return response()->json([
            'status'=>200,
            'turnos'=>$turno,
            'message'=>'SOBRETURNO OK',
        ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'ERROR EN SOBRETURNO', 
            ]);
        }

    } 
    public function eliminar($id){
        $turno=Turno::find($id);
        $turno->delete();

        return response()->json([
            'status'=>200,
            'message'=>'ELIMINACION OK',
        ]);

    }
    public function xmedicoStore(Request $req){
        $turnos=Turno::join('medicos','turnos.medico_id','=','medicos.id')
        ->leftjoin('padrones','turnos.padron_id','=','padrones.id')
        ->where('turnos.centro_id','=',Auth::user()->centro->id)
        ->where('medico_id','=',$req->medico)
        ->where('medicos.medico_estado','=','A')
        ->select('turnos.id','turnos.centro_id','padron_id','medico_id','medico_apellido','fechahora','padrones.apellido','padrones.afiliado','padrones.nombres','turnos.asistio')
        ->get();
        $turnos2=$turnos->first();
        if(!$turnos->count()){
            return view('turnos.xmedico')->with('info','No esta generada la agenda !');
        }
        $events=array();        
        foreach($turnos as $turno){
            $color=null;
            if($turno->padron_id!=null){
                $color='#D15007';
            }
            if($turno->asistio!=null){
                $color='green';
            }
            $events[]=[
                'id' => $turno->id,
                'medico_id' => $turno->medico_id,
                'title' => $turno->apellido . ' ' . $turno->nombres,
                'start' => $turno->fechahora,
                'end' => $turno->fechahora,
                'color' => $color,
            ];    
        }
        return view('turnos.showxmedico', ['events' => $events])->with('medico',$turnos2->medico_apellido . " ". $turnos2->medico_nombres);
        
    }
}
