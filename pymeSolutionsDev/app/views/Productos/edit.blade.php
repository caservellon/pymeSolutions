@extends('layouts.scaffold')

@section('main')

<h1>Edit Producto</h1>
{{ Form::model($Producto, array('method' => 'PATCH', 'route' => array('Inventario.Productos.update', $Producto->INV_Producto_ID))) }}
	<ul>
        <li>
            {{ Form::label('INV_Producto_ID', 'INV_Producto_ID:') }}
            {{ Form::text('INV_Producto_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Codigo', 'INV_Producto_Codigo:') }}
            {{ Form::text('INV_Producto_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Nombre', 'INV_Producto_Nombre:') }}
            {{ Form::text('INV_Producto_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Descripcion', 'INV_Producto_Descripcion:') }}
            {{ Form::text('INV_Producto_Descripcion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_PrecioVenta', 'INV_Producto_PrecioVenta:') }}
            {{ Form::text('INV_Producto_PrecioVenta') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_MargenGanancia', 'INV_Producto_MargenGanancia:') }}
            {{ Form::text('INV_Producto_MargenGanancia') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_PrecioCosto', 'INV_Producto_PrecioCosto:') }}
            {{ Form::text('INV_Producto_PrecioCosto') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Cantidad', 'INV_Producto_Cantidad:') }}
            {{ Form::text('INV_Producto_Cantidad') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Impuesto1', 'INV_Producto_Impuesto1:') }}
            {{ Form::text('INV_Producto_Impuesto1') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Impuesto2', 'INV_Producto_Impuesto2:') }}
            {{ Form::text('INV_Producto_Impuesto2') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_RutaImagen', 'INV_Producto_RutaImagen:') }}
            {{ Form::text('INV_Producto_RutaImagen') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Comentarios', 'INV_Producto_Comentarios:') }}
            {{ Form::text('INV_Producto_Comentarios') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_PuntoReorden', 'INV_Producto_PuntoReorden:') }}
            {{ Form::text('INV_Producto_PuntoReorden') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_NivelReposicion', 'INV_Producto_NivelReposicion:') }}
            {{ Form::text('INV_Producto_NivelReposicion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_TipoCodigoBarras', 'INV_Producto_TipoCodigoBarras:') }}
            {{ Form::text('INV_Producto_TipoCodigoBarras') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_ValorCodigoBarras', 'INV_Producto_ValorCodigoBarras:') }}
            {{ Form::text('INV_Producto_ValorCodigoBarras') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_ValorDescuento', 'INV_Producto_ValorDescuento:') }}
            {{ Form::text('INV_Producto_ValorDescuento') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_PorcentajeDescuento', 'INV_Producto_PorcentajeDescuento:') }}
            {{ Form::text('INV_Producto_PorcentajeDescuento') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_FechaCreacion', 'INV_Producto_FechaCreacion:') }}
            {{ Form::text('INV_Producto_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_UsuarioCreacion', 'INV_Producto_UsuarioCreacion:') }}
            {{ Form::text('INV_Producto_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_FechaModificacion', 'INV_Producto_FechaModificacion:') }}
            {{ Form::text('INV_Producto_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_UsuarioModificacion', 'INV_Producto_UsuarioModificacion:') }}
            {{ Form::text('INV_Producto_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_Activo', 'INV_Producto_Activo:') }}
            {{ Form::text('INV_Producto_Activo') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_ID', 'INV_Categoria_ID:') }}
            {{ Form::text('INV_Categoria_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_IDCategoriaPadre', 'INV_Categoria_IDCategoriaPadre:') }}
            {{ Form::text('INV_Categoria_IDCategoriaPadre') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_ID', 'INV_UnidadMedida_ID:') }}
            {{ Form::text('INV_UnidadMedida_ID') }}
        </li>

        <li>
            {{ Form::label('INV_HorarioBloqueo_ID', 'INV_HorarioBloqueo_ID:') }}
            {{ Form::text('INV_HorarioBloqueo_ID') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Inventario.Productos.show', 'Cancel', $Producto->INV_Producto_ID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
