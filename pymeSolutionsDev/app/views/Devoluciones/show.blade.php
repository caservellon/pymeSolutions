@extends('layouts.scaffold')

@section('main')

<h1>Show Devolucion</h1>

<p>{{ link_to_route('Ventas.Devoluciones.index', 'Return to all Devoluciones') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>VEN_Devolucion_id</th>
				<th>VEN_Devolucion_Codigo</th>
				<th>VEN_Devolucion_Monto</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Devolucion->VEN_Devolucion_id }}}</td>
					<td>{{{ $Devolucion->VEN_Devolucion_Codigo }}}</td>
					<td>{{{ $Devolucion->VEN_Devolucion_Monto }}}</td>
                    <td>{{ link_to_route('Ventas.Devoluciones.edit', 'Edit', array($Devolucion->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.Devoluciones.destroy', $Devolucion->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
