@extends('layouts.scaffold')

@section('main')

<h1>Show MotivoInventario</h1>

<p>{{ link_to_route('MotivoInventarios.index', 'Return to all MotivoInventarios') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>CON_MotivoInventario_ID</th>
				<th>CON_MotivoTransaccion_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $MotivoInventario->CON_MotivoInventario_ID }}}</td>
					<td>{{{ $MotivoInventario->CON_MotivoTransaccion_ID }}}</td>
                    <td>{{ link_to_route('MotivoInventarios.edit', 'Edit', array($MotivoInventario->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('MotivoInventarios.destroy', $MotivoInventario->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
