@extends('layouts.scaffold')

@section('main')
<br>

<h1><i class="glyphicon glyphicon-list"></i>
	 Menu Principal Contabilidad</h1>
<br>


<div class="well" style="max-width: 400px; margin:10px; //background-color:#7fb87f;">
	<a href="{{URL::to('contabilidad/crear/asientocontable')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-edit"></span><br> Crear Asiento</a>
	<a href="{{URL::to('contabilidad/librodiario')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-book"></span><br> Libro Diario</a>
	<a href="{{URL::route('con.cierreperiodo')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-time"></span><br>Cierre de Periodo</a>
	<a href="{{URL::route('con.compras')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-shopping-cart"></span><br>Compras - Ordenes de pago</a>
	<a href="{{URL::to('contabilidad/configuracion')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-cog"></span><br>Configuracion</a>
	
</div>
@stop