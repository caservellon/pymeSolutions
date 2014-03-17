@extends('layouts.scaffold')

@section('main')

<h1>All TipoDocumentos</h1>

<p>{{ link_to_route('TipoDocumentos.create', 'Add new TipoDocumento') }}</p>

@if ($TipoDocumentos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CRM_TipoDocumento_ID</th>
				<th>CRM_TipoDocumento_Codigo</th>
				<th>CRM_TipoDocumento_Nombre</th>
				<th>CRM_TipoDocumento_Validacion</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($TipoDocumentos as $TipoDocumento)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no TipoDocumentos
@endif

@stop
