@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>EDICION DE AFILIADO</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
{!! Form::open(['route' => ['padrones.update', $padron->id], 'method' => 'put']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Nº de Afiliado')!!}
               {!! Form::text('padron_afiliado',$padron->afiliado,['class'=>'form-control']) !!}
               @error('padron_afiliado')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('Apellido')!!}
                {!! Form::text('padron_apellido',$padron->apellido,['class'=>'form-control']) !!}
                @error('padron_apellido')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
            <div class="col md-4">                
                {!! Form::label('Nombres')!!}
                {!! Form::text('padron_nombres',$padron->nombres,['class'=>'form-control']) !!}
                @error('padron_nombres')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
        </div>        
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Nº de Documento')!!}
               {!! Form::text('padron_documento',$padron->documento,['class'=>'form-control']) !!}
               @error('padron_documento')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('CUIL')!!}
                {!! Form::text('padron_cuil',$padron->cuil,['class'=>'form-control']) !!}
                @error('padron_cuil')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
            <div class="col md-4">                
                {!! Form::label('Nº Titular (-2 numeros del Nº de afiliado)')!!}
                {!! Form::text('padron_titular',$padron->titular,['class'=>'form-control']) !!}
                @error('padron_titular')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
        </div>        
        <div class="row">
            <div class="col md-4">                
               {!! Form::label('Fecha de Nacimiento')!!}
               {!! Form::date('padron_fechanac',$padron->fechanac,['class'=>'form-control']) !!}
               @error('padron_fechanac')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('Sexo')!!}
                <select class="form-control" name="padron_sexo">
                    <option value="M" {{($padron->sexo=='M') ? 'selected' : ''}}>MASCULINO</option>
                    <option value="F" {{($padron->sexo=='F') ? 'selected' : ''}}>FEMENINO</option>
                </select>                      
                @error('padron_sexo')
                  <strong style="color:red">*{{$message}}</strong>
                @enderror
            </div>     
            <div class="col md-4">                
                {!! Form::label('Parentesco')!!}
                <select class="form-control" name="padron_parentesco">
                    <option value=0 {{($padron->parentesco_id==0) ? 'selected' : ''}}>Titular</option>
                    <option value=1 {{($padron->parentesco_id==1) ? 'selected' : ''}}>Grupo Familiar</option>
                </select>                      

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
                        <option value="{{$plan->id}}" {{$plan->id==$padron->plan_id ? 'selected' : ''}}>{{$plan->plan_nombre}}</option>
                    @endforeach
                </select>    
               @error('plan_convenio')
                   <strong style="color:red">*{{$message}}</strong>
               @enderror
            </div>
            <div class="col md-4">                
                {!! Form::label('Convenio')!!}
                <select class="form-control" name="padron_convenio">
                @foreach ($convenios as $convenio)
                     <option value="{{$convenio->id}}" {{$convenio->id==$padron->convenio_id ? 'selected' : ''}}>{{$convenio->convenio_nombre}}</option>
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
             {!! Form::submit('ACTUALIZAR', ['class'=>'btn btn-primary']) !!}
        </div>          
    </div>
</div>    
{!! Form::close() !!}    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop