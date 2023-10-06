@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@stop

@section('content_header')
@stop

@section('content')
    <h3>TURNOS POR FECHA</h3>
    {!! Form::open(['route'=> 'turnos.listarxfecha']) !!}
    <div class="row mt-1 mb-1">
        <div class="col-md-4">
            <label>SELECCIONE FECHA</label>
            {!! Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            {{-- <input type="date" class="form-control" id="fecha" /> --}}
        </div>
    </div>    
    <div class="row mt-1 mb-1">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">LISTAR MEDICOS</button>
        </div>    
    </div>    
    {!! Form::close() !!}
@stop


@section('js')
@stop