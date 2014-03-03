@extends('layouts.scaffold')

@section('main')

<h1>Edit Ciudad</h1>
{{ Form::model($Ciudad, array('method' => 'PATCH', 'route' => array('Ciudad.update', $Ciudad->id))) }}
	<ul>
        <li>
            {{ Form::label('INV_Ciudad_ID', 'INV_Ciudad_ID:') }}
            {{ Form::text('INV_Ciudad_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_Codigo', 'INV_Ciudad_Codigo:') }}
            {{ Form::text('INV_Ciudad_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_Nombre', 'INV_Ciudad_Nombre:') }}
            {{ Form::text('INV_Ciudad_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_FechaCreacion', 'INV_Ciudad_FechaCreacion:') }}
            {{ Form::text('INV_Ciudad_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_UsuarioCreacion', 'INV_Ciudad_UsuarioCreacion:') }}
            {{ Form::text('INV_Ciudad_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_FechaModificacion', 'INV_Ciudad_FechaModificacion:') }}
            {{ Form::text('INV_Ciudad_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_UsuarioModificacion', 'INV_Ciudad_UsuarioModificacion:') }}
            {{ Form::text('INV_Ciudad_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_Activo', 'INV_Ciudad_Activo:') }}
            {{ Form::checkbox('INV_Ciudad_Activo') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Ciudad.show', 'Cancel', $Ciudad->INV_Ciudad_ID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
