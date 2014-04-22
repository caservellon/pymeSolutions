@extends('layouts.scaffold')

@section('main')

<h1>Create ProveedorCampoLocal</h1>

{{ Form::open(array('route' => 'ProveedorCampoLocals.store')) }}
	<ul>
        <li>
            {{ Form::label('INV_Proveedor_CampoLocal_ID', 'INV_Proveedor_CampoLocal_ID:') }}
            {{ Form::text('INV_Proveedor_CampoLocal_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_CampoLocal_Valor', 'INV_Proveedor_CampoLocal_Valor:') }}
            {{ Form::text('INV_Proveedor_CampoLocal_Valor') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_CampoLocal_FechaCreacion', 'INV_Proveedor_CampoLocal_FechaCreacion:') }}
            {{ Form::text('INV_Proveedor_CampoLocal_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_CampoLocal_UsuarioCreacion', 'INV_Proveedor_CampoLocal_UsuarioCreacion:') }}
            {{ Form::text('INV_Proveedor_CampoLocal_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_CampoLocal_FechaModificacion', 'INV_Proveedor_CampoLocal_FechaModificacion:') }}
            {{ Form::text('INV_Proveedor_CampoLocal_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_CampoLocal_UsuarioModificacion', 'INV_Proveedor_CampoLocal_UsuarioModificacion:') }}
            {{ Form::text('INV_Proveedor_CampoLocal_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_INV_Proveedor_ID', 'INV_Proveedor_INV_Proveedor_ID:') }}
            {{ Form::text('INV_Proveedor_INV_Proveedor_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Proveedor_INV_Ciudad_ID', 'INV_Proveedor_INV_Ciudad_ID:') }}
            {{ Form::text('INV_Proveedor_INV_Ciudad_ID') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_GEN_CampoLocal_ID', 'GEN_CampoLocal_GEN_CampoLocal_ID:') }}
            {{ Form::text('GEN_CampoLocal_GEN_CampoLocal_ID') }}
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


