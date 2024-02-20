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

        @foreach ($estados as $estado)
        <div class="row mt-2">
            <div class="col-12">
                <div class="bg-dark text-white p-1">
                    <h3 class="mb-0">ESTADOS DE LA INTERNACION</h3>
                </div>
            </div>
        </div>    
        <div class="row mt-2">
            <div class="col-md-1">
                <label for="exampleFormControlInput1" class="form-label">ID</label>
                <input type="text" class="form-control" id="estadoid" name="estadoid" value="{{$estado->id}}">
            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">TIPO</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $estado->tipo==='I' ? 'INTERNACION' : 'PRORROGA' }}">
            </div>    
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">DESDE</label>
                <input type="text" class="form-control" id="desde" name="desde" value="{{ date('d-m-Y', strtotime($estado->fecha_desde)) }}">    
            </div>    
            @if ($estado->fecha_hasta)
                <div class="col-md-2">
                    <label for="exampleFormControlInput1" class="form-label">HASTA</label>
                    <input type="text" class="form-control" id="hasta" name="hasta" value="{{  date('d-m-Y', strtotime($estado->fecha_hasta)) }}">    
                </div>                    
            @endif
                <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">ESTADO</label>
                @if ($estado->estado==='A')
                    <input type="text" class="form-control" id="tipo" name="estado" value="AUTORIZADO">            
                @endif
                @if ($estado->estado==='P')
                    <input type="text" class="form-control" id="tipo" name="estado" value="PENDIENTE">            
                @endif
                @if ($estado->estado==='R')
                    <input type="text" class="form-control" id="tipo" name="estado" value="RECHAZADO">            
                @endif
            </div>    
            @if ($estado->auditor_id)
                <div class="col-md-2">
                    <label for="exampleFormControlInput1" class="form-label">AUDITOR</label>
                    <input type="text" class="form-control" id="auditor" name="auditor" value="{{ $estado->auditor_id }}">    
                </div>      
            @endif                      
            @if (Auth::user()->hasRole('Auditor')) 
            <div class="col-md-2">
                <label for="exampleFormControlInput1" class="form-label">EDITAR</label>
                <a href="{{route('internaciones.edit_estado',$estado->id)}}" class="form-control btn btn-primary" type="submit">EDITAR ESTADO</a>
            </div>      
            @endif    

        </div>        
        
        @endforeach
    
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