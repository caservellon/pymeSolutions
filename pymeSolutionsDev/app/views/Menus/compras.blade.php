@extends('layouts.scaffold')

@section('main')

<br>

<h1>Configuración Principal Compras</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">

	<a href="/Compras/CampoLocal" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Agregar Campos Locales</a>
<!--        <a href="/Compras/Configuracion" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Parametrizar Orden Compra</a>-->
	<!--<a href="/Compras/Cotizacions/editarParametrizar" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-pencil"></span> Editar Parametrizar Cotizacion</a>-->
<!--	<a href="/Ventas/AperturaCajas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Apertura de Cajas</a>
	<a href="/Ventas/Descuentos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Descuentos</a>-->

	<a href="/Compras/Configuracion/EstadoOrden/Nuevo" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-time"></span> Nuevo Estado</a>
	<a href="/Compras/Configuracion/EstadoOrden/Lista" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Modificar Estado</a>
	<a href="/Compras/Configuracion/TransicionEstado/ListaEstados" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Nueva Transicion</a>
	<a href="/Compras/Configuracion/TransicionEstado/Lista" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Editar Transicion</a>

</div>


@stop