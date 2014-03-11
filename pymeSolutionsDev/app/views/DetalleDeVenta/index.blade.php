@extends('layouts.scaffold')

@section('main')

<h1>All DetalleDeVenta</h1>

<p>{{ link_to_route('DetalleDeVenta.create', 'Add new DetalleDeVentum') }}</p>

@if ($DetalleDeVenta->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_DetalleDeVenta_id</th>
				<th>VEN_DetalleDeVenta_CantidadVendida</th>
				<th>VEN_DetalleDeVenta_PrecioVenta</th>
				<th>VEN_Venta_VEN_Venta_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($DetalleDeVenta as $DetalleDeVentum)
				<tr>
					<td>{{{ $DetalleDeVentum->VEN_DetalleDeVenta_id }}}</td>
					<td>{{{ $DetalleDeVentum->VEN_DetalleDeVenta_CantidadVendida }}}</td>
					<td>{{{ $DetalleDeVentum->VEN_DetalleDeVenta_PrecioVenta }}}</td>
					<td>{{{ $DetalleDeVentum->VEN_Venta_VEN_Venta_id }}}</td>
                    <td>{{ link_to_route('DetalleDeVenta.edit', 'Edit', array($DetalleDeVentum->VEN_DetalleDeVenta_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('DetalleDeVenta.destroy', $DetalleDeVentum->VEN_DetalleDeVenta_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no DetalleDeVenta
@endif

@stop
