@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE PRESTADORES</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.prestadores.store'], ['method' => 'post']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">                
                   {!! Form::label('Razon Social')!!}
                   {!! Form::text('prestador_nombre','',['class'=>'form-control']) !!}
                   @error('prestador_nombre')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col-md-6">                
                    {!! Form::label('Domicilio')!!}
                    {!! Form::text('prestador_domicilio','',['class'=>'form-control']) !!}
                    @error('prestador_domicilio')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                 </div>
             </div>    
             <div class="row">
                <div class="col-md-6">                
                   {!! Form::label('Localidad')!!}
                   {!! Form::text('prestador_localidad','',['class'=>'form-control']) !!}
                   @error('prestador_localidad')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col-md-6">                
                    {!! Form::label('Especialidad')!!}
                    <select class="form-control" name="prestador_especialidad">
                        @foreach ($especia as $espe)
                             <option value="{{$espe->id}}">{{$espe->especialidad_nombre}}</option>
                        @endforeach
                    </select>    
                    @error('prestador_especialidad')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                 </div>
             </div>    
            <div class="row mt-4">
                <div class="col-md-2">
                    {!! Form::submit('GRABAR', ['class'=>'btn btn-primary']) !!}
                </div>    
                <div class="col-md-2">
                    <a href="{{route('admin.prestadores.index')}}" class="btn btn-secondary">VOLVER</a>
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