@extends('layouts.scaffold')

@section('main')

<h1>Show Producto</h1>

<p>{{ link_to_route('Inventario.Productos.index', 'Return to all Productos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_Producto_ID</th>
				<th>INV_Producto_Codigo</th>
				<th>INV_Producto_Nombre</th>
				<th>INV_Producto_Descripcion</th>
				<th>INV_Producto_PrecioVenta</th>
				<th>INV_Producto_MargenGanancia</th>
				<th>INV_Producto_PrecioCosto</th>
				<th>INV_Producto_Cantidad</th>
				<th>INV_Producto_Impuesto1</th>
				<th>INV_Producto_Impuesto2</th>
				<th>INV_Producto_RutaImagen</th>
				<th>INV_Producto_Comentarios</th>
				<th>INV_Producto_PuntoReorden</th>
				<th>INV_Producto_NivelReposicion</th>
				<th>INV_Producto_TipoCodigoBarras</th>
				<th>INV_Producto_ValorCodigoBarras</th>
				<th>INV_Producto_ValorDescuento</th>
				<th>INV_Producto_PorcentajeDescuento</th>
				<th>INV_Producto_FechaCreacion</th>
				<th>INV_Producto_UsuarioCreacion</th>
				<th>INV_Producto_FechaModificacion</th>
				<th>INV_Producto_UsuarioModificacion</th>
				<th>INV_Producto_Activo</th>
				<th>INV_Categoria_ID</th>
				<th>INV_Categoria_IDCategoriaPadre</th>
				<th>INV_UnidadMedida_ID</th>
				<th>INV_HorarioBloqueo_ID</th>
		</tr>
	</thead>

	<tbody>
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
					<td>{{{ $Producto->INV_Producto_Activo }}}</td>
					<td>{{{ $Producto->INV_Categoria_ID }}}</td>
					<td>{{{ $Producto->INV_Categoria_IDCategoriaPadre }}}</td>
					<td>{{{ $Producto->INV_UnidadMedida_ID }}}</td>
					<td>{{{ $Producto->INV_HorarioBloqueo_ID }}}</td>
                    <td>{{ link_to_route('Inventario.Productos.edit', 'Edit', array($Producto->INV_Producto_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Productos.destroy', $Producto->INV_Producto_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
