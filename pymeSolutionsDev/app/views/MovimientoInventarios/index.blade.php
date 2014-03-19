@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Movimiento de Inventario<small></h2>

<div class="btn-agregar" style="">
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.Entrada') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-save"></span> Entradas de Inventario
	</a>
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.Salida') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-open"></span> Salidas de Inventario
	</a>
</div>

@stop
