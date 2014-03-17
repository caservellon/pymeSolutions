@extends('layouts.scaffold')

@section('main')

<h1>Show DetalleMovimiento</h1>

<p>{{ link_to_route('Inventario.DetalleMovimiento.index', 'Return to all DetalleMovimientos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_DetalleMovimiento_ID</th>
				<th>INV_DetalleMovimiento_IDProducto</th>
				<th>INV_DetalleMovimiento_CodigoProducto</th>
				<th>INV_DetalleMovimiento_NombreProducto</th>
				<th>INV_DetalleMovimiento_CantidadProducto</th>
				<th>INV_DetalleMovimiento_PrecioCosto</th>
				<th>INV_DetalleMovimiento_PrecioVenta</th>
				<th>INV_DetalleMovimiento_FechaCreacion</th>
				<th>INV_DetalleMovimiento_UsuarioCreacion</th>
				<th>INV_DetalleMovimiento_FechaModificacion</th>
				<th>INV_DetalleMovimiento_UsuarioModificacion</th>
				<th>INV_Movimiento_ID</th>
				<th>INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID</th>
				<th>INV_Producto_INV_Producto_ID</th>
				<th>INV_Producto_INV_Categoria_ID</th>
				<th>INV_Producto_INV_Categoria_IDCategoriaPadre</th>
				<th>INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_ID }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_IDProducto }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_CodigoProducto }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_NombreProducto }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_CantidadProducto }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_PrecioCosto }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_PrecioVenta }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_FechaCreacion }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_UsuarioCreacion }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_FechaModificacion }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_UsuarioModificacion }}}</td>
					<td>{{{ $DetalleMovimiento->INV_Movimiento_ID }}}</td>
					<td>{{{ $DetalleMovimiento->INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID }}}</td>
					<td>{{{ $DetalleMovimiento->INV_Producto_INV_Producto_ID }}}</td>
					<td>{{{ $DetalleMovimiento->INV_Producto_INV_Categoria_ID }}}</td>
					<td>{{{ $DetalleMovimiento->INV_Producto_INV_Categoria_IDCategoriaPadre }}}</td>
					<td>{{{ $DetalleMovimiento->INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID }}}</td>
                    <td>{{ link_to_route('Inventario.DetalleMovimiento.edit', 'Edit', array($DetalleMovimiento->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.DetalleMovimiento.destroy', $DetalleMovimiento->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
