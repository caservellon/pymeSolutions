@extends('layouts.scaffold')

@section('main')

<h1>All Categoria</h1>

@if ($Categoria->count())
	<div class="col-md-5 col-md-push-10">
    	<p>{{ link_to_route('Categoria.create', 'Nueva Categoría') }}</p>
  	</div>
	<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>FechaCreacion</th>
				<th>UsuarioCreacion</th>
				<th>FechaModificacion</th>
				<th>UsuarioModificacion</th>
				<th>Activo</th>
				<th>IDCategoriaPadre</th>
				<th>HorarioDescuento_ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Categoria as $Categoria)
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
                    <td>{{ link_to_route('Categoria.edit', 'Edit', array($Categoria->INV_Categoria_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Categoria.destroy', $Categoria->INV_Categoria_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Categoria
@endif
@stop
