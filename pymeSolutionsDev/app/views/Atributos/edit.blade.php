@extends('layouts.scaffold')

@section('main')

<h2><span class='glyphicon glyphicon-pencil'></span> Editar <small>Atributo<small></h2>
{{ Form::model($Atributo, array('method' => 'PATCH', 'route' => array('Atributos.update', $Atributo->INV_Atributo_ID))) }}
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
            {{ Form::label('INV_Atributo_UsuarioModificacion', 'Usuario Modificacion:') }}
            {{ Form::text('INV_Atributo_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Atributo_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Atributo_Activo') }}
        </li>

        <br />

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Atributos.show', 'Cancel', $Atributo->INV_Atributo_ID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
