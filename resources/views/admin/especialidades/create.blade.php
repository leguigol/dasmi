@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE ESPECIALIDAD</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.especialidades.store'], ['method' => 'post']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">                
                   {!! Form::label('Especialidad')!!}
                   {!! Form::text('especialidad_nombre','',['class'=>'form-control']) !!}
                   @error('especialidad_nombre')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
            </div>    
            <div class="row mt-4">
                <div class="col-md-2">
                    {!! Form::submit('GRABAR', ['class'=>'btn btn-primary']) !!}
                </div>    
                <div class="col-md-2">
                    <a href="{{route('admin.especialidades.index')}}" class="btn btn-secondary">VOLVER</a>
                </div>    
            </div>   
        </div>    
    </div>    
    {!! Form::close() !!}    
</div>

@stop

@section('css')
@stop

@section('js')
@stop