@extends('layouts.scaffold')

@section('main')

<br>

<h1>Configuración Principal Compras</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<a href="/Compras/Cotizacions/parametrizar" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-time"></span> Parametrizar Cotizacion</a>
	<a href="/Compras/Cotizacions/editarParametrizar" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Editar Parametrizar Cotizacion</a>
<!--	<a href="/Ventas/AperturaCajas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Apertura de Cajas</a>
	<a href="/Ventas/Descuentos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Descuentos</a>-->
</div>


@stop
