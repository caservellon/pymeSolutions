@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Categoria<small></h2>
<div class="btn-agregar">
	@if(Seguridad::crearCategoria())
	<a type="button" href="{{ URL::route('Inventario.Categoria.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Categoría
	</a>
	@endif
</div>

@if ($Categoria->count())

	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
					<th>#</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>FechaCreacion</th>
					<th>Usuario Creacion</th>
					<th>Fecha Modificacion</th>
					<th>Usuario Modificacion</th>
					<th>Activo</th>
					<th>IDCategoriaPadre</th>
					<th>HorarioDescuento ID</th>
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
					<td>{{{ ($Categoria->INV_Categoria_Activo ? 'Activa' : 'Desactivada') }}}</td>
					<td>{{{ $Categorias[$Categoria->INV_Categoria_IDCategoriaPadre - 1]->INV_Categoria_Nombre }}}</td>
					<td>{{{ $Horarios[$Categoria->INV_Categoria_HorarioDescuento_ID - 1]->INV_Horario_Nombre }}}</td>
                    @if(Seguridad::editarCategoria())
                    <td>
                    	{{ link_to_route('Inventario.Categoria.edit', 'Editar', array($Categoria->INV_Categoria_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}
                    </td>
                    @endif
                    @if(Seguridad::eliminarCategoria())
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Categoria.destroy', $Categoria->INV_Categoria_ID))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                    @endif
				</tr>
                @endforeach
              </tbody>
            </table>
          </div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay categorias disponibles :(
    </div>
@endif

@stop