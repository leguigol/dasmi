@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>LISTA DE USUARIOS</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop