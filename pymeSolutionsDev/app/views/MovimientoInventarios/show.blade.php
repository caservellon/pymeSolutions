@extends('layouts.scaffold')

@section('main')

<h1>Show MovimientoInventario</h1>

<p>{{ link_to_route('Inventario.MovimientoInventario.index', 'Return to all MovimientoInventarios') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_Movimiento_ID</th>
				<th>INV_Movimiento_Numero</th>
				<th>INV_Movimiento_IDTransaccion</th>
				<th>INV_Movimiento_IDOrdenCompra</th>
				<th>INV_Movimiento_Observaciones</th>
				<th>INV_Movimiento_FechaCreacion</th>
				<th>INV_Movimiento_UsuarioCreacion</th>
				<th>INV_Movimiento_FechaModificacion</th>
				<th>INV_Movimiento_UsuarioModificacion</th>
				<th>INV_MotivoMovimiento_INV_MotivoMovimiento_ID</th>
		</tr>
	</thead>

	<tbody>
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
                    <td>{{ link_to_route('Inventario.MovimientoInventario.edit', 'Edit', array($MovimientoInventario->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.MovimientoInventario.destroy', $MovimientoInventario->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
