@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>INTERNACION {{$internacion->id}}</h1>
    <H5>Paciente: {{$padron->apellido . " " . $padron->nombres}}</h5>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Prestador</label>
                <select class="form-control select2" name="prestador" id="prestador">
                    <option>Seleccione una opcion </option>
                        @foreach ($prestadores as $prestador)
                            <option value="{{$prestador->id }}" {{$prestador->id==$internacion->prestador_id ? 'selected' : ''}}>{{$prestador->prestador_nombre}}</option>
                        @endforeach
                </select>    

            </div>    
        </div>

        <div class="row mt-2">
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Fecha de Ingreso</label>
                <input type="text" class="form-control" id="ingreso" name="ingreso" value="{{ date('d-m-Y', strtotime($internacion->fecha_ingreso)) }}">
            </div>    
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Hora de Ingreso</label>
                <input type="text" class="form-control" id="hingreso" name="hingreso" placeholder="hh:mm" value="{{ $internacion->hora_ingreso }}">
            </div>    
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Medico</label>
                <input type="text" class="form-control" id="medico" name="medico" placeholder="Ingrese el medico que ingresa" value="{{ $internacion->medico }}">

            </div>    

        </div>        
        <div class="row mt-2">
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Tipo de Internacion</label>
                <select class="form-control select2" name="tipoint" id="tipoint">
                    <option>Seleccione una opcion </option>
                    <option value='CL' {{'CL'==$internacion->tipo_internacion ? 'selected' : ''}}>CLINICA</option>
                    <option value='QU' {{'QU'==$internacion->tipo_internacion ? 'selected' : ''}}>QUIRURGICA</option>
                    <option value='OB' {{'OB'==$internacion->tipo_internacion ? 'selected' : ''}}>OBSTETRICA</option>
                    <option value='PE' {{'PE'==$internacion->tipo_internacion ? 'selected' : ''}}>PEDIATRICA</option>
                    <option value='NE' {{'NE'==$internacion->tipo_internacion ? 'selected' : ''}}>NEONATAL</option>
                    <option value='PA' {{'PA'==$internacion->tipo_internacion ? 'selected' : ''}}>PARTO/CESAREA</option>
                </select>    

            </div>    
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">SERVICIO</label>
                <select class="form-control select2" name="servicio" id="servicio">
                    <option>Seleccione una opcion </option>
                    <option value='PI' {{'PI'==$internacion->servicio ? 'selected' : ''}}>PISO</option>
                    <option value='UC' {{'UC'==$internacion->servicio ? 'selected' : ''}}>UCO</option>
                    <option value='UA' {{'UA'==$internacion->servicio ? 'selected' : ''}}>UTI C/ARM</option>
                    <option value='US' {{'US'==$internacion->servicio ? 'selected' : ''}}>UTI S/ARM</option>
                    <option value='CU' {{'CU'==$internacion->servicio ? 'selected' : ''}}>CUIDADOS ESPECIALES</option>
                </select>    
            </div>    

        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Diagnostico Presuntivo</label>
                <input type="text" class="form-control" id="diagnostico" name="diagnostico" placeholder="Diagnostico" value="{{ $internacion->diagnostico }}">
            </div>    
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Observaciones</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" value="{{ $internacion->observaciones }}">
            </div>    
        </div>        

    </div>
    <div class="row">
        <div class="col-md-2 p-2 m-3">
            <a href="{{route('internaciones.index')}}" class="form-control btn btn-primary" type="submit">VOLVER</a>
        </div>          
    </div>

</div>    
@stop

@section('css')
@stop

@section('js')
@stop