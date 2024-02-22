@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>AGREGA ESTADO</h1>
    {{-- <H5>Paciente: {{$padron->apellido . " " . $padron->nombres}}</h5> --}}
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
{!! Form::open(['route' => 'internaciones.store_estado']) !!}

<div class="card">
    <div class="card-body">
        <input type="text hidden" class="form-control invisible" name="id" value="{{$internaciones->id}}"> 
        <div class="row mt-2">
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Tipo de Internacion</label>
                <select class="form-control select2" name="tipoint" id="tipoint">
                    <option>Seleccione una opcion </option>
                    <option value='I' {{old('tipoint')==='I' ? 'selected' : ''}}>INTERNACION</option>
                    <option value='P' {{old('tipoint')==='P' ? 'selected' : ''}}>PRORROGA</option>
                </select>    

            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Fecha Desde</label>
                <input type="date" class="form-control" id="desde" name="desde" value="{{ old('desde')}}">
            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Fecha Hasta</label>
                <input type="date" class="form-control" id="hasta" name="hasta" value="{{ old('hasta') }}">
            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">Estado</label>
                <select class="form-control select2" name="estado" id="estado">
                    <option>Seleccione una opcion </option>
                    <option value='A' {{old('estado')==='A' ? 'selected' : ''}}>AUTORIZADO</option>
                    <option value='P' {{old('estado')==='P' ? 'selected' : ''}}>PENDIENTE</option>
                    <option value='R' {{old('estado')==='R' ? 'selected' : ''}}>RECHAZADA</option>
                </select>    

            </div>    
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                    <label for="exampleFormControlInput1" class="form-label">Observaciones</label>
                    <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}">
                </div>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 p-2 m-3">
                {!! Form::submit('AGREGAR ESTADO', ['class'=>'btn btn-primary']) !!}
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