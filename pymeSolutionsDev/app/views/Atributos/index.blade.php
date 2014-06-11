@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Atributos<small></h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.Atributos.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Atributo
	</a>
</div>

@if ($Atributos->count())
	
	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
					<th>#</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>TipoDato</th>
					<th>Fecha Creacion</th>
					<th>Usuario Creacion</th>
					<th>Fecha Modificacion</th>
					<th>Usuario Modificacion</th>
					<th>Activo</th>
				</tr>
			  </thead>
            <tbody>
            	@foreach ($Atributos as $Atributo)
                <tr>
					<td>{{{ $Atributo->INV_Atributo_ID }}}</td>
					<td>{{{ $Atributo->INV_Atributo_Codigo }}}</td>
					<td>{{{ $Atributo->INV_Atributo_Nombre }}}</td>
					<td>{{{ $Atributo->INV_Atributo_TipoDato }}}</td>
					<td>{{{ $Atributo->INV_Atributo_FechaCreacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_UsuarioCreacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_FechaModificacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_UsuarioModificacion }}}</td>
					<td>{{{ ($Atributo->INV_Atributo_Activo ? 'Activo' : 'Desactivado') }}}</td>
                    <td>{{ link_to_route('Inventario.Atributos.edit', 'Editar', array($Atributo->INV_Atributo_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Atributos.destroy', $Atributo->INV_Atributo_ID))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
                @endforeach
              </tbody>
            </table>
          </div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay atributos disponibles :(
    </div>
@endif

@stop