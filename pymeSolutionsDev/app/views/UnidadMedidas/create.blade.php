@extends('layouts.scaffold')

@section('main')

<h1>Create UnidadMedida</h1>

{{ Form::open(array('route' => 'UnidadMedidas.store')) }}
	<ul>
        <li>
            {{ Form::label('INV_UnidadMedida_ID', 'INV_UnidadMedida_ID:') }}
            {{ Form::text('INV_UnidadMedida_ID') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Nombre', 'INV_UnidadMedida_Nombre:') }}
            {{ Form::text('INV_UnidadMedida_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Descripcion', 'INV_UnidadMedida_Descripcion:') }}
            {{ Form::text('INV_UnidadMedida_Descripcion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_FechaCreacion', 'INV_UnidadMedida_FechaCreacion:') }}
            {{ Form::text('INV_UnidadMedida_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_UsuarioCreacion', 'INV_UnidadMedida_UsuarioCreacion:') }}
            {{ Form::text('INV_UnidadMedida_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_FechaModificacion', 'INV_UnidadMedida_FechaModificacion:') }}
            {{ Form::text('INV_UnidadMedida_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_UsuarioModificacion', 'INV_UnidadMedida_UsuarioModificacion:') }}
            {{ Form::text('INV_UnidadMedida_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Activo', 'INV_UnidadMedida_Activo:') }}
            {{ Form::checkbox('INV_UnidadMedida_Activo') }}
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


