@extends('adminlte::page')

@section('content_header')
    <h1>EDICION DE CATEGORIAS DE AUTORIZACIONES</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::model($cate, ['route' => ['admin.catauto.update', $cate->id], 'method' => 'patch']) !!}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col md-4">                
                   {!! Form::label('Nombre de la Categoria')!!}
                </div>
                <div class="col md-4">                
                    {!! Form::label('Tiene Coseguro ?')!!}
                </div>    
                <div class="col md-4">                
                    {!! Form::label('Coseguro ?')!!}
                </div>    
            </div>
            <div class="row">
                <div class="col md-4">                
                   {!! Form::text('nombre',$cate->descripcion,['class'=>'form-control']) !!}
                   @error('nombre')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col md-4">                
                    {!! Form::select('tiene', ['S' => 'Si', 'N' => 'No'],$cate->tiene_cose,['class' => 'form-control']) !!}
                    @error('tiene')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>    
                <div class="col md-4">                
                    {!! Form::text('coseguro',$cate->coseguro,['class'=>'form-control']) !!}
                    @error('coseguro')
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
@stop

@section('js')
@stop