@extends('layouts.scaffold')

@section('main')

<h1>All DetalleDevoluciones</h1>

<p>{{ link_to_route('DetalleDevoluciones.create', 'Add new DetalleDevolucion') }}</p>

@if ($DetalleDevoluciones->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_DetalleDevolucion_id</th>
				<th>VEN_DetalleDevolucion_Cantidad</th>
				<th>VEN_Devolucion_VEN_Devolucion_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($DetalleDevoluciones as $DetalleDevolucion)
				<tr>
					<td>{{{ $DetalleDevolucion->VEN_DetalleDevolucion_id }}}</td>
					<td>{{{ $DetalleDevolucion->VEN_DetalleDevolucion_Cantidad }}}</td>
					<td>{{{ $DetalleDevolucion->VEN_Devolucion_VEN_Devolucion_id }}}</td>
                    <td>{{ link_to_route('DetalleDevoluciones.edit', 'Edit', array($DetalleDevolucion->VEN_DetalleDevolucion_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('DetalleDevoluciones.destroy', $DetalleDevolucion->VEN_DetalleDevolucion_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no DetalleDevoluciones
@endif

@stop
