@extends('adminlte::page')

@section('title', 'DASMI')

@section('content_header')
{!! Form::open(['route' => 'vacunas.store']) !!}

<input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 

<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="row">
                <div class="col-md-2">                
                    <h1>HISTORIA CLINICA</h1><span class="badge badge-success">Dr.{{ Auth::user()->name }}</span>
                </div>
            </div>            
            <h5 class="card-title bg-blue text-white p-2">ESQUEMA DE VACUNACION 
                <span class="badge badge-success float-right">{{$padron->apellido . " ". $padron->nombres}}</span>
            </h5>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        @php
                            $p_edad=null;   
                        @endphp
                        <div class="row">
                            @foreach ($vacunas as $vacu)
                                    @if ($p_edad !==$vacu->edad)
                                        @if ($p_edad)
                                            <div class="w-100"></div> 
                                            <div class="col-md-12">
                                                <hr> {{-- Línea horizontal --}}
                                            </div>                                            
                                        @endif
                                        @php
                                            $p_edad=$vacu->edad;
                                            $show_edad=true;
                                        @endphp
                                        
                                        <div class="col-md-1"><p>{{ $vacu->edad }}</p></div>
                                    @else
                                        @php
                                            $show_edad=false;
                                        @endphp    
                                    @endif
                                @if ($show_edad)
                                    <div class="col-md-1">
                                @else
                                    <div class="col-md-1 offset-md-1">
                                @endif
                                
                                <a href="{{route('vacunas.index')}}">{{$vacu->vacuna}} <br></a>   
                                <label class="radio-inline">
                                    <input type="radio" name="opcion_{{ $vacu->id }}" value="S" {{ ($vacu->estaSeleccionada('S',$vacu->id,$padron->id)) ? 'checked' : '' }}> Sí
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opcion_{{ $vacu->id }}" value="N" {{ ($vacu->estaSeleccionada('N',$vacu->id,$padron->id)) ? 'checked' : '' }}> No
                                </label>


                                </div>
                            @endforeach
                        </div>    
                    </div>    
                </div>    
            </div>
            <div class="row">
                <div class="col-md-2 mx-4 mb-3">
                    <button class="btn btn-primary" type="submit">GRABAR DATOS</button>
                </div>
                <div class="col-md-2 mx-4 mb-3">
                    <a href={{ route('hc.principal',$padron->id) }} class="btn btn-success" type="submit">VOLVER</a>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-secondary" type="reset">RESTABLECER</button>
                </div>
            </div>

        </div>    

    </div>        
</div>

{!! form::close() !!}

@stop

@section('content')

@stop

@section('js')

@stop