@extends('adminlte::page')

@section('content_header')
    <h1>EDICION DE PRACTICA</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::model($practica, ['route' => ['admin.nomenclador.update', $practica->id], 'method' => 'patch']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">                
                    {!! Form::label('Codigo')!!}
                    {!! Form::text('practica_codigo',$practica->codigo,['class'=>'form-control', 'disabled']) !!}
                    @error('practica_codigo')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                 </div>
                 <div class="col-md-6">                
                   {!! Form::label('Descripción')!!}
                   {!! Form::text('practica_descrip',$practica->descripcion,['class'=>'form-control']) !!}
                   @error('practica_descrip')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col-md-2">                
                    {!! Form::label('Tipo de Practica')!!}
                    <select class="form-control" name="tipo">
                        <option value="B" {{$practica->tipo=='B' ? 'selected' : ''}}>BAJA COMPLEJIDAD</option>
                        <option value="M" {{$practica->tipo=='M' ? 'selected' : ''}}>MEDIANA COMPLEJIDAD</option>
                        <option value="A" {{$practica->tipo=='A' ? 'selected' : ''}}>ALTA COMPLEJIDAD</option>
                    </select>            
                    @error('tipo')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>    
                <div class="col-md-2">                
                    {!! Form::label('Autorizacion')!!}
                    <select class="form-control" name="auto">
                        <option value="A" {{$practica->auto=='A' ? 'selected' : ''}}>AUTOMATICA</option>
                        <option value="M" {{$practica->auto=='M' ? 'selected' : ''}}>MANUAL</option>
                    </select>            
                    @error('auto    ')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>    
            </div>
         <div class="row mt-4">
            <div class="col-md-2">
                {!! Form::submit('ACTUALIZAR', ['class'=>'btn btn-primary']) !!}
            </div>    
            <div class="col-md-2">
                <a href="{{route('admin.nomenclador.index')}}" class="btn btn-secondary">VOLVER</a>
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