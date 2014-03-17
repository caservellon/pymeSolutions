@extends('layouts.scaffold')

@section('main')


<h3 class="sub-header">Seleccione los Productos a Incluir en la Entrada de Inventario</h3>

@if ($Productos->count())
{{ Form::open(array('route' => 'Inventario.Categoria.store', 'class' => "form-horizontal" , 'role' => 'form')) }}	
	<div class="table-responsive">
      <table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio Venta</th>
				<th>Precio Costo</th>
				<th>Incluir</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Productos as $Producto)
				<tr>
					<td>{{{ $Producto->INV_Producto_ID }}}</td>
					<td>{{{ $Producto->INV_Producto_Codigo }}}</td>
					<td>{{{ $Producto->INV_Producto_Nombre }}}</td>
					<td>{{{ $Producto->INV_Producto_Cantidad }}}</td>
					<td>{{{ $Producto->INV_Producto_PrecioVenta }}}</td>
					<td>{{{ $Producto->INV_Producto_PrecioCosto }}}</td>
					<td>{{ Form::checkbox('Incluir', '1', '0', array('class' => 'col-md-4 control-label')) }}</td>
				</tr>
			@endforeach
		</tbody>
	  </table>
	</div>
	<div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay productos disponibles :(
    </div>
@endif
{{ Form::close() }}
@stop
