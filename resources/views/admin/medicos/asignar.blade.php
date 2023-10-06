@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>Asignar Centro</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> 
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    {!! Form::open(['route' => ['medico.gcentro', $medico], 'method'=> 'put']) !!}
    <div class="card">
        <div class="card-body">
            <p class="h5">Apellido y Nombres:</p>
            <p class="form-control">{{$medico->medico_apellido . " " . $medico->medico_nombres}}</p>

            <div class="row">
                <div class="col md-4">
                    {!! Form::select('id_centro',$centros,'',['class' => 'form-control'])!!}
                </div>
            </div>        
        </div>
    </div>
    {!! Form::submit('ASIGNAR', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@stop