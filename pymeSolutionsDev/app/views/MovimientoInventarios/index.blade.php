@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Movimiento de Inventario<small></h2>

@if (Session::has('message'))
    <div class="alert alert-info fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
    </div>
@endif

<div class="btn-agregar" style="text-align: center; margin-top:10%">
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.Entrada') }}" class="btn btn-primary" style="width:200px; height:200px; padding-top: 3%">
	  <img src="/images/get-128.png"><br> Entradas de Inventario
	</a>
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.Salida') }}" class="btn btn-success" style="width:200px; height:200px; margin-left:5%; padding-top: 3%">
	  <img src="/images/open.png"><br> Salidas de Inventario
	</a>
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.Orden') }}" class="btn btn-info" style="width:200px; height:200px; margin-left:5%; padding-top: 3%">
	  <img src="/images/orden.png"><br> Registrar Orden de Compra
	</a>
</div>
@stop
