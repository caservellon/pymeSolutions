@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Movimiento de Inventario<small></h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.MovimientoInventario.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Nueva Entrada Inventario
	</a>
	<a type="button" href="{{ URL::to('#') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Nueva Salida Inventario
	</a>
</div>

@if ($MovimientoInventarios->count())
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Numero</th>
				<th>ID Transaccion</th>
				<th>ID Orden Compra</th>
				<th>Observaciones</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Motivo Movimiento ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($MovimientoInventarios as $MovimientoInventario)
				<tr>
					<td>{{{ $MovimientoInventario->INV_Movimiento_ID }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_Numero }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_IDTransaccion }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_IDOrdenCompra }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_Observaciones }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_FechaCreacion }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_UsuarioCreacion }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_FechaModificacion }}}</td>
					<td>{{{ $MovimientoInventario->INV_Movimiento_UsuarioModificacion }}}</td>
					<td>{{{ $MovimientoInventario->INV_MotivoMovimiento_INV_MotivoMovimiento_ID }}}</td>
                    <td>{{ link_to_route('Inventario.MovimientoInventario.edit', 'Edit', array($MovimientoInventario->INV_Movimiento_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.MovimientoInventario.destroy', $MovimientoInventario->INV_Movimiento_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
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
