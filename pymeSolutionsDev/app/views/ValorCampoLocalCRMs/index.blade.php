@extends('layouts.scaffold')

@section('main')

<h1>All ValorCampoLocalCRMs</h1>

<p>{{ link_to_route('ValorCampoLocalCRMs.create', 'Add new ValorCampoLocalCRM') }}</p>

@if ($ValorCampoLocalCRMs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CRM_ValorCampoLocal_ID</th>
				<th>CRM_ValorCampoLocal_Valor</th>
				<th>CRM_ValorCampoLocal_Creacion</th>
				<th>CRM_ValorCampoLocal_Modificacion</th>
				<th>CRM_ValorCampoLocal_Usuario</th>
				<th>GEN_CampoLocal_GEN_CampoLocal_ID</th>
				<th>CRM_Empresas_CRM_Empresas_ID</th>
				<th>CRM_Personas_CRM_Personas_ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ValorCampoLocalCRMs as $ValorCampoLocalCRM)
				<tr>
					<td>{{{ $ValorCampoLocalCRM->CRM_ValorCampoLocal_ID }}}</td>
					<td>{{{ $ValorCampoLocalCRM->CRM_ValorCampoLocal_Valor }}}</td>
					<td>{{{ $ValorCampoLocalCRM->CRM_ValorCampoLocal_Creacion }}}</td>
					<td>{{{ $ValorCampoLocalCRM->CRM_ValorCampoLocal_Modificacion }}}</td>
					<td>{{{ $ValorCampoLocalCRM->CRM_ValorCampoLocal_Usuario }}}</td>
					<td>{{{ $ValorCampoLocalCRM->GEN_CampoLocal_GEN_CampoLocal_ID }}}</td>
					<td>{{{ $ValorCampoLocalCRM->CRM_Empresas_CRM_Empresas_ID }}}</td>
					<td>{{{ $ValorCampoLocalCRM->CRM_Personas_CRM_Personas_ID }}}</td>
                    <td>{{ link_to_route('ValorCampoLocalCRMs.edit', 'Edit', array($ValorCampoLocalCRM->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ValorCampoLocalCRMs.destroy', $ValorCampoLocalCRM->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no ValorCampoLocalCRMs
@endif

@stop
