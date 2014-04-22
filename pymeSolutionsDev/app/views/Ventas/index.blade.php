@extends('layouts.scaffold')

@section('main')

<h1>All Venta</h1>

<p>{{ link_to_route('Ventas.Ventas.create', 'Crear Nueva Venta') }}</p>

@stop
