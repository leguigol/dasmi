@extends('adminlte::page')

@section('content_header')
    <h1>LISTADO DE CONVENIOS CONTRATADOS</h1>
@stop
@section('content')
<div class="card">

    @if ($convenios->count())            

    <div class="card-body">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CONVENIO</th>
                        <th>ACCION</th>
                </thead>
                <tbody>
                    @foreach ($convenios as $convenio)
                        <tr>
                            <td>{{$convenio->id}}</td>
                            <td>{{$convenio->convenio_nombre}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.convenios.edit', $convenio)}}">Editar</a>

                            </td>
                    @endforeach
                </tbody>
            </table>                

        </div>
        
    @else
    <div class="card-body">
        <div class="row mb-3">
            <strong>No hay registros</strong>        
        </div>        
    @endif
        <a href="{{route('admin.convenios.create')}}" class="btn btn-primary">NUEVO CONVENIO</a>
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop