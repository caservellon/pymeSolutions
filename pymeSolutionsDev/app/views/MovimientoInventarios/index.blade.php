@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Movimiento de Inventario<small></h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-save"></span> Nueva Entrada Inventario
	</a>
	<a type="button" href="{{ URL::route('Inventario.SalidaInventario.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-open"></span> Nueva Salida Inventario
	</a>
</div>

@if ($MovimientoInventarios->count())
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>ID Orden Compra</th>
				<th>Observaciones</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Motivo Movimiento</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($MovimientoInventarios as $MovimientoInventario)
				<tr>
					<td>{{{ $MovimientoInventario->INV_Movimiento_ID }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_IDOrdenCompra }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_Observaciones }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_FechaCreacion }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_UsuarioCreacion }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_FechaModificacion }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_UsuarioModificacion }}}</td>
					<td>{{{ $Motivos[$MovimientoInventario->INV_MotivoMovimiento_INV_MotivoMovimiento_ID-1]->INV_MotivoMovimiento_Nombre }}}</td>
                    <td>{{ link_to_route('Inventario.MovimientoInventario.Detalles', 'Detalles', array($MovimientoInventario->INV_Movimiento_ID), array('class' => 'btn btn-info')) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@else
	<div class="alert alert-danger">
		<h3>No Hay Movimientos en el Inventario</h3>
	</div>
@endif

@stop
