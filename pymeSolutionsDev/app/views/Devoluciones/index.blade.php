@extends('layouts.scaffold')

@section('main')

<h1>All Devoluciones</h1>


@if ($Devoluciones->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_Devolucion_id</th>
				<th>VEN_Devolucion_Codigo</th>
				<th>VEN_Devolucion_Monto</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Devoluciones as $Devolucion)
				<tr>
					<td>{{{ $Devolucion->VEN_Devolucion_id }}}</td>
					<td>{{{ $Devolucion->VEN_Devolucion_Codigo }}}</td>
					<td>{{{ $Devolucion->VEN_Devolucion_Monto }}}</td>
                    <td>{{ link_to_route('Ventas.Devoluciones.edit', 'Edit', array($Devolucion->VEN_Devolucion_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.Devoluciones.destroy', $Devolucion->VEN_Devolucion_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Devoluciones
@endif

@stop
