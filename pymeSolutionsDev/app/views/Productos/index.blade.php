@extends('layouts.scaffold')

@section('main')
<?php $isEmpty = true ?>

<h2 class="sub-header">Productos</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.Productos.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Producto
	</a>
</div>

@if ($Productos->count())
	
	<div class="table-responsive">
      <table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio Venta</th>
				<th>Margen Ganancia</th>
				<th>Precio Costo</th>
				<th>Cantidad</th>
				<th>Impuesto 1</th>
				<th>Impuesto 2</th>
				<th>Ruta Imagen</th>
				<th>Comentarios</th>
				<th>Punto Reorden</th>
				<th>Nivel Reposicion</th>
				<th>Tipo Codigo Barras</th>
				<th>Valor Codigo Barras</th>
				<th>Valor Descuento</th>
				<th>Porcentaje Descuento</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
				<th>Categoria ID</th>
				<th>ID Categoria Padre</th>
				<th>UnidadMedida ID</th>
				<th>Horario Bloqueo ID</th>
				@foreach($CamposLocales as $CampoLocal)
						<th>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</th>
				@endforeach	
			</tr>
		</thead>

		<tbody>
			@foreach ($Productos as $Producto)
				<tr>
					<td>{{{ $Producto->INV_Producto_ID }}}</td>
					<td>{{{ $Producto->INV_Producto_Codigo }}}</td>
					<td>{{{ $Producto->INV_Producto_Nombre }}}</td>
					<td>{{{ $Producto->INV_Producto_Descripcion }}}</td>
					<td>{{{ $Producto->INV_Producto_PrecioVenta }}}</td>
					<td>{{{ $Producto->INV_Producto_MargenGanancia }}}</td>
					<td>{{{ $Producto->INV_Producto_PrecioCosto }}}</td>
					<td>{{{ $Producto->INV_Producto_Cantidad }}}</td>
					<td>{{{ $Producto->INV_Producto_Impuesto1 }}}</td>
					<td>{{{ $Producto->INV_Producto_Impuesto2 }}}</td>
					<td>{{{ $Producto->INV_Producto_RutaImagen }}}</td>
					<td>{{{ $Producto->INV_Producto_Comentarios }}}</td>
					<td>{{{ $Producto->INV_Producto_PuntoReorden }}}</td>
					<td>{{{ $Producto->INV_Producto_NivelReposicion }}}</td>
					<td>{{{ $Producto->INV_Producto_TipoCodigoBarras }}}</td>
					<td>{{{ $Producto->INV_Producto_ValorCodigoBarras }}}</td>
					<td>{{{ $Producto->INV_Producto_ValorDescuento }}}</td>
					<td>{{{ $Producto->INV_Producto_PorcentajeDescuento }}}</td>
					<td>{{{ $Producto->INV_Producto_FechaCreacion }}}</td>
					<td>{{{ $Producto->INV_Producto_UsuarioCreacion }}}</td>
					<td>{{{ $Producto->INV_Producto_FechaModificacion }}}</td>
					<td>{{{ $Producto->INV_Producto_UsuarioModificacion }}}</td>
					<td>{{{ $Producto->INV_Producto_Activo ? 'Activa' : 'Desactivada' }}}</td>
					<td>{{{ $Producto->INV_Categoria_ID }}}</td>
					<td>{{{ $Producto->INV_Categoria_IDCategoriaPadre }}}</td>
					<td>{{{ $Producto->INV_UnidadMedida_ID }}}</td>
					<td>{{{ $Producto->INV_HorarioBloqueo_ID }}}</td>
					@foreach($ValoresCampLoc as $VCL)
						@if($VCL->INV_Producto_ID === $Producto->INV_Producto_ID)
							{{ $isEmpty = false }}
							<td>{{{ $VCL->INV_Producto_CampoLocal_Valor }}}</td>
						@endif
					@endforeach
					@if($isEmpty)
						<td></td>
					@endif	
                    <td>{{ link_to_route('Inventario.Productos.edit', 'Editar', array($Producto->INV_Producto_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Productos.destroy', $Producto->INV_Producto_ID))) }}
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
      <strong>Oh no!</strong> No hay productos disponibles :(
    </div>
@endif

@stop
