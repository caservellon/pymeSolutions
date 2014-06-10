@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Ciudad</small></h2>
<div class="btn-agregar">
	@if(Seguridad::crearCiudad())
	<a type="button" href="{{ URL::route('Inventario.Ciudad.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Ciudad
	</a>
	@endif
</div>

@if ($Ciudad->count())

	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
				<th>#</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach ($Ciudad as $Ciudad)
				<tr>
					<td>{{{ $Ciudad->INV_Ciudad_ID }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_Codigo }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_Nombre }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_FechaCreacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_UsuarioCreacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_FechaModificacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_UsuarioModificacion }}}</td>
					<td>{{{ ($Ciudad->INV_Ciudad_Activo ? 'Activa' : 'Desactivada') }}}</td>
                   	@if(Seguridad::editarCiudad())
                    <td>
                    	{{ link_to_route('Inventario.Ciudad.edit', 'Editar', array($Ciudad->INV_Ciudad_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}
                    </td>
                    @endif
                    @if(Seguridad::eliminarCiudad())
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Ciudad.destroy', $Ciudad->INV_Ciudad_ID))) }}
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
      <strong>Oh no!</strong> No hay ciudades disponibles :(
    </div>
@endif

@stop
