@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE MEDICO</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.medicos.store']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Nombre del Medico')!!}
                   {!! Form::text('medico_nombres','',['class'=>'form-control']) !!}
                   @error('medico_nombres')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col md-3">                
                    {!! Form::label('Apellido del Medico')!!}
                    {!! Form::text('medico_apellido','',['class'=>'form-control']) !!}
                    @error('medico_apellido')
                    <strong style="color:red">*{{$message}}</strong>
                    @enderror
             </div>
                <div class="col md-3">                
                    {!! Form::label('Matricula')!!}
                    {!! Form::text('medico_matricula','',['class'=>'form-control']) !!}
                    @error('medico_matricula')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Especialidad')!!}
                    {!! Form::text('medico_especialidad','',['class'=>'form-control']) !!}
                    @error('medico_especialidad')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
                <div class="col md-3">                
                    {!! Form::label('Estado')!!}
                    {!! Form::select('medico_estado', ['A' => 'Activo', 'I' => 'Inactivo'], 'A', ['class'=>'form-control']) !!}
                    @error('medico_estado')
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop