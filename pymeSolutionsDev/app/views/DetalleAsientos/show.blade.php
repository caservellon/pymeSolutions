@extends('layouts.scaffold')

@section('main')

<h1>Show DetalleAsiento</h1>

<p>{{ link_to_route('DetalleAsientos.index', 'Return to all DetalleAsientos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>CON_DetalleAsiento_ID</th>
				<th>CON_DetalleAsiento_Monto</th>
				<th>CON_DetalleAsiento_FechaCreacion</th>
				<th>CON_DetalleAsiento_FechaModificacion</th>
				<th>CON_MotivoTransaccion_ID</th>
				<th>CON_LibroDiario_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $DetalleAsiento->CON_DetalleAsiento_ID }}}</td>
					<td>{{{ $DetalleAsiento->CON_DetalleAsiento_Monto }}}</td>
					<td>{{{ $DetalleAsiento->CON_DetalleAsiento_FechaCreacion }}}</td>
					<td>{{{ $DetalleAsiento->CON_DetalleAsiento_FechaModificacion }}}</td>
					<td>{{{ $DetalleAsiento->CON_MotivoTransaccion_ID }}}</td>
					<td>{{{ $DetalleAsiento->CON_LibroDiario_ID }}}</td>
                    <td>{{ link_to_route('DetalleAsientos.edit', 'Edit', array($DetalleAsiento->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('DetalleAsientos.destroy', $DetalleAsiento->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
