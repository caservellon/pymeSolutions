@extends('layouts.scaffold')

@section('main')

<h1>Show UnidadMedida</h1>

<p>{{ link_to_route('UnidadMedidas.index', 'Return to all UnidadMedidas') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_UnidadMedida_ID</th>
				<th>INV_UnidadMedida_Nombre</th>
				<th>INV_UnidadMedida_Descripcion</th>
				<th>INV_UnidadMedida_FechaCreacion</th>
				<th>INV_UnidadMedida_UsuarioCreacion</th>
				<th>INV_UnidadMedida_FechaModificacion</th>
				<th>INV_UnidadMedida_UsuarioModificacion</th>
				<th>INV_UnidadMedida_Activo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $UnidadMedida->INV_UnidadMedida_ID }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Nombre }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Descripcion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaModificacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioModificacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Activo }}}</td>
                    <td>{{ link_to_route('UnidadMedidas.edit', 'Edit', array($UnidadMedida->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('UnidadMedidas.destroy', $UnidadMedida->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
