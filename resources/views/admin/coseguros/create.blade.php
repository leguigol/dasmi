@extends('adminlte::page')

@section('content_header')
    <h1>ALTA DE COSEGUROS</h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.coseguros.store'], ['method' => 'post']) !!}
    <div class="card">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">                
                   {!! Form::label('Desde')!!}
                   {!! Form::text('desde',old('desde'),['class'=>'form-control']) !!}
                   @error('desde')
                       <strong style="color:red">*{{$message}}</strong>
                   @enderror
                </div>
                <div class="col-md-2">                
                    {!! Form::label('Hasta')!!}
                    {!! Form::text('hasta','',['class'=>'form-control']) !!}
                    @error('hasta')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
                <div class="col-md-2">                
                    {!! Form::label('Cantidad')!!}
                    {!! Form::text('cantidad','',['class'=>'form-control']) !!}
                    @error('cantidad')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
                <div class="col-md-2">                
                    {!! Form::label('Convenio')!!}
                    <select class="form-control" name="convenio">
                        @foreach ($convenios as $convenio)
                             <option value="{{$convenio->id}}">{{$convenio->convenio_nombre}}</option>
                        @endforeach
                    </select>    
                    @error('convenio')
                       <strong style="color:red">*{{$message}}</strong>
                    @enderror

                    @error('cantidad')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
                <div class="col-md-2">                
                    {!! Form::label('Coseguro')!!}
                    {!! Form::text('coseguro','',['class'=>'form-control']) !!}
                    @error('coseguro')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>
                <div class="col-md-2">                
                    {!! Form::label('Vigencia (vencimiento)')!!}
                    {!! Form::date('vigencia','',['class'=>'form-control']) !!}
                    @error('vigencia')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror
                </div>

            </div>    
            <div class="row mt-4">
                <div class="col-md-2">
                    {!! Form::submit('GRABAR', ['class'=>'btn btn-primary']) !!}
                </div>    
                <div class="col-md-2">
                    <a href="{{route('admin.coseguros.index')}}" class="btn btn-secondary">VOLVER</a>
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