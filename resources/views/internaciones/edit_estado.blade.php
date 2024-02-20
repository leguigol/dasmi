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

<div class="card">
    <div class="card-body">
        <h1>Edicion de estados</h1>
    </div>
</div>    
@stop

@section('css')
@stop

@section('js')
@stop