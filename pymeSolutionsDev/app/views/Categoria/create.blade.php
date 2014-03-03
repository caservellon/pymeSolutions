@extends('layouts.scaffold')

@section('main')

<h1>Create Categoria</h1>

{{ Form::open(array('route' => 'Categoria.store')) }}
	<ul>
        <li>
            {{ Form::label('INV_Categoria_ID', 'INV_Categoria_ID:') }}
            {{ Form::text('INV_Categoria_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Codigo', 'INV_Categoria_Codigo:') }}
            {{ Form::text('INV_Categoria_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Nombre', 'INV_Categoria_Nombre:') }}
            {{ Form::text('INV_Categoria_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Descripcion', 'INV_Categoria_Descripcion:') }}
            {{ Form::text('INV_Categoria_Descripcion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_FechaCreacion', 'INV_Categoria_FechaCreacion:') }}
            {{ Form::text('INV_Categoria_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_UsuarioCreacion', 'INV_Categoria_UsuarioCreacion:') }}
            {{ Form::text('INV_Categoria_UsuarioCreacion') }}
        </li>


        <li>
            {{ Form::label('INV_Categoria_Activo', 'INV_Categoria_Activo:') }}
            {{ Form::checkbox('INV_Categoria_Activo') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_IDCategoriaPadre', 'INV_Categoria_IDCategoriaPadre:') }}
            {{ Form::text('INV_Categoria_IDCategoriaPadre') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_HorarioDescuento_ID', 'INV_Categoria_HorarioDescuento_ID:') }}
            {{ Form::text('INV_Categoria_HorarioDescuento_ID') }}
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

