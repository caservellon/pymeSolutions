@extends('layouts.scaffold')

@section('main')

<h1>All Proveedor</h1>

<p>{{ link_to_route('Inventario.Proveedor.create', 'Add new Proveedor') }}</p>

@if ($Proveedor->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>INV_Proveedor_ID</th>
				<th>INV_Proveedor_Codigo</th>
				<th>INV_Proveedor_Nombre</th>
				<th>INV_Proveedor_Direccion</th>
				<th>INV_Proveedor_Telefono</th>
				<th>INV_Proveedor_Email</th>
				<th>INV_Proveedor_PaginaWeb</th>
				<th>INV_Proveedor_RepresentanteVentas</th>
				<th>INV_Proveedor_TelefonoRepresentanteVentas</th>
				<th>INV_Proveedor_Comentarios</th>
				<th>INV_Proveedor_RutaImagen</th>
				<th>INV_Proveedor_FechaCreacion</th>
				<th>INV_Proveedor_UsuarioCreacion</th>
				<th>INV_Proveedor_FechaModificacion</th>
				<th>INV_Proveedor_UsuarioModificacion</th>
				<th>INV_Proveedor_Activo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Proveedor as $Proveedor)
				<tr>
					<td>{{{ $Proveedor->INV_Proveedor_ID }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Codigo }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Nombre }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Direccion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Telefono }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Email }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_PaginaWeb }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_RepresentanteVentas }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_TelefonoRepresentanteVentas }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Comentarios }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_RutaImagen }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_FechaCreacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_UsuarioCreacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_FechaModificacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_UsuarioModificacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Activo }}}</td>
                    <td>{{ link_to_route('Inventario.Proveedor.edit', 'Edit', array($Proveedor->INV_Proveedor_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Proveedor.destroy', $Proveedor->INV_Proveedor_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Proveedor
@endif

@stop
