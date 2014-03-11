@extends('layouts.scaffold')

@section('main')

<h1>All DetalleAsientos</h1>

<a class="btn btn-primary" href="{{ URL::to('detalleasientos/create') }}">Crear Nuevo</a>

@if ($DetalleAsientos->count())
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
			@foreach ($DetalleAsientos as $DetalleAsiento)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no DetalleAsientos
@endif

@stop
