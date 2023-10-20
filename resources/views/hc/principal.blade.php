@extends('adminlte::page')

@section('title', 'DASMI')

@section('content_header')
<div class="row">
    <div class="col-md-2">                
        <h1>HISTORIA CLINICA</h1><span class="badge badge-success">Dr.{{ Auth::user()->name }}</span>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">INFORMACION DEL PACIENTE</h5>
                <div class="card-body">
                    <div class="row mt-n2">
                        <p>DOCUMENTO: </p>
                        <p>{{$padron->documento}}</p>
                    </div>        
                    <div class="row mt-n3">
                        <p>NOMBRE: </p>
                        <p>{{$padron->apellido . " ". $padron->nombres}}</p>
                    </div>        
                    <div class="row mt-n3">
                        <p>AFILIADO: </p>
                        <p>{{$padron->afiliado}}</p>
                    </div>        
                    <div class="row mt-n3">
                        <p id="edad">EDAD: </p>
                        <div class="invisible">
                            <input id="fechanac" value="{{$padron->fechanac}}"> 
                        </div>    
                    </div>        
                    <div class="row mt-n3">
                        <p>OBRA SOCIAL: </p>
                        <p>{{$padron->convenio->convenio_nombre}}</p>
                    </div>        
                </div>
            </div>        
        </div>    
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">ANTECEDENTES
                    <a href="{{route('antecedentes.index', $padron->id)}}" class="btn btn-sm btn-success float-right">ENTRAR</a>
                </h5>
                    <div class="card-body">
                        @if (isset($tabaco))
                            @if ($tabaco->fuma=='S')
                                <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checktabaco',$padron->id)}}">TABAQUISMO</a>
                            @endif
                        @endif
                        @if (isset($alcohol))
                            @if ($alcohol->bebe==1)
                                <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkalcohol',$padron->id)}}">ALCOHOL</a>
                            @endif
                        @endif
                        @if (isset($droga))
                            @if ($droga->droga==1)
                                <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkdroga',$padron->id)}}">DROGAS</a>
                            @endif
                        @endif
                        @if (isset($personal))
                            <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkpersonal',$padron->id)}}">ANTECEDENTES PERSONALES</a>
                        @endif
                        @if (isset($familiares))
                            <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkfamiliares',$padron->id)}}">ANTECEDENTES FAMILIARES</a>
                        @endif
                        @if (isset($gineco))
                            <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkgineco',$padron->id)}}">ANTECEDENTES GINECOLOGICOS</a>
                        @endif
                    </div>
            </div>        
        </div>    
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">FACTORES DE RIESGO
                    <a href="{{route('factores.index', $padron->id)}}" class="btn btn-sm btn-success float-right">ENTRAR</a>
                </h5>
                <div class="card-body">
                    <h3>
                        @if (isset($factores))
                            
                            @if ($factores->hta==1)
                                <div class="btn btn-outline-danger">HTA</div>
                            @endif
                            @if ($factores->dbt==1)
                                <div class="btn btn-outline-danger">DBT</div>
                            @endif
                            @if ($factores->ob==1)
                                <div class="btn btn-outline-danger">OB</div>
                            @endif
                            @if ($factores->sbp==1)
                                <div class="btn btn-outline-danger">SBP</div>
                            @endif
                            @if ($factores->tbq==1)
                                <div class="btn btn-outline-danger">TBQ</div>
                            @endif
                            @if ($factores->emb==1)
                                <div class="btn btn-outline-danger">EMB</div>
                            @endif
                            @if ($factores->cns==1)
                                <div class="btn btn-outline-danger">CNS</div>
                            @endif
                            @if ($factores->dlp==1)
                                <div class="btn btn-outline-danger">DLP</div>
                            @endif
                            @if ($factores->pps==1)
                                <div class="btn btn-outline-danger">PPS</div>
                            @endif
                            @if ($factores->rcv1==1)
                                <div class="btn btn-outline-danger">RCV-10%</div>
                            @endif
                            @if ($factores->rcv2==1)
                                <div class="btn btn-outline-danger">RCV-10-20%</div>
                            @endif
                            @if ($factores->rcv3==1)
                                <div class="btn btn-outline-danger">RCV-20-30%</div>
                            @endif
                            @if ($factores->rcv4==1)
                                <div class="btn btn-outline-danger">RCV->30%</div>
                            @endif
                            @if ($factores->rcv5==1)
                                <div class="btn btn-outline-danger">RCV->40%</div>
                            @endif
                            @if ($factores->asma==1)
                                <div class="btn btn-outline-danger">ASMA</div>
                            @endif
                            @if ($factores->alergia==1)
                                <div class="btn btn-outline-danger">ALERGIA</div>
                            @endif
                            @if ($factores->anom==1)
                                <div class="btn btn-outline-danger">ANOMALIA CONGENITA</div>
                            @endif
                            @if ($factores->ear==1)
                                <div class="btn btn-outline-danger">EAR</div>
                            @endif
                            @if ($factores->pediatrico==1)
                                <div class="btn btn-outline-danger">PEDIATRICO</div>
                            @endif
                            @if ($factores->vih==1)
                                <div class="btn btn-outline-danger">VIH</div>
                            @endif
                            @if ($factores->hipert==1)
                                <div class="btn btn-outline-danger">HIPERT</div>
                            @endif
                            @if ($factores->hipot==1)
                                <div class="btn btn-outline-danger">HIPOT</div>
                            @endif
                        @endif
                    </h3>
                </div>
            </div>        
        </div>    

    </div>
    <div class="row">
        <div class="col-md-8">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">HISTORIA PERSONAL
                    <a href="{{route('hc.create', $padron->id)}}" class="btn btn-sm btn-danger float-right">NUEVA HC</a>
                    <a href="{{route('evolucion.showevos',$padron->id)}}" class="btn btn-sm btn-success float-right mx-1">VER EVOLUCIONES</a>
                </h5>
                <div class="card-body">
                    @foreach ($evoluciones as $evo)
                        @if (isset($evo->problema->first()->problema_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($evo->problema->first()->inicio)) .'-'.$evo->problema->first()->nomproblema->descripcion}} <br></a>    
                        @else
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($evo->fecha)).'-'.$evo->subjetivo}} <br></a> 
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">PLANES PREVIOS</h5>
                <div class="card-body">
                    @foreach ($procesoshc as $pro)
                        @if (isset($pro->proceso_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($pro->evolucion->fecha)).'-'.$pro->nomproceso->proceso}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    

    </div>
    <div class="row">
        <div class="col-md-12">                
            <div class="card">
                <h5 class="card-title bg-red text-white p-2">PENDIENTE</h5>
                <div class="card-body">
                    @foreach ($vacunas as $vacu)
                        @if (isset($vacu->pendiente))
                            <a href="{{route('hc.show',$evo->id)}}">{{$pen->pendiente}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
    </div>    
    <div class="row">
        <div class="col-md-6">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">MEDICAMENTOS</h5>
                <div class="card-body">
                    @foreach ($drogashc as $dro)
                        @if (isset($dro->medicamento_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($dro->evolucion->fecha)).'-'.$dro->nommedicamento->monodroga}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
        <div class="col-md-6">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">ESTUDIOS</h5>
                <div class="card-body">
                    @foreach ($practicashc as $pra)
                        @if (isset($pra->estudio_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($pra->evolucion->fecha)).'-'.$pra->nomestudio->descripcion}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
    </div>    
    <div class="row">
        <div class="col-md-12">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">ESQUEMA DE VACUNACION
                    <a href="{{route('vacunas.create', $padron->id)}}" class="btn btn-sm btn-danger float-right">ANOTAR</a>
                    <a href="{{ asset('images/calendario.pdf') }}" class="badge badge-success" target="_blank">Abrir Esquema</a>
                </h5>
                <div class="card-body">
                    @foreach ($vacunas as $vacu)
                        @if ($vacu->vacuna_value=='S')
                            <span class="badge badge-success">Edad:{{$vacu->nombreVacuna->edad}}-{{$vacu->nombreVacuna->vacuna}}</span>
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
    </div>    

    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function(){
        $fecha=document.getElementById('fechanac').value;
        $valor=document.getElementById('edad').innerHTML;
        $edad=calcularEdad();
        document.getElementById('edad').innerHTML=$valor+($edad).toString();
    });
    function calcularEdad() {
        fecha = document.querySelector("#fechanac").value;
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            // $('#edad').val(edad);        
            return edad;
    }
</script>    
@stop