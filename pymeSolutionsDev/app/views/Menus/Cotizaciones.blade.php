@extends('layouts.scaffold')

@section('main')

<br>

<h1>Cotizaciones</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<a href="/Compras/Cotizaciones/CapturarCotizacion" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-camera"></span> Capturar Cotizacion</a>
    <a href="/Compras/Cotizaciones/TodasCotizaciones" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-list-alt"></span> Mostrar Cotizaciones</a>
	<a href="/Compras/Cotizaciones/HabilitarInhabilitar" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-check"></span> Habilitar/Inhabilitar</a>
</div>


@stop