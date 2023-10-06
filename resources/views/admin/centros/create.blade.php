@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE CENTROS MEDICOS</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.centros.store']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Nombre del Centro')!!}
                   {!! Form::text('centro_nombre','',['class'=>'form-control']) !!}
                   @error('centro_nombre')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col md-3">                
                    {!! Form::label('Domicilio')!!}
                    {!! Form::text('centro_domicilio','',['class'=>'form-control']) !!}
                    @error('centro_domicilio')
                    <strong style="color:red">*{{$message}}</strong>
                    @enderror
             </div>
                <div class="col md-3">                
                    {!! Form::label('Nro')!!}
                    {!! Form::text('centro_nro','',['class'=>'form-control']) !!}
                </div>
                @error('centro_nro')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Localidad')!!}
                    {!! Form::text('centro_localidad','',['class'=>'form-control']) !!}
                    @error('centro_localidad')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
                <div class="col md-3">                
                     {!! Form::label('Telefono')!!}
                     {!! Form::text('centro_telefono','',['class'=>'form-control']) !!}
                     @error('centro_telefono')
                         <strong style="color:red">*{{$message}}</strong>
                     @enderror
             </div> 
                <div class="col md-3">                
                    {!! Form::label('Responsable')!!}
                    {!! Form::text('centro_responsable','',['class'=>'form-control']) !!}
                    @error('centro_responsable')
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
</div>

@stop

@section('css')
@stop

@section('js')
@stop