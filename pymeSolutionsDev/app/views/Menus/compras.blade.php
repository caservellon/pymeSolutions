@extends('layouts.scaffold')

@section('main')

<br>

<h1>Configuración Principal Ventas</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<a href="/Compras/Configuracion/EstadoOrden/Nuevo" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-time"></span> Nuevo Estado</a>
	<a href="/Compras/Configuracion/EstadoOrden/Lista" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Modificar Estado</a>
	<a href="/Compras/Configuracion/TransicionEstado/ListaEstados" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Nueva Transicion</a>
	<a href="/Compras/Configuracion/TransicionEstado/Lista" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Editar Transicion</a>
        <a href="/Compras/OrdenCompra/sinCotizacion/ListaProductos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Crear Orden Compra</a>
        <a href="/Compras/OrdenCompra/Autorizacion/ListaOrdenes" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Autorizar Orden Compra</a>
        <a href="/Compras/OrdenCompra/Autorizacion/ListarOrdenes" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Administrar Orden Compra</a>
        <a href="/Compras/OrdenCompra/Historial/ListarOrdenes" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Historial Ordenes de  Compras</a>
        <a href="/Compras/OrdenCompra/conCotizacion/ListaCotizaciones" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Crear Ordenes de  Compras por Cotizacion</a>
</div>


@stop

