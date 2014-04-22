@extends('layouts.scaffold')

@section('main')
<br>

<h1 class="alert alert-success " style="max-width:60%;"><i class="glyphicon glyphicon-usd"></i>
	 Menu Principal Contabilidad</h1>
<br>

<div class="well" style="max-width: 400px; margin:10px; //background-color:#7fb87f;">
	<a href="{{URL::to('contabilidad/crear/asientocontable')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-edit"></span><br> Crear Asiento</a>
	<a href="{{URL::to('contabilidad/librodiario')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-book"></span><br> Libro Diario</a>
	<a href="{{URL::to('contabilidad/configuracion')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-cog"></span><br>Configuracion</a>
</div>
@stop