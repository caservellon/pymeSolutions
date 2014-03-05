@extends('layouts.scaffold')

@section('main')

<h2>Crear <small>Unidades Medidas</small></h2>

{{ Form::open(array('route' => 'UnidadMedidas.store')) }}
	<ul>

        <li>
            {{ Form::label('INV_UnidadMedida_Nombre', 'Nombre:') }}
            {{ Form::text('INV_UnidadMedida_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Descripcion', 'Descripcion:') }}
            {{ Form::text('INV_UnidadMedida_Descripcion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_FechaCreacion', 'Fecha Creacion:') }}
            {{ Form::text('INV_UnidadMedida_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('INV_UnidadMedida_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_FechaModificacion', 'Fecha Modificacion:') }}
            {{ Form::text('INV_UnidadMedida_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_UsuarioModificacion', 'Usuario Modificacion:') }}
            {{ Form::text('INV_UnidadMedida_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_UnidadMedida_Activo') }}
        </li>

        <br/>

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


