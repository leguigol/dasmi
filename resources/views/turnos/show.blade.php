@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

@stop

@section('content_header')
    <h1>TURNOS</h1>
@stop

@section('content')
        <div class="card px-3">

            @isset($turno->padron_id)
                {!! Form::open(['route' => ['turnos.update',$turno->id], 'method'=>'patch']) !!}
            @else
                {!! Form::open(['route' => 'turnos.store']) !!}
            @endisset

            <div id="success_message" class="mt-1"></div>
            <div class="row mt-1 mb-1">
                <div class="col-md-1">
                    <label>ID:</label>
                </div>
                <div class="col-md-2">
                    {!! Form::text('id',$turno->id,['class'=>'form-control','readonly','id'=>'turno_id']) !!}
                </div>
                <div class="col-md-2">
                    <label>MEDICO: - {{$turno->medico->medico_apellido}} </label>
                    {!! Form::text('medicoid',$turno->medico_id,['class'=>'form-control','id'=>'medicoid','readonly','hidden']) !!}
                </div>
                <div class="col-md-2">
                    <label>FECHA Y HORA: </label>
                    {!! Form::text('medicoid',$turno->medico_id,['class'=>'form-control','id'=>'medicoid','readonly','hidden']) !!}
                </div>
                <div class="col-md-2">
                    {!! Form::text('fechahora',$turno->fechahora,['class'=>'form-control','id'=>'fechahora','readonly']) !!}
                </div>

            </div>    
            <div class="row mt-1 mb-1">
                <div class="col-md-1">
                    <label>AFILIADO:</label>
                </div>
                <div class="col-md-2">
                    {!! Form::text('afiliado',$turno->afiliado,['class'=>'form-control','id'=>'afiliado','required']) !!}
                </div>
                @if ($turno->afiliado=="")                    
                    <div class="col-md-2">
                        <button type="button" value="{{$turno->id}}" class="edit_turno btn btn-primary">CHEQUEAR AFILIADO</button>
                    </div>
                @endif
                <div class="col-md-1">
                    {!! Form::text('padronid',$turno->padron_id,['class'=>'form-control','id'=>'padronid','readonly','hidden']) !!}
                </div>
            </div>    
            <div class="row mt-1 mb-1">
                <div class="col-md-1">
                    <label>APELLIDO:</label>
                </div>
                <div class="col-md-2">
                    {!! Form::text('apellido',$turno->apellido,['class'=>'form-control','readonly','id'=>'apellido']) !!}
                </div>
                <div class="col-md-1">
                    <label>NOMBRES:</label>
                </div>
                <div class="col-md-2">
                    {!! Form::text('apellido',$turno->nombres,['class'=>'form-control','readonly','id'=>'nombres']) !!}
                </div>
            </div>    
            <div class="row mt-1 mb-1">
                <div class="col-md-1">
                    <label>CONVENIO:</label>
                </div>
                @isset($turno->padron_id)
                    <div class="col-md-2">
                        {!! Form::text('convenio',$turno->convenio_nombre,['class'=>'form-control','readonly','id'=>'convenio']) !!}
                    </div>                    
                @else
                    <div class="col-md-2">
                        {!! Form::text('convenio','',['class'=>'form-control','readonly','id'=>'convenio']) !!}
                    </div>                    
                @endisset
                    
                <div class="col-md-1">
                    <label>DNI:</label>
                </div>
                @isset($turno->documento)
                    <div class="col-md-2">
                        {!! Form::text('dni',$turno->documento,['class'=>'form-control','readonly','id'=>'dni']) !!}
                    </div>
                @else
                    <div class="col-md-2">
                        {!! Form::text('dni','',['class'=>'form-control','readonly','id'=>'dni']) !!}
                    </div>                    
                @endisset
            </div>    
            <div class="row mt-1 mb-1">
                <div class="col-md-1">
                    <label>FECHA NACIMIENTO:</label>
                </div>
                @isset($turno->padron_id)
                    <div class="col-md-2">
                        {!! Form::text('fechanac',date('d/m/Y',strtotime($turno->padron->fechanac)),['class'=>'form-control','readonly','id'=>'fechanac']) !!}
                    </div>                    
                @else
                    <div class="col-md-2">
                        {!! Form::text('fechanac','',['class'=>'form-control','readonly','id'=>'fechanac']) !!}
                    </div>                    
                @endisset

                <div class="col-md-1">
                    <label>TELEFONO:</label>
                </div>
                <div class="col-md-2">
                    {!! Form::text('telefono',$turno->telefono,['class'=>'form-control','id'=>'telefono']) !!}
                </div>
            </div>    
            <div class="row mt-1 mb-1">
                <div class="col-md-1">
                    <label>OBSERVACIONES:</label>
                </div>
                <div class="col-md-2">
                    {!! Form::text('observaciones',$turno->observa,['class'=>'form-control','id'=>'observaciones']) !!}
                </div>
                @if ($turno->afiliado=="")                    
                    <div class="col-md-1">
                        <label>ENFERMERIA:</label>
                    </div>
                    <div class="col-md-1">
                        {!! Form::select('enfermeria',['SI' => 'S','NO'=>'N'],'S',['class'=>'form-control','id'=>'enfermeria']) !!}
                    </div>
                @endif    
            </div>   
            @if(empty($info))

                @isset($turno->afiliado)
                    <div class="row mt-3 mb-1">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-danger">BORRAR TURNO</button>
                        </div>
                        <div class="col-md-2 mb-1">
                            <button class="confirm_btn btn btn-success">CONFIRMAR ASISTENCIA</button>
                        </div>
                        <div class="col-md-2 mb-1">
                            <button class="sobre_btn btn btn-info">SOBRETURNO</button>
                        </div>
                    </div>                    
                @else
                    <div class="row mt-3 mb-1">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">GRABAR TURNO</button>
                        </div>
                        <div class="col-md-2">
                            <button class="delete_btn btn btn-danger">ELIMINAR TURNO</button>
                        </div>
                    </div>                    
                @endif
                
            @else
                <div class="row mt-3 mb-1">
                    <div class="col-md-2">
                        <a href="{{route('turnos.xafiliado')}}" class="btn btn-primary">VOLVER</a>
                    </div>
                </div>                    

            @endif
                
            {!! Form::close() !!}


        </div>   
@stop


@section('js')
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script>console.log(dayjs().format())</script>
    <script>

        $(document).on('click','.edit_turno', function(e){

            e.preventDefault();
            
            traerturno();

            function traerturno()
            {
                var tur_afi=$('#afiliado').val();
                console.log("afiliado:"+tur_afi);
                $.ajax({
                    type: "GET",
                    url: "/traer-turno/"+tur_afi,
                    dataType: "json",
                    success: function(response){
                        if(response['padron']==null){
                            // console.log('vacio');
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text('AFILIADO INEXISTENTE');
                            $('#apellido').val('');
                            $('#nombres').val('');
                            $('#dni').val('');
                            $('#fechanac').val('');
                            $('#convenio').val('');
                        }else{
                            console.log(response['padron']);
                            // console.log(response['padron'].apellido);
                            // console.log(response['padron'].documento);
                            $('#success_message').hide();
                            $('#apellido').val(response['padron'].apellido);
                            $('#nombres').val(response['padron'].nombres);
                            $('#dni').val(response['padron'].documento);
                            $('#fechanac').val(dayjs(response['padron'].fechanac).format('DD/MM/YYYY'));
                            $('#convenio').val(response['padron']['convenio'].convenio_nombre);
                            $('#padronid').val(response['padron'].id);
                        }

                    }
                })
            }

        });
        $(document).on('click','.confirm_btn', function(e){
            e.preventDefault();
            var tur_id=$('#turno_id').val();
            var tur_mid=$('#medicoid').val();
            console.log(tur_id);
            $.ajax({
                    type: "get",
                    url: "/turnos/confirmar/"+tur_id+"/"+tur_mid,
                    dataType: "json",
                    data:{
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        id: tur_id,
                        medico: tur_mid,
                    },
                    success: function(response){
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text('CONFIRMACION OK');
                        location.href="/turnos/xmedico";
                    }
            })                
        });    

        $(document).on('click','.delete_btn', function(e){
            e.preventDefault();
            var tur_id=$('#turno_id').val();
            console.log(tur_id);
            $.ajax({
                    type: "get",
                    url: "/turnos/eliminar/"+tur_id,
                    dataType: "json",
                    data:{
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        id: tur_id,
                    },
                    success: function(response){
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text('BORRADO OK');
                        location.href="/turnos/xmedico";
                    }
            })                
        });    

        $(document).on('click','.sobre_btn', function(e){
            e.preventDefault();
            var tur_fecha=$('#fechahora').val();
            var tur_mid=$('#medicoid').val();
            console.log(tur_fecha);
            $.ajax({
                    type: "get",
                    url: "/turnos/sobreturno/"+tur_mid+"/"+tur_fecha,
                    //url: "/turnos/sobreturno/"+tur_mid,
                    dataType: "json",
                    data:{
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        medico: tur_mid,
                        fecha: tur_fecha,
                    },
                    success: function(response){
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        console.log(response['turnos']);
                        location.href="/turnos/xmedico";
                    }
            })                
        });    

    </script>
@stop