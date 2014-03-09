@extends('layouts.scaffold')

@section('main')

<h1>Create FormaPago</h1>

{{ Form::open(array('route' => 'Inventario.FormaPagos.store')) }}
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
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


