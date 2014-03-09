@extends('layouts.scaffold')

@section('main')

<h1>Edit FormaPago</h1>
{{ Form::model($FormaPago, array('method' => 'PATCH', 'route' => array('Inventario.FormaPagos.update', $FormaPago->INV_FormaPago_ID))) }}
	<ul>
        <li>
            {{ Form::label('INV_FormaPago_ID', 'INV_FormaPago_ID:') }}
            {{ Form::text('INV_FormaPago_ID') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_Nombre', 'INV_FormaPago_Nombre:') }}
            {{ Form::text('INV_FormaPago_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_Efectivo', 'INV_FormaPago_Efectivo:') }}
            {{ Form::text('INV_FormaPago_Efectivo') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_Credito', 'INV_FormaPago_Credito:') }}
            {{ Form::text('INV_FormaPago_Credito') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_DiasCredito', 'INV_FormaPago_DiasCredito:') }}
            {{ Form::text('INV_FormaPago_DiasCredito') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_FechaCreacion', 'INV_FormaPago_FechaCreacion:') }}
            {{ Form::text('INV_FormaPago_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_UsuarioCreacion', 'INV_FormaPago_UsuarioCreacion:') }}
            {{ Form::text('INV_FormaPago_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_FechaModificacion', 'INV_FormaPago_FechaModificacion:') }}
            {{ Form::text('INV_FormaPago_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_UsuarioModificacion', 'INV_FormaPago_UsuarioModificacion:') }}
            {{ Form::text('INV_FormaPago_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_FormaPago_Activo', 'INV_FormaPago_Activo:') }}
            {{ Form::text('INV_FormaPago_Activo') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Inventario.FormaPagos.show', 'Cancel', $FormaPago->INV_FormaPago_ID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
