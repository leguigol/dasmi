@extends('adminlte::page')

@section('title', 'DASMI')

@section('content_header')
    <h1>LISTA DE INTERNACIONES</h1>
@stop

@section('content')
    @livewire('internaciones-admin')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@if (session('borrar')=='S')  
    <script>
        Swal.fire(
            'BORRADO!',
            'La internacion ha sido borrada',
            'OK'
        )
    </script>
@endif
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formu-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'ESTAS SEGURO ?',
        text: "No vas a poder deshacer esta accion!",
        icon: 'Cuidado',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'CANCELAR',
        confirmButtonText: 'SI, BORRARLA!'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })

    });
</script>    
@stop