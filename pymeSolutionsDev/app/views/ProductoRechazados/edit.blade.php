@extends('layouts.scaffold')

@section('main')

<h1>Edit ProductoRechazado</h1>
{{ Form::model($ProductoRechazado, array('method' => 'PATCH', 'route' => array('ProductoRechazados.update', $ProductoRechazado->id))) }}
	<ul>
        <li>
            {{ Form::label('INV_ProductoRechazado_ID', 'INV_ProductoRechazado_ID:') }}
            {{ Form::input('number', 'INV_ProductoRechazado_ID') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_IDOrdenCompra', 'INV_ProductoRechazado_IDOrdenCompra:') }}
            {{ Form::input('number', 'INV_ProductoRechazado_IDOrdenCompra') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_IDProducto', 'INV_ProductoRechazado_IDProducto:') }}
            {{ Form::input('number', 'INV_ProductoRechazado_IDProducto') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_Cantidad', 'INV_ProductoRechazado_Cantidad:') }}
            {{ Form::input('number', 'INV_ProductoRechazado_Cantidad') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_PrecioCosto', 'INV_ProductoRechazado_PrecioCosto:') }}
            {{ Form::input('number', 'INV_ProductoRechazado_PrecioCosto') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_PrecioVenta', 'INV_ProductoRechazado_PrecioVenta:') }}
            {{ Form::input('number', 'INV_ProductoRechazado_PrecioVenta') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_Activo', 'INV_ProductoRechazado_Activo:') }}
            {{ Form::input('number', 'INV_ProductoRechazado_Activo') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_FechaCreacion', 'INV_ProductoRechazado_FechaCreacion:') }}
            {{ Form::text('INV_ProductoRechazado_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_UsuarioCreacion', 'INV_ProductoRechazado_UsuarioCreacion:') }}
            {{ Form::text('INV_ProductoRechazado_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_FechaModificacion', 'INV_ProductoRechazado_FechaModificacion:') }}
            {{ Form::text('INV_ProductoRechazado_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_ProductoRechazado_UsuarioModificacion', 'INV_ProductoRechazado_UsuarioModificacion:') }}
            {{ Form::text('INV_ProductoRechazado_UsuarioModificacion') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('ProductoRechazados.show', 'Cancel', $ProductoRechazado->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
