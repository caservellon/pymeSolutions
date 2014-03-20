@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Movimiento de Inventario<small></h2>

<div class="btn-agregar" style="text-align: center; margin-top:10%">
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.Entrada') }}" class="btn btn-primary" style="width:200px; height:200px; padding-top: 3%">
	  <img src="/images/get-128.png"><br> Entradas de Inventario
	</a>
	<a src="/images/get-128.png" type="button" href="{{ URL::route('Inventario.MovimientoInventario.Salida') }}" class="btn btn-success" style="width:200px; height:200px; margin-left:5%; padding-top: 3%">
	  <img src="/images/open.png"><br> Salidas de Inventario
	</a>
</div>
@stop
