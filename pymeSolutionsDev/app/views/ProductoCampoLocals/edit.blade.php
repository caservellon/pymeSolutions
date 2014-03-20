@extends('layouts.scaffold')

@section('main')

<h1>Edit ProductoCampoLocal</h1>
{{ Form::model($ProductoCampoLocal, array('method' => 'PATCH', 'route' => array('ProductoCampoLocals.update', $ProductoCampoLocal->id))) }}
	<ul>
        <li>
            {{ Form::label('INV_Producto_CampoLocal_IDCampoLocal', 'INV_Producto_CampoLocal_IDCampoLocal:') }}
            {{ Form::text('INV_Producto_CampoLocal_IDCampoLocal') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_CampoLocal_Valor', 'INV_Producto_CampoLocal_Valor:') }}
            {{ Form::text('INV_Producto_CampoLocal_Valor') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_CampoLocal_FechaCreacion', 'INV_Producto_CampoLocal_FechaCreacion:') }}
            {{ Form::text('INV_Producto_CampoLocal_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_CampoLocal_UsuarioCreacion', 'INV_Producto_CampoLocal_UsuarioCreacion:') }}
            {{ Form::text('INV_Producto_CampoLocal_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_CampoLocal_FechaModificacion', 'INV_Producto_CampoLocal_FechaModificacion:') }}
            {{ Form::text('INV_Producto_CampoLocal_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_CampoLocal_UsuarioModificacion', 'INV_Producto_CampoLocal_UsuarioModificacion:') }}
            {{ Form::text('INV_Producto_CampoLocal_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Producto_ID', 'INV_Producto_ID:') }}
            {{ Form::text('INV_Producto_ID') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_GEN_CampoLocal_ID', 'GEN_CampoLocal_GEN_CampoLocal_ID:') }}
            {{ Form::text('GEN_CampoLocal_GEN_CampoLocal_ID') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('ProductoCampoLocals.show', 'Cancel', $ProductoCampoLocal->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
