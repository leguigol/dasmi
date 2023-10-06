@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>TURNOS POR AFILIADO - {{$padron->apellido . " ". $padron->nombres}}</h1>
@stop

@section('content')
<div id="success_message" class="mt-1"></div>
<div class="card">
    <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Fecha y Hora</th>
                    <th>Asistio</th>
                    <th>Accion</th>
                </thead>
                    
                @if ($turnos->count())
                @foreach ($turnos as $turno)
                <tbody>
                    <tr>
                        <th>{{$turno->id}}</th>    
                        <th>{{$turno->fechahora}}</th>
                        <th>{{$turno->asistio}}</th>
                        <th><a href="{{route('turnos.show',$turno->id)}}" class="btn btn-primary">VER TURNO</a></th>
                    </tr>
                </tbody>
                @endforeach
                @else
                <tr>
                    <th colspan="4">SIN REGISTROS</th>            
                </tr>    
                   
                @endif

            </table>        
    </div>    
</div>    

@stop

@section('css')
@stop
@section('js')
@stop

