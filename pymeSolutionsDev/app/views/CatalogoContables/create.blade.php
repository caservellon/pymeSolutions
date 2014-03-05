@extends('layouts.layout')

@section('main')

<h1>Create CatalogoContables</h1>

{{ Form::open(array('url' => 'catalogo-contable')) }}
	<ul>
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
            {{ Form::label('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', 'Clasificacion Cuenta:') }}
            {{ Form::select('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', $clasi, $selected) }}
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