@extends('layouts.scaffold')

@section('main')

<h2>Editar <small>Unidades Medidas</small></h2>
{{ Form::model($UnidadMedida, array('method' => 'PATCH', 'route' => array('UnidadMedidas.update', $UnidadMedida->INV_UnidadMedida_ID))) }}
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
            {{ Form::label('INV_UnidadMedida_FechaCreacion', 'Fecha Creacion:') }}
            {{ Form::text('INV_UnidadMedida_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('INV_UnidadMedida_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_FechaModificacion', 'Fecha Modificacion:') }}
            {{ Form::text('INV_UnidadMedida_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_UsuarioModificacion', 'Usuario Modificacion:') }}
            {{ Form::text('INV_UnidadMedida_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_UnidadMedida_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_UnidadMedida_Activo') }}
        </li>

        <br/>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('UnidadMedidas.show', 'Cancel', $UnidadMedida->INV_UnidadMedida_ID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
