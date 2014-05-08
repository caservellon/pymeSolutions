@extends('layouts.scaffold')

@section('main')

<h1 align="center">Configuracion Contabilidad</h1>
<a class="btn btn-danger" href="{{URL::previous()}}">Atras</a>
<br>
<div class='jumbotron' align="center" style="border:3px solid #white; background:white;">
	<a class='btn btn-lg' href="{{URL::to('contabilidad/configuracion/catalogocuentas')}}">
		<span class="glyphicon glyphicon-list-alt"></span><br>Catalogo de Cuentas</a>
	<a class='btn btn-lg' href="{{URL::to('contabilidad/configuracion/periodocontable')}}">
		<span class="glyphicon glyphicon-calendar"></span><br> Configuracion Periodo Contable</a>
	<a class='btn btn-lg' href="{{URL::to('contabilidad/configuracion/unidadmonetaria')}}">
		<span class="glyphicon glyphicon-euro"></span><br> Unidad Monetaria</a>

</div>
@stop