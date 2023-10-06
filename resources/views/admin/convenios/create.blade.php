@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE CONVENIO</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.convenios.store']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Nombre del Convenio')!!}
                   {!! Form::text('convenio_nombre','',['class'=>'form-control']) !!}
                   @error('convenio_nombre')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
            </div>        
             <div class="row mt-4">
                 {!! Form::submit('CREAR', ['class'=>'btn btn-primary']) !!}
            </div>        
        </div>
    </div>    
    {!! Form::close() !!}    

@stop

@section('css')
@stop

@section('js')
@stop