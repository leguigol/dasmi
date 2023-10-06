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
     @if(empty($info))

        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Medico')!!}
                <select class="form-control" name="medico" id="medico">
                        @foreach ($medicos as $medico)
                            <option value="{{$medico->id}} {{$medico->id==old('hora_medico' ? 'selected' : '')}}">{{$medico->medico_apellido . " ". $medico->medico_nombres}}</option>
                        @endforeach
                </select>   
            </div>    
            @error('hora_medico')
               <strong style="color:red">*{{$message}}</strong>
            @enderror

        </div>        
        <div class="row">
            <div class="col md-4 p-2 m-3">
                <input type="submit" class="btn btn-success" value="LISTAR TURNOS">
            </div>          
        </div>    
    @endif    
    </div>

</div>    
{!! Form::close() !!}    

@stop

@section('css')
    {{-- <link rel="stylesheet" href="css/admin_custom.css'"> --}}
@stop
@section('js')
@stop

