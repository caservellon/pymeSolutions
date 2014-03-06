@extends('layouts.scaffold')

@section('main')

<h2>Editar <small>Unidades Medidas</small></h2>
{{ Form::model($UnidadMedida, array('method' => 'PATCH', 'route' => array('Inventario.UnidadMedidas.update', $UnidadMedida->INV_UnidadMedida_ID))) }}
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
            {{ Form::checkbox('INV_UnidadMedida_Activo', 'yes') }}
        </li>

        <br/>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Inventario.UnidadMedidas.show', 'Cancel', $UnidadMedida->INV_UnidadMedida_ID, array('class' => 'btn btn-danger')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
