@extends('adminlte::page')
@section('title', 'Dashboard')




@section('content_header')
    <h1>Panel de administración</h1>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        Swal.fire(
            'Bienvenido!',
            'Click en el botón para cerrar!',
            'success'
        );

    </script>

@stop
