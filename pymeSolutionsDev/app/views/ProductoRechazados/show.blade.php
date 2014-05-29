@extends('layouts.scaffold')

@section('main')

<h1>Show ProductoRechazado</h1>

<p>{{ link_to_route('ProductoRechazados.index', 'Return to all ProductoRechazados') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_ProductoRechazado_ID</th>
				<th>INV_ProductoRechazado_IDOrdenCompra</th>
				<th>INV_ProductoRechazado_IDProducto</th>
				<th>INV_ProductoRechazado_Cantidad</th>
				<th>INV_ProductoRechazado_PrecioCosto</th>
				<th>INV_ProductoRechazado_PrecioVenta</th>
				<th>INV_ProductoRechazado_Activo</th>
				<th>INV_ProductoRechazado_FechaCreacion</th>
				<th>INV_ProductoRechazado_UsuarioCreacion</th>
				<th>INV_ProductoRechazado_FechaModificacion</th>
				<th>INV_ProductoRechazado_UsuarioModificacion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $ProductoRechazado->INV_ProductoRechazado_ID }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_IDOrdenCompra }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_IDProducto }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_Cantidad }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_PrecioCosto }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_PrecioVenta }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_Activo }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_FechaCreacion }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_UsuarioCreacion }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_FechaModificacion }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_UsuarioModificacion }}}</td>
                    <td>{{ link_to_route('ProductoRechazados.edit', 'Edit', array($ProductoRechazado->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ProductoRechazados.destroy', $ProductoRechazado->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
