@extends('layouts.scaffold')

@section('main')

<h2>Crear <small>Ciudad</small></h2>

{{ Form::open(array('route' => 'Ciudad.store')) }}
	<ul>
       
        <li>
            {{ Form::label('INV_Ciudad_Codigo', 'Codigo:') }}
            {{ Form::text('INV_Ciudad_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_Nombre', 'Nombre:') }}
            {{ Form::text('INV_Ciudad_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_FechaCreacion', 'Fecha Creacion:') }}
            {{ Form::text('INV_Ciudad_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('INV_Ciudad_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_FechaModificacion', 'Fecha Modificacion:') }}
            {{ Form::text('INV_Ciudad_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_UsuarioModificacion', 'Usuario Modificacion:') }}
            {{ Form::text('INV_Ciudad_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Ciudad_Activo') }}
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


