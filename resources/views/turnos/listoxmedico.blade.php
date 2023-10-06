@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>TURNOS POR MEDICO</h1>
@stop

@section('content')
@if(!empty($info))
<div class="alert alert-success">
    <strong>{{$info}}</strong>
</div>
@endif
{!! Form::open(['route' => 'turnos.xmedicoStore', 'method'=>'post']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Medico')!!}
                
               <select class="form-control" name="medico" id="medico">
                    @foreach ($medicos as $medico)
                        <option value="{{$medico->id}}">{{$medico->medico_apellido . " ". $medico->medico_nombres}}</option>
                    @endforeach
                </select>    
            </div>    

        </div>        
    @if($medicos->count())
        <div class="row">
            <div class="col md-4 p-2 m-3">
                <input type="submit" class="btn btn-success" value="LISTAR TURNOS">

            </div>          
        </div>        
        
    @else
    <div class="row">
        <div class="col md-4 p-2 m-3">
            <h3 class="text-danger text-md">No hay Medicos atendiendo este dia</h3>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-1">
            <a href="{{route('turnos.xfecha')}}" class="form-control btn btn-success">VOLVER</a>
        </div>
    </div>    
    @endisset    
</div>    
{!! Form::close() !!}    

@stop

@section('css')
    {{-- <link rel="stylesheet" href="css/admin_custom.css'"> --}}
@stop
@section('js')
@stop

