@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>ALTA DE INTERNACION </h1>
    <H5>Paciente: {{$padron->apellido . " " . $padron->nombres}}</h5>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
{!! Form::open(['route' => 'internaciones.store']) !!}
<div class="card">
    <div class="card-body">
        <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 

        <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Prestador</label>
                <select class="form-control select2" name="prestador" id="prestador">
                    <option>Seleccione una opcion </option>
                        @foreach ($prestadores as $prestador)
                            <option value="{{$prestador->id }}" {{$prestador->id==old('prestador') ? 'selected' : ''}}>{{$prestador->prestador_nombre}}</option>
                        @endforeach
                </select>    
                @error('prestador')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror  

            </div>    
        </div>

        <div class="row mt-2">
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="ingreso" name="ingreso" placeholder="Fecha" value="{{ old('ingreso')}}">
                @error('ingreso')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror  
            </div>    
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Hora de Ingreso</label>
                <input type="text" class="form-control" id="hingreso" name="hingreso" placeholder="hh:mm" value="{{ old('hingreso')}}">
                @error('hingreso')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror  
            </div>    
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Medico</label>
                <input type="text" class="form-control" id="medico" name="medico" placeholder="Ingrese el medico que ingresa" value="{{ old('medico')}}">
                @error('medico')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror  

            </div>    

        </div>        
        <div class="row mt-2">
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Tipo de Internacion</label>
                <select class="form-control select2" name="tipoint" id="tipoint">
                    <option>Seleccione una opcion </option>
                    <option value='CL' {{'CL'==old('tipoint') ? 'selected' : ''}}>CLINICA</option>
                    <option value='QU' {{'QU'==old('tipoint') ? 'selected' : ''}}>QUIRURGICA</option>
                    <option value='OB' {{'OB'==old('tipoint') ? 'selected' : ''}}>OBSTETRICA</option>
                    <option value='PE' {{'PE'==old('tipoint') ? 'selected' : ''}}>PEDIATRICA</option>
                    <option value='NE' {{'NE'==old('tipoint') ? 'selected' : ''}}>NEONATAL</option>
                    <option value='PA' {{'PA'==old('tipoint') ? 'selected' : ''}}>PARTO/CESAREA</option>
                </select>    
                @error('tipoint')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror  

            </div>    
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">SERVICIO</label>
                <select class="form-control select2" name="servicio" id="servicio">
                    <option>Seleccione una opcion </option>
                    <option value='PI' {{'PI'==old('servicio') ? 'selected' : ''}}>PISO</option>
                    <option value='UC' {{'UC'==old('servicio') ? 'selected' : ''}}>UCO</option>
                    <option value='UA' {{'UA'==old('servicio') ? 'selected' : ''}}>UTI C/ARM</option>
                    <option value='US' {{'US'==old('servicio') ? 'selected' : ''}}>UTI S/ARM</option>
                    <option value='CU' {{'CU'==old('servicio') ? 'selected' : ''}}>CUIDADOS ESPECIALES</option>
                </select>    
                @error('servicio')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror  

            </div>    

        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Diagnostico Presuntivo</label>
                <input type="text" class="form-control" id="diagnostico" name="diagnostico" placeholder="Diagnostico" value="{{ old('diagnostico')}}">
                @error('diagnostico')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror  
            </div>    
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Observaciones</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" value="{{ old('observaciones')}}">
            </div>    
        </div>        

    </div>
    <div class="row">
        <div class="col-md-3 p-2 m-3">
             {!! Form::submit('ALTA DE INTERNACION', ['class'=>'btn btn-primary']) !!}
        </div>          
        <div class="col-md-2 p-2 m-3">
            <a href="{{route('internaciones.index')}}" class="form-control btn btn-primary" type="submit">VOLVER</a>
        </div>          

    </div>
</div>    
{{! Form::close() }}
@stop

@section('css')
@stop

@section('js')
@stop