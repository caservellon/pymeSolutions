@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Movimiento de Inventario<small></h2>
<div class="btn-agregar">
	
</div>

<div class="alert alert-danger">
	<h2>No Hay Productos Registrados</h2>
</div>

<div class="pull-left">
	<a href="{{{ URL::route('Inventario.Productos.create') }}}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Nuevo Producto</a>
</div>
<div class="pull-right">
  <a href="{{{ URL::to('Inventario/MovimientoInventario') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>

@stop
