@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE DROGA</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.vademecum.store'], ['method' => 'post']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">                
                   {!! Form::label('Monodroga')!!}
                   {!! Form::text('droga_monodroga','',['class'=>'form-control']) !!}
                   @error('droga_monodroga')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col-md-2">                
                    {!! Form::label('Producto')!!}
                    {!! Form::text('droga_producto','',['class'=>'form-control']) !!}
                    @error('droga_producto')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>    
                <div class="col-md-2">                
                    {!! Form::label('Presentacion')!!}
                    {!! Form::text('droga_presentacion','',['class'=>'form-control']) !!}
                    @error('droga_presentacion')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>    
            </div>
            <div class="row">
                <div class="col-md-2">                
                    {!! Form::label('Laboratorio')!!}
                    {!! Form::text('droga_laboratorio','',['class'=>'form-control']) !!}
                    @error('droga_laboratorio')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>    
                <div class="col-md-2">                
                    {!! Form::label('Accion Terapeutica')!!}
                    {!! Form::text('droga_accion','',['class'=>'form-control']) !!}
                    @error('droga_accion')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>    
            </div>    
         <div class="row mt-4">
            <div class="col-md-2">
                {!! Form::submit('GRABAR', ['class'=>'btn btn-primary']) !!}
            </div>    
            <div class="col-md-2">
                <a href="{{route('admin.vademecum.index')}}" class="btn btn-secondary">VOLVER</a>
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