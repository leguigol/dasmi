@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE PLAN</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => ['admin.planes.update', $planes->id], 'method'=>'put']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Nombre del Plan')!!}
                   {!! Form::text('plan_nombre',$planes->plan_nombre,['class'=>'form-control']) !!}
                   @error('plan_nombre')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col md-3">                
                   {!! Form::label('Convenio')!!}
                   <select class="form-control" name="plan_convenio">
                        @foreach ($convenios as $convenio)
                             <option value="{{$convenio->id}} {{$convenio->id==old('convenio_id' ? 'selected' : '')}}">{{$convenio->convenio_nombre}}</option>
                        @endforeach
                    </select>    
                   @error('plan_convenio')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
            </div>        
             <div class="row mt-4">
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
@stop