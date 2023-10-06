@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>IMPORTAR PADRON</h1>
@stop

@section('content')
@if (session('message'))
<div class="alert alert-success">
    <strong>{{session('message')}}</strong>
</div>
@endif

<form action="{{route('padrones.procesarexcel')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <div class="col md-4">                
            {!! Form::label('Fecha de Procesamiento')!!}
            <input type="date" class="form-control" name="date" id="date">
        </div>
    </div>     
    <div class="row mt-3">
        <input type="file" name="file">
        <br>
    </div>    
    <button class="btn btn-primary mt-3" type="submit">IMPORTAR PADRON</button>

</form>    
@stop

@section('css')
@stop

@section('js')
<script>
    var date = new Date();
    document.getElementById('date').valueAsDate = date;
</script>
@stop