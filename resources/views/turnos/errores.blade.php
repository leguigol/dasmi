@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>TURNOS - ERROR</h1>
@stop

@section('content')
@if(!empty($info))
<div class="alert alert-danger">
    <strong>{{$info}}</strong>
</div>
@endif

<div class="row">
        <div class="col-md-1">
            <a href="{{route('turnos.xmedico')}}" class="form-control btn btn-success">VOLVER</a>
        </div>
</div>    

@stop

@section('css')
@stop
@section('js')
@stop

