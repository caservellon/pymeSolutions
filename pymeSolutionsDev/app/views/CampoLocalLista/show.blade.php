@extends('layouts.scaffold')

@section('main')

<h1>Show CampoLocalLista</h1>

<p>{{ link_to_route('CampoLocalLista.index', 'Return to all CampoLocalLista') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>GEN_CampoLocalLista_ID</th>
				<th>GEN_CampoLocalLista_Valor</th>
				<th>GEN_CampoLocal_GEN_CampoLocal_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $CampoLocalLista->GEN_CampoLocalLista_ID }}}</td>
					<td>{{{ $CampoLocalLista->GEN_CampoLocalLista_Valor }}}</td>
					<td>{{{ $CampoLocalLista->GEN_CampoLocal_GEN_CampoLocal_ID }}}</td>
                    <td>{{ link_to_route('CampoLocalLista.edit', 'Edit', array($CampoLocalLista->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CampoLocalLista.destroy', $CampoLocalLista->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
