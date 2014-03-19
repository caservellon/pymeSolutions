@extends('layouts.scaffold')

@section('main')

<h1>All OrdenCompras</h1>

<p>{{ link_to_route('Compras.OrdenCompras.create', 'Add new OrdenCompra') }}</p>

@if ($OrdenCompras->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>COM_OrdenCompra_IdOrdenCompra</th>
				<th>COM_OrdenCompra_Codigo</th>
				<th>COM_OrdenCompra_FechaEmision</th>
				<th>COM_OrdenCompra_FechaEntrega</th>
				<th>COM_OrdenCompra_DireccionEntrega</th>
				<th>COM_OrdenCompra_Activo</th>
				<th>COM_OrdenCompra_Total</th>
				<th>COM_OrdenCompra_FechaCreacion</th>
				<th>COM_OrdenCompra_FechaModificacion</th>
				<th>COM_Cotizacion_IdCotizacion</th>
				<th>COM_Usuario_IdUsuarioCreo</th>
				<th>COM_Proveedor_IdProveedor</th>
				<th>Usuario_idUsuarioModifico</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($OrdenCompras as $OrdenCompra)
				<tr>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_IdOrdenCompra }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_Codigo }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_FechaEmision }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_FechaEntrega }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_DireccionEntrega }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_Activo }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_Total }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_FechaCreacion }}}</td>
					<td>{{{ $OrdenCompra->COM_OrdenCompra_FechaModificacion }}}</td>
					<td>{{{ $OrdenCompra->COM_Cotizacion_IdCotizacion }}}</td>
					<td>{{{ $OrdenCompra->COM_Usuario_IdUsuarioCreo }}}</td>
					<td>{{{ $OrdenCompra->COM_Proveedor_IdProveedor }}}</td>
					<td>{{{ $OrdenCompra->Usuario_idUsuarioModifico }}}</td>
                    <td>{{ link_to_route('OrdenCompras.edit', 'Edit', array($OrdenCompra->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('OrdenCompras.destroy', $OrdenCompra->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no OrdenCompras
@endif

@stop
