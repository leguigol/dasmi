@extends('adminlte::page')

@section('content_header')
    <h1>GENERAR AGENDA</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'agenda.store']) !!}
    <div class="card">
        <div class="card-body">
                <div class="row">
                    <div class="col md-3">                
                        {!! Form::label('Seleccion de Medico')!!}
                        <select class="form-control" name="medico_id" id="medico_id">
                            @foreach ($medicos as $medico)
                                <option value="{{$medico->id}}">{{$medico->medico_apellido . " ". $medico->medico_nombres}}</option>
                            @endforeach
                        </select>    
                        @error('medico')
                        <strong style="color:red">*{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">                
                        {!! Form::label('MES')!!}
                        <select class="form-control" name="mes" id="mes">
                            <option value="1">ENERO</option>
                            <option value="2">FEBRERO</option>
                            <option value="3">MARZO</option>
                            <option value="4">ABRIL</option>
                            <option value="5">MAYO</option>
                            <option value="6">JUNIO</option>
                            <option value="7">JULIO</option>
                            <option value="8">AGOSTO</option>
                            <option value="9">SEPTIEMBRE</option>
                            <option value="10">OCTUBRE</option>
                            <option value="11">NOVIEMBRE</option>
                            <option value="12">DICIEMBRE</option>
                        </select>    
                    </div>       
                    <div class="col">                
                        {!! Form::label('AÑO')!!}
                        {!! Form::text('ano',date('Y'),['class'=>'form-control']) !!}
                    </div>    
                </div>     
        </div>
        <div class="row">
            <div class="col m-3">
                {!! Form::submit('CREAR', ['class'=>'btn btn-primary']) !!}
            </div>    
        </div>    

    </div>    
    {!! Form::close() !!}    
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop