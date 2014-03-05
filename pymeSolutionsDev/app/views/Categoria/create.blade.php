@extends('layouts.scaffold')

@section('main')

<h2>Crear <small>Categoria<small></h2>

{{ Form::open(array('route' => 'Categoria.store')) }}
	<ul>
        <li>
            {{ Form::label('INV_Categoria_Codigo', 'Codigo:') }}
            {{ Form::text('INV_Categoria_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Nombre', 'Nombre:') }}
            {{ Form::text('INV_Categoria_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Descripcion', 'Descripcion:') }}
            {{ Form::text('INV_Categoria_Descripcion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_FechaCreacion', 'Fecha Creacion:') }}
            {{ Form::text('INV_Categoria_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('INV_Categoria_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_FechaModificacion', 'Fecha Modificacion:') }}
            {{ Form::text('INV_Categoria_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_UsuarioModificacion', 'Usuario Modificacion:') }}
            {{ Form::text('INV_Categoria_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_IDCategoriaPadre', 'IDCategoriaPadre:') }}
            {{ Form::text('INV_Categoria_IDCategoriaPadre') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_HorarioDescuento_ID', 'HorarioDescuento ID:') }}
            {{ Form::text('INV_Categoria_HorarioDescuento_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Categoria_Activo') }}
        </li>

        <br/>

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


