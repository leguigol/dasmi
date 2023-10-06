@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>ALTA DE AFILIADOS</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
{!! Form::open(['route' => 'padrones.store']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Nº de Afiliado')!!}
               {!! Form::text('padron_afiliado','',['class'=>'form-control']) !!}
               @error('padron_afiliado')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('Apellido')!!}
                {!! Form::text('padron_apellido','',['class'=>'form-control']) !!}
                @error('padron_apellido')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
            <div class="col md-4">                
                {!! Form::label('Nombres')!!}
                {!! Form::text('padron_nombres','',['class'=>'form-control']) !!}
                @error('padron_nombres')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
        </div>        
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Nº de Documento')!!}
               {!! Form::text('padron_documento','',['class'=>'form-control']) !!}
               @error('padron_documento')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('CUIL')!!}
                {!! Form::text('padron_cuil','',['class'=>'form-control']) !!}
                @error('padron_cuil')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
            <div class="col md-4">                
                {!! Form::label('Nº Titular (-2 numeros del Nº de afiliado)')!!}
                {!! Form::text('padron_titular','',['class'=>'form-control']) !!}
                @error('padron_titular')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
        </div>        
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Fecha de Nacimiento')!!}
               {!! Form::date('padron_fechanac','',['class'=>'form-control']) !!}
               @error('padron_fechanac')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('Sexo')!!}
                {!! Form::select('padron_sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class'=>'form-control']) !!}
                @error('padron_sexo')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
            <div class="col md-4">                
                {!! Form::label('Parentesco')!!}
                {!! Form::select('padron_parentesco', ['0' => 'Titular', '1' => 'Grupo Familiar'], null, ['class'=>'form-control']) !!}
                @error('padron_parentesco')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
        </div>        
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Plan')!!}
                <select class="form-control" name="plan_convenio">
                    @foreach ($planes as $plan)
                        <option value="{{$plan->id}} {{$plan->id==old('plan_convenio' ? 'selected' : '')}}">{{$plan->plan_nombre}}</option>
                    @endforeach
                </select>    
               @error('padron_plan')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('Convenio')!!}
                <select class="form-control" name="padron_convenio">
                @foreach ($convenios as $convenio)
                     <option value="{{$convenio->id}}">{{$convenio->convenio_nombre}}</option>
                @endforeach
                </select>    
                @error('padron_convenio')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>     
        </div>        
    </div>
    <div class="row">
        <div class="col md-4 p-2 m-3">
             {!! Form::submit('CREAR', ['class'=>'btn btn-primary']) !!}
        </div>          
    </div>
</div>    
{{! Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/turnos.js')}}" defer></script>
@stop