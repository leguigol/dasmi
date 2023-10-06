@extends('adminlte::page')

@section('content_header')
    <h1>EDICION DE CENTROS MEDICOS</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($centro, ['route' => ['admin.centros.update', $centro], 'method' => 'put']) !!}
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Nombre del Centro')!!}
                   {!! Form::text('centro_nombre',$centro->centro_nombre,['class'=>'form-control']) !!}
                   @error('centro_nombre')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col md-3">                
                    {!! Form::label('Domicilio')!!}
                    {!! Form::text('centro_domicilio',$centro->centro_domicilio,['class'=>'form-control']) !!}
                    @error('centro_domicilio')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
             </div>
                <div class="col md-3">                
                    {!! Form::label('Nro')!!}
                    {!! Form::text('centro_nro',$centro->centro_nro,['class'=>'form-control']) !!}
                </div>
                @error('centro_nro')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Localidad')!!}
                    {!! Form::text('centro_localidad',$centro->centro_localidad,['class'=>'form-control']) !!}
                    @error('centro_localidad')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
                <div class="col md-3">                
                     {!! Form::label('Telefono')!!}
                     {!! Form::text('centro_telefono',$centro->centro_telefono,['class'=>'form-control']) !!}
                     @error('centro_telefono')
                         <strong style="color:red">*{{$message}}</strong>
                     @enderror
             </div> 
                <div class="col md-3">                
                    {!! Form::label('Responsable')!!}
                    {!! Form::text('centro_responsable',$centro->centro_responsable,['class'=>'form-control']) !!}
                    @error('centro_responsable')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div> 
         </div>        
         <div class="row mt-4">
             {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
         </div>    
         {!! Form::close() !!}    
        </div>
    </div>    
</div>

@stop

@section('css')
@stop

@section('js')
@stop