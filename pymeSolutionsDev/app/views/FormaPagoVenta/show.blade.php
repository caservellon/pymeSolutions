@extends('layouts.scaffold')

@section('main')

<h1>Show FormaPagoVentum</h1>

<p>{{ link_to_route('FormaPagoVenta.index', 'Return to all FormaPagoVenta') }}</p>

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
                    <td>{{ link_to_route('FormaPagoVenta.edit', 'Edit', array($FormaPagoVentum->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('FormaPagoVenta.destroy', $FormaPagoVentum->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
