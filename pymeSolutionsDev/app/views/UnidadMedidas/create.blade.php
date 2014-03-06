@extends('layouts.scaffold')

@section('main')

<h2>Crear <small>Unidades Medidas</small></h2>

{{ Form::open(array('route' => 'UnidadMedidas.store')) }}
	<ul>

        <li>
            {{ Form::label('INV_UnidadMedida_Nombre', 'Nombre:') }}
            {{ Form::text('INV_UnidadMedida_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Descripcion', 'Descripcion:') }}
            {{ Form::text('INV_UnidadMedida_Descripcion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_UnidadMedida_Activo', 'yes', '1') }}
        </li>

        <br/>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('UnidadMedidas.index', 'Cancel', '', array('class' => 'btn btn-danger')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


