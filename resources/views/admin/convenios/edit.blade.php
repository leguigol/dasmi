@extends('adminlte::page')

@section('content_header')
    <h1>EDICION DE CONVENIO</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::model($convenios, ['route' => ['admin.convenios.update', $convenios], 'method' => 'put']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col md-3">                
                    {!! Form::label('Nombre del Convenio')!!}
                   {!! Form::text('convenio_nombre',$convenios->convenio_nombre,['class'=>'form-control']) !!}
                   @error('convenio_nombre')
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
</div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop