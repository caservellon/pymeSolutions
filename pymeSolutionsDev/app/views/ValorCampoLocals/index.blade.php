@extends('layouts.scaffold')

@section('main')

<h1>All ValorCampoLocals</h1>

<p>{{ link_to_route('ValorCampoLocals.create', 'Add new ValorCampoLocal') }}</p>

@if ($ValorCampoLocals->count())
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
			@foreach ($ValorCampoLocals as $ValorCampoLocal)
				<tr>
					<td>{{{ $ValorCampoLocal->CRM_ValorCampoLocal_ID }}}</td>
					<td>{{{ $ValorCampoLocal->CRM_ValorCampoLocal_Valor }}}</td>
					<td>{{{ $ValorCampoLocal->CRM_ValorCampoLocal_Creacion }}}</td>
					<td>{{{ $ValorCampoLocal->CRM_ValorCampoLocal_Modificacion }}}</td>
					<td>{{{ $ValorCampoLocal->CRM_ValorCampoLocal_Usuario }}}</td>
					<td>{{{ $ValorCampoLocal->GEN_CampoLocal_GEN_CampoLocal_ID }}}</td>
					<td>{{{ $ValorCampoLocal->CRM_Empresas_CRM_Empresas_ID }}}</td>
					<td>{{{ $ValorCampoLocal->CRM_Personas_CRM_Personas_ID }}}</td>
                    <td>{{ link_to_route('ValorCampoLocals.edit', 'Edit', array($ValorCampoLocal->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ValorCampoLocals.destroy', $ValorCampoLocal->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no ValorCampoLocals
@endif

@stop
