@extends('layouts.scaffold')

@section('main')

<h1>Edit Proveedor</h1>
{{ Form::model($Proveedor, array('method' => 'PATCH', 'route' => array('Inventario.Proveedor.update', $Proveedor->id))) }}
	<ul>
        <li>
            {{ Form::label('INV_Proveedor_ID', 'INV_Proveedor_ID:') }}
            {{ Form::text('INV_Proveedor_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_Codigo', 'INV_Proveedor_Codigo:') }}
            {{ Form::text('INV_Proveedor_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_Nombre', 'INV_Proveedor_Nombre:') }}
            {{ Form::text('INV_Proveedor_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_Direccion', 'INV_Proveedor_Direccion:') }}
            {{ Form::text('INV_Proveedor_Direccion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_Telefono', 'INV_Proveedor_Telefono:') }}
            {{ Form::text('INV_Proveedor_Telefono') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_Email', 'INV_Proveedor_Email:') }}
            {{ Form::text('INV_Proveedor_Email') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_PaginaWeb', 'INV_Proveedor_PaginaWeb:') }}
            {{ Form::text('INV_Proveedor_PaginaWeb') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_RepresentanteVentas', 'INV_Proveedor_RepresentanteVentas:') }}
            {{ Form::text('INV_Proveedor_RepresentanteVentas') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_TelefonoRepresentanteVentas', 'INV_Proveedor_TelefonoRepresentanteVentas:') }}
            {{ Form::text('INV_Proveedor_TelefonoRepresentanteVentas') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_Comentarios', 'INV_Proveedor_Comentarios:') }}
            {{ Form::text('INV_Proveedor_Comentarios') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_RutaImagen', 'INV_Proveedor_RutaImagen:') }}
            {{ Form::text('INV_Proveedor_RutaImagen') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_FechaCreacion', 'INV_Proveedor_FechaCreacion:') }}
            {{ Form::text('INV_Proveedor_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_UsuarioCreacion', 'INV_Proveedor_UsuarioCreacion:') }}
            {{ Form::text('INV_Proveedor_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_FechaModificacion', 'INV_Proveedor_FechaModificacion:') }}
            {{ Form::text('INV_Proveedor_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_UsuarioModificacion', 'INV_Proveedor_UsuarioModificacion:') }}
            {{ Form::text('INV_Proveedor_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_ID', 'INV_Ciudad_ID:') }}
            {{ Form::text('INV_Ciudad_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_Activo', 'INV_Proveedor_Activo:') }}
            {{ Form::text('INV_Proveedor_Activo') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Inventario.Proveedor.show', 'Cancel', $Proveedor->INV_Proveedor_ID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
