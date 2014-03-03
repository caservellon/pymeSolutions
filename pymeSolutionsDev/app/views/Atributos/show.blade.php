@extends('layouts.scaffold')

@section('main')

<h1>Show Atributo</h1>

<p>{{ link_to_route('Atributos.index', 'Return to all Atributos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_Atributo_ID</th>
				<th>INV_Atributo_Codigo</th>
				<th>INV_Atributo_Nombre</th>
				<th>INV_Atributo_TipoDato</th>
				<th>INV_Atributo_FechaCreacion</th>
				<th>INV_Atributo_UsuarioCreacion</th>
				<th>INV_Atributo_FechaModificacion</th>
				<th>INV_Atributo_UsuarioModificacion</th>
				<th>INV_Atributo_Activo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Atributo->INV_Atributo_ID }}}</td>
					<td>{{{ $Atributo->INV_Atributo_Codigo }}}</td>
					<td>{{{ $Atributo->INV_Atributo_Nombre }}}</td>
					<td>{{{ $Atributo->INV_Atributo_TipoDato }}}</td>
					<td>{{{ $Atributo->INV_Atributo_FechaCreacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_UsuarioCreacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_FechaModificacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_UsuarioModificacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_Activo }}}</td>
                    <td>{{ link_to_route('Atributos.edit', 'Edit', array($Atributo->INV_Atributo_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Atributos.destroy', $Atributo->INV_Atributo_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
