@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content_header')
    <h1>GRILLA DE TURNOS</h1>
@stop

@section('content')

<div class="container bg-white text-black">
    <div id="turnos"></div>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evento">
    Launch
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Turnos</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" name="formu" id="formu">

                @csrf
                <span id="titleError" class="text-danger"></span>
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" id="id" readonly>
                </div>    
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Escribe el titulo del evento">
                </div>    
                <div class="form-group">
                    <label for="telephone">Telefono</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Escribe el telefono">
                </div>    
                <div class="form-group">
                    <label for="start">Empieza</label>
                    <input type="text" class="form-control" name="start" id="start" placeholder="">
                </div>    
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
            <button type="button" class="btn btn-danger" id="btnBorrar">Borrar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@stop


@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/es.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         
        var turnos= @json($events);
        console.log(turnos);
        $("#turnos").fullCalendar({
            
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            lang: 'es',
            events: turnos,
            selectable: true,
            selectHelper: true,
            // defaultView: 'agendaWeek',
            select: function(start, end, allDays){
                $('#evento').modal('toggle');
                $('#btnGuardar').click(function(){
                    var title=$('#title').val();
                    var start_date=moment(start).format('YYYY-MM-DD');
                    var end_date=moment(end).format('YYYY-MM-DD');
                    // console.log(start_date);
                    $.ajax({
                        url:"{{ route('turnos.store')}}",
                        type:"POST",
                        dataType:'json',
                        data:{ title, start_date, end_date },   
                        success:function(response)
                        {
                            $('#evento').modal('hide');
                            $('#turnos').fullCalendar('renderEvent', {
                                'title': title,
                                'start': start_date,
                                'end': end_date,
                                
                            });

                        },
                        error:function(error)
                        {
                            if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        },
                    });
                });
            },
            editable: true,
            eventDrop: function(event){
                var id=event.id;
                var start_date=moment(event.start).format('YYYY-MM-DD');
                var end_date=moment(event.end).format('YYYY-MM-DD');                 

                $.ajax({
                        url:"{{ route('turnos.update', '')}}"+'/'+id,
                        type:"PATCH",
                        dataType:'json',
                        data:{ start_date, end_date },   
                        success:function(response)
                        {
                            swal("Good job!","Event Updated !","success");

                        },
                        error:function(error)
                        {
                            console.log(error)
                        },
                });
            },
            eventClick: function(event){
                var id=event.id;
                var start_date=moment(event.start).format('YYYY-MM-DD HH:mm');
                var end_date=moment(event.end).format('YYYY-MM-DD HH:mm');                 
                $('#id').val(id);
                $('#start').val(start_date);
                $('#evento').modal('toggle');
                $('#btnGuardar').click(function(){
                    var title=$('#title').val();
                    var start_date=moment(start).format('YYYY-MM-DD');
                    var end_date=moment(end).format('YYYY-MM-DD');
                    // console.log(start_date);
                    $.ajax({
                        url:"{{ route('turnos.store')}}",
                        type:"POST",
                        dataType:'json',
                        data:{ id,title, start_date, end_date },   
                        success:function(response)
                        {
                            $('#evento').modal('hide');
                            $('#turnos').fullCalendar('renderEvent', {
                                'title': title,
                                'start': start_date,
                                'end': end_date,
                                
                            });

                        },
                        error:function(error)
                        {
                            if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        },
                    });
                });
            },
            selectAllow: function(event){
                return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
            }
        })

    });
</script>
@stop