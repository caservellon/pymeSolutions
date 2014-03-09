@extends('layouts.scaffold')

@section('main')

<h1>Show Horario</h1>

<p>{{ link_to_route('Inventario.Horarios.index', 'Return to all Horarios') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_Horario_ID</th>
				<th>INV_Horario_Nombre</th>
				<th>INV_Horario_Tipo</th>
				<th>INV_Horario_FechaInicio</th>
				<th>INV_Horario_FechaFinal</th>
				<th>INV_Horario_FechaCreacion</th>
				<th>INV_Horario_UsuarioCreacion</th>
				<th>INV_Horario_FechaModificacion</th>
				<th>INV_Horario_UsuarioModificacion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Horario->INV_Horario_ID }}}</td>
					<td>{{{ $Horario->INV_Horario_Nombre }}}</td>
					<td>{{{ $Horario->INV_Horario_Tipo }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaInicio }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaFinal }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaCreacion }}}</td>
					<td>{{{ $Horario->INV_Horario_UsuarioCreacion }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaModificacion }}}</td>
					<td>{{{ $Horario->INV_Horario_UsuarioModificacion }}}</td>
                    <td>{{ link_to_route('Inventario.Horarios.edit', 'Edit', array($Horario->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Horarios.destroy', $Horario->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
