@extends('layouts.scaffold')

@section('main')

<h1>Show Persona</h1>

<p>{{ link_to_route('Personas.index', 'Return to all Personas') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>CRM_Personas_ID</th>
				<th>CRM_Personas_codigo</th>
				<th>CRM_Personas_Nombres</th>
				<th>CRM_Personas_Apellidos</th>
				<th>CRM_Personas_Direccion</th>
				<th>CRM_Personas_Email</th>
				<th>CRM_Personas_Celular</th>
				<th>CRM_Personas_Fijo</th>
				<th>CRM_Personas_Descuento</th>
				<th>CRM_Personas_Foto</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Persona->CRM_Personas_ID }}}</td>
					<td>{{{ $Persona->CRM_Personas_codigo }}}</td>
					<td>{{{ $Persona->CRM_Personas_Nombres }}}</td>
					<td>{{{ $Persona->CRM_Personas_Apellidos }}}</td>
					<td>{{{ $Persona->CRM_Personas_Direccion }}}</td>
					<td>{{{ $Persona->CRM_Personas_Email }}}</td>
					<td>{{{ $Persona->CRM_Personas_Celular }}}</td>
					<td>{{{ $Persona->CRM_Personas_Fijo }}}</td>
					<td>{{{ $Persona->CRM_Personas_Descuento }}}</td>
					<td>{{{ $Persona->CRM_Personas_Foto }}}</td>
                    <td>{{ link_to_route('Personas.edit', 'Edit', array($Persona->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Personas.destroy', $Persona->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
