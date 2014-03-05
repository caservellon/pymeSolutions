@extends('layouts.layout')

@section('main')

<h1>Edit CatalogoContable</h1>
{{ Form::model($CatalogoContable, array('action' => array('CatalogoContablesController@update', $CatalogoContable->CON_CatalogoContable_ID), 'method' => 'PUT')) }}

	<ul>
        <li>
            {{ Form::label('CON_CatalogoContable_ID', 'ID:') }}
            {{ Form::input('number', 'CON_CatalogoContable_ID') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_Codigo', 'Codigo:') }}
            {{ Form::text('CON_CatalogoContable_Codigo') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_Nombre', 'Nombre:') }}
            {{ Form::text('CON_CatalogoContable_Nombre') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('CON_CatalogoContable_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_NaturalezaSaldo', 'Naturaleza Saldo:') }}
            {{ Form::checkbox('CON_CatalogoContable_NaturalezaSaldo') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_Estado', 'Estado:') }}
            {{ Form::checkbox('CON_CatalogoContable_Estado') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_FechaCreacion', 'Fecha Creacion:') }}
            {{ Form::text('CON_CatalogoContable_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_FechaModificacion', 'Fecha Modificacion:') }}
            {{ Form::text('CON_CatalogoContable_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', 'Clasificacion Cuenta:') }}
            {{ Form::input('number', 'CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID') }}
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
