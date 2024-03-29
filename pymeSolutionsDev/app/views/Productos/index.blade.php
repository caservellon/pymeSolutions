@extends('layouts.scaffold')

@section('main')
<?php $isEmpty = true ?>

<h2 class="sub-header">Productos</h2>
<div class="btn-agregar">
	@if(Seguridad::crearProducto())
	<a type="button" href="{{ URL::route('Inventario.Productos.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Producto
	</a>
	@endif
	<a href="{{{ URL::to('Inventario/Productos') }}}" class="btn btn-sm btn-primary col-md-offset-8"><span class="glyphicon glyphicon-refresh"></span> Refrescar</a>
</div>

{{ Form::open(array('route' => 'Productos.search_index')) }}
{{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
{{ Form::text('search', null, array('class' => 'col-md-4', 'form-control', 'id' => 'search', 'placeholder'=>'Busque producto..')) }}
{{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' )) }}
{{ Form::close() }}

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
				<!-- <th>Valor Descuento</th> -->
				<th>Porcentaje Descuento</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
				<th>Categoria Padre</th>
				<th>Categoria Hija</th>
				<th>Unidad Medida</th>
				<th>Vigencia de Descuento</th>
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
					<!-- <td>{{{ $Producto->INV_Producto_ValorDescuento }}}</td> -->
					<td>{{{ $Producto->INV_Producto_PorcentajeDescuento }}}</td>
					<td>{{{ $Producto->INV_Producto_FechaCreacion }}}</td>
					<td>{{{ $Producto->INV_Producto_UsuarioCreacion }}}</td>
					<td>{{{ $Producto->INV_Producto_FechaModificacion }}}</td>
					<td>{{{ $Producto->INV_Producto_UsuarioModificacion }}}</td>
					<td>{{{ $Producto->INV_Producto_Activo ? 'Activa' : 'Desactivada' }}}</td>
					<td>{{{ DB::table('INV_Categoria')->where('INV_Categoria_ID', $Producto->INV_Categoria_IDCategoriaPadre)->first()->INV_Categoria_Nombre }}}</td>
					<td>{{{ DB::table('INV_Categoria')->where('INV_Categoria_ID', $Producto->INV_Categoria_ID)->first()->INV_Categoria_Nombre }}}</td>
					<td>{{{ DB::table('INV_UnidadMedida')->where('INV_UnidadMedida_ID', $Producto->INV_UnidadMedida_ID)->first()->INV_UnidadMedida_Nombre }}}</td>
					<td>{{{ DB::table('INV_Horario')->where('INV_Horario_ID', $Producto->INV_HorarioBloqueo_ID)->first()->INV_Horario_Nombre }}}</td>
					@foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','INV_PRD%')->get() as $campo)
					    @if (DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->count() > 0 )
					    	<td>{{{ DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->first()->INV_Producto_CampoLocal_Valor }}}</td>
					    @else
					    	<td></td>
					    @endif
					@endforeach
					@if($isEmpty)
						<td></td>
					@endif	
                    @if(Seguridad::editarProducto())
                    <td>
                    	{{ link_to_route('Inventario.Productos.edit', 'Editar', array($Producto->INV_Producto_ID), array('class' => 'btn btn-info')) }}
                    </td>
    				@endif 
                    @if(Seguridad::eliminarProducto())
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Productos.destroy', $Producto->INV_Producto_ID))) }}
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
      <strong>Oh no!</strong> No hay productos disponibles :(
    </div>
@endif

@stop