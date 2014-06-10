@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Unidades Medidas</small></h2>
<div class="btn-agregar">
	@if(Seguridad::crearUnidadMedida())
	<a type="button" href="{{ URL::route('Inventario.UnidadMedidas.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Unidad Medida
	</a>
	@endif
</div>

@if ($UnidadMedidas->count())
	
	<div class="table-responsive">
      <table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($UnidadMedidas as $UnidadMedida)
				<tr>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_ID }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Nombre }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Descripcion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaModificacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioModificacion }}}</td>
					<td>{{{ ($UnidadMedida->INV_UnidadMedida_Activo ? 'Activa' : 'Desactivada') }}}</td>
                    @if(Seguridad::editarUnidadMedida())
                    <td>
                    	{{ link_to_route('Inventario.UnidadMedidas.edit', 'Editar', array($UnidadMedida->INV_UnidadMedida_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}
                    </td>
                    @endif
                    @if(Seguridad::eliminarUnidadMedida())
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.UnidadMedidas.destroy', $UnidadMedida->INV_UnidadMedida_ID))) }}
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
      <strong>Oh no!</strong> No hay unidades de medida disponibles :(
    </div>
@endif

@stop
