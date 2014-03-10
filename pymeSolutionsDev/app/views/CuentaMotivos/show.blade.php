@extends('layouts.scaffold')

@section('main')

<h1>Show CuentaMotivo</h1>

<p>{{ link_to_route('CuentaMotivos.index', 'Return to all CuentaMotivos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>CON_CuentaMotivo_DebeHaber</th>
				<th>CON_MotivoTransaccion_ID</th>
				<th>CON_CatalogoContable_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $CuentaMotivo->CON_CuentaMotivo_DebeHaber }}}</td>
					<td>{{{ $CuentaMotivo->CON_MotivoTransaccion_ID }}}</td>
					<td>{{{ $CuentaMotivo->CON_CatalogoContable_ID }}}</td>
                    <td>{{ link_to_route('CuentaMotivos.edit', 'Edit', array($CuentaMotivo->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CuentaMotivos.destroy', $CuentaMotivo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
