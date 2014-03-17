@extends('layouts.scaffold')

@section('main')

<h1>Show TipoDocumento</h1>

<p>{{ link_to_route('TipoDocumentos.index', 'Return to all TipoDocumentos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Validación</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $TipoDocumento->CRM_TipoDocumento_ID }}}</td>
					<td>{{{ $TipoDocumento->CRM_TipoDocumento_Codigo }}}</td>
					<td>{{{ $TipoDocumento->CRM_TipoDocumento_Nombre }}}</td>
					<td>{{{ $TipoDocumento->CRM_TipoDocumento_Validacion }}}</td>
                    <td>{{ link_to_route('TipoDocumentos.edit', 'Edit', array($TipoDocumento->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('TipoDocumentos.destroy', $TipoDocumento->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
