@extends('adminlte::page')

@section('title', 'DASMI')

@section('content_header')
    <h1>LISTA DE MEDICOS</h1>
@stop

@section('content')
    @livewire('admin.medicos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop