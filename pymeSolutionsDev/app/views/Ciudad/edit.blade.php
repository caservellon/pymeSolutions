@extends('layouts.scaffold')

@section('main')

<h2>Editar <small>Ciudad</small></h2>
{{ Form::model($Ciudad, array('method' => 'PATCH', 'route' => array('Inventario.Ciudad.update', $Ciudad->INV_Ciudad_ID))) }}
	<ul>
        <li>
            {{ Form::label('INV_Ciudad_Codigo', 'Codigo:') }}
            {{ Form::text('INV_Ciudad_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_Nombre', 'Nombre: *') }}
            {{ Form::text('INV_Ciudad_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Ciudad_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Ciudad_Activo', 'yes') }}
        </li>

        <br/>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Inventario.Ciudad.show', 'Cancel', $Ciudad->INV_Ciudad_ID, array('class' => 'btn btn-danger')) }}
        </li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
