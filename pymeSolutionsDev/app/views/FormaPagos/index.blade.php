@extends('layouts.scaffold')

@section('main')

<h1>All FormaPagos</h1>

<p>{{ link_to_route('Inventario.FormaPagos.create', 'Add new FormaPago') }}</p>

@if ($FormaPagos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>INV_FormaPago_ID</th>
				<th>INV_FormaPago_Nombre</th>
				<th>INV_FormaPago_Efectivo</th>
				<th>INV_FormaPago_Credito</th>
				<th>INV_FormaPago_DiasCredito</th>
				<th>INV_FormaPago_FechaCreacion</th>
				<th>INV_FormaPago_UsuarioCreacion</th>
				<th>INV_FormaPago_FechaModificacion</th>
				<th>INV_FormaPago_UsuarioModificacion</th>
				<th>INV_FormaPago_Activo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($FormaPagos as $FormaPago)
				<tr>
					<td>{{{ $FormaPago->INV_FormaPago_ID }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Nombre }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Efectivo }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Credito }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_DiasCredito }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_FechaCreacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_UsuarioCreacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_FechaModificacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_UsuarioModificacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Activo }}}</td>
                    <td>{{ link_to_route('Inventario.FormaPagos.edit', 'Edit', array($FormaPago->INV_FormaPago_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.FormaPagos.destroy', $FormaPago->INV_FormaPago_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no FormaPagos
@endif

@stop
