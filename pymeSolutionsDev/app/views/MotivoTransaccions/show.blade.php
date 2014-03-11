@extends('layouts.scaffold')

@section('main')

<h1>Show MotivoTransaccion</h1>

<p>{{ link_to_route('MotivoTransaccions.index', 'Return to all MotivoTransaccions') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>CON_MotivoTransaccion_Codigo</th>
				<th>CON_MotivoTransaccion_Descripcion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $MotivoTransaccion->CON_MotivoTransaccion_Codigo }}}</td>
					<td>{{{ $MotivoTransaccion->CON_MotivoTransaccion_Descripcion }}}</td>
                    <td>{{ link_to_route('MotivoTransaccions.edit', 'Edit', array($MotivoTransaccion->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('MotivoTransaccions.destroy', $MotivoTransaccion->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
