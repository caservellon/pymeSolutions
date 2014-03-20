@extends('layouts.scaffold')

@section('main')

<h1>Show FormaPagoVentum</h1>

<p>{{ link_to_route('Ventas.FormaPagoVenta.index', 'Return to all FormaPagoVenta') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>VEN_FormaPago_id</th>
				<th>VEN_FormaPago_Descripcion</th>
				<th>VEN_FormaPago_TimeStamp</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $FormaPagoVentum->VEN_FormaPago_id }}}</td>
					<td>{{{ $FormaPagoVentum->VEN_FormaPago_Descripcion }}}</td>
					<td>{{{ $FormaPagoVentum->VEN_FormaPago_TimeStamp }}}</td>
                    <td>{{ link_to_route('Ventas.FormaPagoVenta.edit', 'Edit', array($FormaPagoVentum->VEN_FormaPago_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.FormaPagoVenta.destroy', $FormaPagoVentum->VEN_FormaPago_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
