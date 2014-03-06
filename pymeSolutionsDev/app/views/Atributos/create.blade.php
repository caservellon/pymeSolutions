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
            {{ Form::label('INV_Atributo_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Atributo_Activo', 'yes', '1') }}
        </li>

        <br />

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Atributos.index', 'Cancel', '', array('class' => 'btn btn-danger')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


