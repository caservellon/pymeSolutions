@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header">Formas de Pago</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.FormaPagos.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Forma de Pago
	</a>
</div>

@if ($FormaPagos->count())

	<div class="table-responsive">
	  <table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Efectivo</th>
				<th>Credito</th>
				<th>Dias Credito</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($FormaPagos as $FormaPago)
				<tr>
					<td>{{{ $FormaPago->INV_FormaPago_ID }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Nombre }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Efectivo ? 'Si' : 'No'  }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Credito ? 'Si' : 'No'  }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_DiasCredito }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_FechaCreacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_UsuarioCreacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_FechaModificacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_UsuarioModificacion }}}</td>
					<td>{{{ $FormaPago->INV_FormaPago_Activo ? 'Activa' : 'Desactivada' }}}</td>
                    <td>{{ link_to_route('Inventario.FormaPagos.edit', 'Editar', array($FormaPago->INV_FormaPago_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.FormaPagos.destroy', $FormaPago->INV_FormaPago_ID))) }}
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
      <strong>Oh no!</strong> No hay formas de pago disponibles :(
    </div>

@endif

@stop
