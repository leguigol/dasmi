@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>TURNOS POR AFILIADO</h1>
@stop

@section('content')
<div id="success_message" class="mt-1"></div>
{!! Form::open(['route' => 'turnos.listoxafiliado', 'method'=>'post']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">                
                {!! Form::label('Afiliado')!!}
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">                
                {!! Form::text('afiliado','',['class'=>'form-control','id'=>'afiliado']) !!}
            </div>    
            <div class="col-md-4">                
                {!! Form::text('nombre','',['class'=>'form-control','id'=>'nombres'])!!}
            </div>
            <div class="col-md-1">                
                {!! Form::text('id','',['class'=>'form-control','id'=>'iden'])!!}
            </div>
        </div>
        <div class="row mt-2">
            <div>
                <button type="button" value="" class="edit_turno btn btn-primary">CHEQUEAR AFILIADO</button>
            </div>    
        </div>    

    </div>        
    <div class="row">
        <div class="col md-4 p-2 m-3">
            <input type="submit" class="btn btn-success" value="LISTAR TURNOS">
        </div>          
    </div>
</div>    
{!! Form::close() !!}    

@stop

@section('css')
    {{-- <link rel="stylesheet" href="css/admin_custom.css'"> --}}
@stop
@section('js')
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
                    $('#afiliado').val('');
                }else{
                    console.log(response['padron']);
                    $('#success_message').hide();
                    $('#afiliado').val(response['padron'].afiliado);
                    $('#nombres').val(response['padron'].apellido+" "+response['padron'].nombres);
                    $('#iden').val(response['padron'].id);
                }

            }
        })
    }
});
</script>
@stop

