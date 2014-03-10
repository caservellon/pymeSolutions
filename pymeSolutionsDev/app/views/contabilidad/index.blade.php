@extends('layouts.scaffold')

@section('main')

<h1 align="center">CONTABILIDAD</h1>

<div class='jumbotron' align="center" style="border:3px solid #white; background:white;">
	<a class='btn btn-lg' href="{{URL::to('contabilidad/agregar/asiento')}}"><span class="glyphicon glyphicon-edit"></span><br> Crear Asiento</a>
	<a class='btn btn-lg' href="{{URL::to('contabilidad/librodiario')}}"><span class="glyphicon glyphicon-book"></span><br> Libro Diario</a>
	<a class='btn btn-lg' href="{{URL::to('contabilidad/configuracion')}}"><span class="glyphicon glyphicon-cog"></span><br>Configuracion</a>

</div>
@stop