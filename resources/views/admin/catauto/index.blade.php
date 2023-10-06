@extends('adminlte::page')

@section('content_header')
    <h1>LISTADO DE CATEGORIAS DE AUTORIZACIONES</h1>
@stop
@section('content')
<div class="card">

    @if ($cates->count())            

    <div class="card-body">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CATEGORIA</th>
                        <th>TIENE COSEGURO</th>
                        <th>COSEGURO</th>
                        <th>ACCION</th>
                </thead>
                <tbody>
                    @foreach ($cates as $cate)
                        <tr>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->descripcion}}</td>
                            <td>{{$cate->tiene_cose}}</td>
                            <td>{{$cate->coseguro}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.catauto.edit', $cate->id)}}">Editar</a>
                                <div class="d-inline-block">
                                    <form action="{{route('admin.catauto.destroy', $cate->id)}}" type="submit" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>    
                                </div>    
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
        <a href="{{route('admin.catauto.create')}}" class="btn btn-primary">NUEVA CATEGORIA</a>
    </div>

</div>
@stop

@section('css')
@stop

@section('js')
@stop