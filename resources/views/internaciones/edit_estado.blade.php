@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>EDICION DE ESTADO</h1>
    {{-- <H5>Paciente: {{$padron->apellido . " " . $padron->nombres}}</h5> --}}
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

{!! Form::model($estado, ['route' => ['internaciones.update_estado', $estado], 'method' => 'patch']) !!}

<div class="card">
    <div class="card-body">
        <div class="row mt-2">
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Tipo de Internacion</label>
                <select class="form-control select2" name="tipoint" id="tipoint">
                    <option>Seleccione una opcion </option>
                    <option value='I' {{'I'==$estado->tipo ? 'selected' : ''}}>INTERNACION</option>
                    <option value='P' {{'P'==$estado->tipo ? 'selected' : ''}}>PRORROGA</option>
                </select>    

            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Fecha Desde</label>
                <input type="date" class="form-control" id="desde" name="desde" value="{{ $estado->fecha_desde }}">
            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Fecha Hasta</label>
                <input type="date" class="form-control" id="hasta" name="hasta" value="{{ $estado->fecha_hasta }}">
            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Estado</label>
                <select class="form-control select2" name="estado" id="estado">
                    <option>Seleccione una opcion </option>
                    <option value='A' {{'A'==$estado->estado ? 'selected' : ''}}>AUTORIZADO</option>
                    <option value='P' {{'P'==$estado->estado ? 'selected' : ''}}>PENDIENTE</option>
                    <option value='R' {{'R'==$estado->estado ? 'selected' : ''}}>RECHAZADA</option>
                </select>    

            </div>    
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                    <label for="exampleFormControlInput1" class="form-label">Observaciones</label>
                    <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" value="{{ $estado->observaciones }}">
                </div>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 p-2 m-3">
                {!! Form::submit('ACTUALIZAR ESTADO', ['class'=>'btn btn-primary']) !!}
            </div>          
            <div class="col-md-2 p-2 m-3">
                <a href="{{route('internaciones.admin')}}" class="form-control btn btn-primary" type="submit">VOLVER</a>
            </div>          
        </div>
    </div>

    </div>
</div>    
{!! form::close() !!}

@stop

@section('css')
@stop

@section('js')
@stop