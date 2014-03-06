@extends('layouts.scaffold')

@section('main')

<h2>Crear <small>Ciudad</small></h2>

{{ Form::open(array('route' => 'Inventario.Ciudad.store')) }}
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
            {{ Form::label('INV_Ciudad_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Ciudad_Activo', 'yes', '1') }}
        </li>

        <br/>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Inventario.Ciudad.index', 'Cancel', '', array('class' => 'btn btn-danger')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


