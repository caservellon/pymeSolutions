@extends('layouts.scaffold')

@section('main')

<h1>Edit DetalleMovimiento</h1>
{{ Form::model($DetalleMovimiento, array('method' => 'PATCH', 'route' => array('Inventario.DetalleMovimiento.update', $DetalleMovimiento->id))) }}
	<ul>
        <li>
            {{ Form::label('INV_DetalleMovimiento_ID', 'INV_DetalleMovimiento_ID:') }}
            {{ Form::text('INV_DetalleMovimiento_ID') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_IDProducto', 'INV_DetalleMovimiento_IDProducto:') }}
            {{ Form::text('INV_DetalleMovimiento_IDProducto') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_CodigoProducto', 'INV_DetalleMovimiento_CodigoProducto:') }}
            {{ Form::text('INV_DetalleMovimiento_CodigoProducto') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_NombreProducto', 'INV_DetalleMovimiento_NombreProducto:') }}
            {{ Form::text('INV_DetalleMovimiento_NombreProducto') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_CantidadProducto', 'INV_DetalleMovimiento_CantidadProducto:') }}
            {{ Form::text('INV_DetalleMovimiento_CantidadProducto') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_PrecioCosto', 'INV_DetalleMovimiento_PrecioCosto:') }}
            {{ Form::text('INV_DetalleMovimiento_PrecioCosto') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_PrecioVenta', 'INV_DetalleMovimiento_PrecioVenta:') }}
            {{ Form::text('INV_DetalleMovimiento_PrecioVenta') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_FechaCreacion', 'INV_DetalleMovimiento_FechaCreacion:') }}
            {{ Form::text('INV_DetalleMovimiento_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_UsuarioCreacion', 'INV_DetalleMovimiento_UsuarioCreacion:') }}
            {{ Form::text('INV_DetalleMovimiento_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_FechaModificacion', 'INV_DetalleMovimiento_FechaModificacion:') }}
            {{ Form::text('INV_DetalleMovimiento_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_DetalleMovimiento_UsuarioModificacion', 'INV_DetalleMovimiento_UsuarioModificacion:') }}
            {{ Form::text('INV_DetalleMovimiento_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_ID', 'INV_Movimiento_ID:') }}
            {{ Form::text('INV_Movimiento_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID', 'INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID:') }}
            {{ Form::text('INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_INV_Producto_ID', 'INV_Producto_INV_Producto_ID:') }}
            {{ Form::text('INV_Producto_INV_Producto_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_INV_Categoria_ID', 'INV_Producto_INV_Categoria_ID:') }}
            {{ Form::text('INV_Producto_INV_Categoria_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_INV_Categoria_IDCategoriaPadre', 'INV_Producto_INV_Categoria_IDCategoriaPadre:') }}
            {{ Form::text('INV_Producto_INV_Categoria_IDCategoriaPadre') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID', 'INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID:') }}
            {{ Form::text('INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Inventario.DetalleMovimiento.show', 'Cancel', $DetalleMovimiento->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
