@extends('adminlte::page')

@section('title', 'DASMI')

@section('content_header')
    <h1>LISTA DE AFILIADOS</h1>
@stop

@section('content')
    @livewire('internaciones-preview')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop