@extends('layouts.scaffold')

@section('main')

<h1>Edit Atributo</h1>
{{ Form::model($Atributo, array('method' => 'PATCH', 'route' => array('Atributos.update', $Atributo->id))) }}
	<ul>
        <li>
            {{ Form::label('INV_Atributo_ID', 'INV_Atributo_ID:') }}
            {{ Form::text('INV_Atributo_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_Codigo', 'INV_Atributo_Codigo:') }}
            {{ Form::text('INV_Atributo_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_Nombre', 'INV_Atributo_Nombre:') }}
            {{ Form::text('INV_Atributo_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_TipoDato', 'INV_Atributo_TipoDato:') }}
            {{ Form::text('INV_Atributo_TipoDato') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_FechaCreacion', 'INV_Atributo_FechaCreacion:') }}
            {{ Form::text('INV_Atributo_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_UsuarioCreacion', 'INV_Atributo_UsuarioCreacion:') }}
            {{ Form::text('INV_Atributo_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_FechaModificacion', 'INV_Atributo_FechaModificacion:') }}
            {{ Form::text('INV_Atributo_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_UsuarioModificacion', 'INV_Atributo_UsuarioModificacion:') }}
            {{ Form::text('INV_Atributo_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_Activo', 'INV_Atributo_Activo:') }}
            {{ Form::checkbox('INV_Atributo_Activo') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Atributos.show', 'Cancel', $Atributo->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
