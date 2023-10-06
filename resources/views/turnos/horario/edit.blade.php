@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>EDICION DE HORARIOS</h1>
@stop

@section('content')
@if(!empty($info))
<div class="alert alert-success">
    <strong>{{$info}}</strong>
</div>
@endif
{!! Form::open(['route' => ['horario.update', $horario->id], 'method'=>'put']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Medico')!!}
                <select class="form-control" name="hora_medico" id="hora_medico">
                    @foreach ($medicos as $medico)
                        <option value="{{$medico->id}}" {{($medico->id==$horario->medico_id) ? 'SELECTED' : ''}}>{{$medico->medico_apellido . " ". $medico->medico_nombres}}</option>
                    @endforeach
                </select>    
            </div>    
            @error('hora_medico')
               <strong style="color:red">*{{$message}}</strong>
            @enderror

        </div>        
        <div class="row">
            <div class="col md-3">                
                {!! Form::label('Dia de Atencion')!!}
                <select class="form-control" name="hora_dia" id="hora_dia">
                        <option value="LUNES">LUNES</option>
                        <option value="MARTES">MARTES</option>
                        <option value="MIERCOLES">MIERCOLES</option>
                        <option value="JUEVES">JUEVES</option>
                        <option value="VIERNES">VIERNES</option>
                </select>    
            </div>     
            <div class="col md-3">                
                {!! Form::label('Desde Hora (formato hh:mm)')!!}
                <input type="text" id="hora_desde" name="hora_desde" class="form-control" value="{{$horario->desde}}" onchange="controlardesde(this)"/>
                @error('hora_desde')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror

            </div>
            <div class="col md-3">                
                {!! Form::label('Hasta Hora (formato hh:mm)')!!}
                <input type="text" id="hora_hasta" name="hora_hasta" class="form-control" value="{{$horario->hasta}}"  onchange="controlardesde(this)"/>
                @error('hora_hasta')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>
            <div class="col md-3">                
                {!! Form::label('Intervalo')!!}
                <input type="text" id="hora_int" name="hora_int" class="form-control" value="{{$horario->intervalo}}"/>
                @error('hora_int')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col md-4 p-2 m-3">
                <input type="submit" class="btn btn-success" value="MODIFICAR HORARIO">

            </div>          
        </div>
</div>    
{!! Form::close() !!}    

@stop

@section('css')
    {{-- <link rel="stylesheet" href="css/admin_custom.css'"> --}}
@stop
@section('js')
<script>
    function controlardesde(xcontrol){

        x=xcontrol.value;
        xmsg='';
        if(x.indexOf(':')<0){
            xmsg='error de formato :';
            xcontrol.focus();
        }
        if(x.length!=5){
            if(xmsg==''){
                xmsg='error de formato';
            }else{
                xmsg+=' - largo';
            }
            xcontrol.focus();
        }
        if(xmsg!=''){
            alert(xmsg);
        }
        if(xcontrol.name=='hora_hasta'){
            let valorhasta=document.getElementById("hora_hasta").value;
            let valordesde=document.getElementById("hora_desde").value;
            if(valorhasta<valordesde){
                alert('NO PUEDE SER MENOR EL CAMPO HASTA QUE EL CAMPO DESDE');
            }
        }
    }
</script>    
@stop

