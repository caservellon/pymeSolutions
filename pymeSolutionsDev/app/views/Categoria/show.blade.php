@extends('layouts.scaffold')

@section('main')

<h1>Show Categoria</h1>

<p>{{ link_to_route('Categoria.index', 'Return to all Categoria') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_Categoria_ID</th>
				<th>INV_Categoria_Codigo</th>
				<th>INV_Categoria_Nombre</th>
				<th>INV_Categoria_Descripcion</th>
				<th>INV_Categoria_FechaCreacion</th>
				<th>INV_Categoria_UsuarioCreacion</th>
				<th>INV_Categoria_FechaModificacion</th>
				<th>INV_Categoria_UsuarioModificacion</th>
				<th>INV_Categoria_Activo</th>
				<th>INV_Categoria_IDCategoriaPadre</th>
				<th>INV_Categoria_HorarioDescuento_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Categoria->INV_Categoria_ID }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Codigo }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Nombre }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Descripcion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_FechaCreacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_UsuarioCreacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_FechaModificacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_UsuarioModificacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Activo }}}</td>
					<td>{{{ $Categoria->INV_Categoria_IDCategoriaPadre }}}</td>
					<td>{{{ $Categoria->INV_Categoria_HorarioDescuento_ID }}}</td>
                    <td>{{ link_to_route('Categoria.edit', 'Edit', array($Categoria->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Categoria.destroy', $Categoria->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
