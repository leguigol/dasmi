<div>
    
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
        <div class="container">
            <div class="row">
                <div class="col md-4">
                    id:{{$turno->id}}   
                </div>
                <div class="col md-4">
                    centro id:{{Auth::user()->centro->id}}   
                </div>
            </div>        
        </div>
    @stop


    @section('js')

    @stop

</div>
