@extends('adminlte::page')

@section('title', 'DASMI')

@section('content_header')
<div class="row">
    <div class="col-md-12">                
        <div class="card">

            <h5 class="card-title bg-blue text-white p-2">ESQUEMA DE VACUNACION
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
                                    <input type="radio" name="opcion_{{ $vacu->id }}" value="si"> Sí
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opcion_{{ $vacu->id }}" value="no"> No
                                </label>


                                </div>
                            @endforeach
                        </div>    
                    </div>    
                </div>    
            </div>
        </div>    
    </div>        


</div>
@stop

@section('content')

@stop

@section('js')

@stop