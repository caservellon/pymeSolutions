@extends('layouts.scaffold')

@section('main')

<br>

<h1>Crear Ordenes de Compras</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<a href="/Compras/OrdenCompra/sinCotizacion/ListaProductos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span>Ordenes sin cotizacion</a>
        <a href="/Compras/OrdenCompra/conCotizacion/ListaCotizaciones" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Ordenes con Cotizacion</a>
	<!--<a href="/Compras/Cotizacions/editarParametrizar" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-pencil"></span> Editar Parametrizar Cotizacion</a>-->
<!--	<a href="/Ventas/AperturaCajas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Apertura de Cajas</a>
	<a href="/Ventas/Descuentos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Descuentos</a>-->
</div>


@stop
