@extends('layouts.scaffold')

@section('main')

<h2>Crear <small>Atributo<small></h2>

{{ Form::open(array('route' => 'Atributos.store')) }}
	<ul>
        <li>
            {{ Form::label('INV_Atributo_Codigo', 'Codigo:') }}
            {{ Form::text('INV_Atributo_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_Nombre', 'Nombre:') }}
            {{ Form::text('INV_Atributo_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_TipoDato', 'Tipo Dato:') }}
            {{ Form::text('INV_Atributo_TipoDato') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_FechaCreacion', 'Fecha Creacion:') }}
            {{ Form::text('INV_Atributo_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('INV_Atributo_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_FechaModificacion', 'Fecha Modificacion:') }}
            {{ Form::text('INV_Atributo_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_UsuarioModificacion', 'UsuarioModificacion:') }}
            {{ Form::text('INV_Atributo_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Atributo_Activo') }}
        </li>

        <br />

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


