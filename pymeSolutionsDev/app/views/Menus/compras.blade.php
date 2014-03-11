@extends('layouts.scaffold')

@section('main')

<br>

<h1>Configuración Principal Compras</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<a href="/Ventas/PeriodoCierreDeCajas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-time"></span> Periodo de Cierre de Cajas</a>
	<a href="/Ventas/Cajas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Cajas</a>
	<a href="/Ventas/AperturaCajas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Apertura de Cajas</a>
	<a href="/Ventas/Descuentos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Descuentos</a>
</div>


@stop
