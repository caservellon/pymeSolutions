@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Productos Rechazados</h2>

@if ($ProductoRechazados->count())
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>ID Orden Compra</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio Costo</th>
				<th>Precio Venta</th>
				<th>Activo</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ProductoRechazados as $ProductoRechazado)
				<tr>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_ID }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_IDOrdenCompra }}}</td>
					<td>{{{ $Productos[$ProductoRechazado->INV_ProductoRechazado_IDProducto - 1]->INV_Producto_Nombre }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_Cantidad }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_PrecioCosto }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_PrecioVenta }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_Activo ? 'Activo' : 'Inanctivo' }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_FechaCreacion }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_UsuarioCreacion }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_FechaModificacion }}}</td>
					<td>{{{ $ProductoRechazado->INV_ProductoRechazado_UsuarioModificacion }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="alert alert-danger">
    <strong>Oh no!</strong> No hay productos rechazados :(
  </div>
@endif

@stop
