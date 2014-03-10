@extends('layouts.scaffold')

@section('main')

<h1>Create CatalogoContables</h1>

@if ($errors->any())
<div class="bs-callout bs-callout-danger error">
    <ul >
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
    </div>
@endif
{{ Form::open(array('url' => 'catalogo-contable')) }}
	<ul>
         <li>
            {{ Form::label('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', 'Clasificacion Cuenta:') }}
            {{ Form::select('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', $clasi, $selected,array('id'=> 'prueba2')) }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_Codigo', 'Codigo:') }}
            {{ Form::text('CON_CatalogoContable_Codigo','',array('maxlength'=>'10',"disabled",'id' => 'prueba')) }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_Nombre', 'Nombre:') }}
            {{ Form::text('CON_CatalogoContable_Nombre','',array('maxlength'=>'100')) }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('CON_CatalogoContable_UsuarioCreacion','Admin',array("disabled")) }}
        </li>

        <li>,
            {{ Form::label('CON_CatalogoContable_NaturalezaSaldo', 'Naturaleza Saldo:') }}
            {{ Form::select('CON_CatalogoContable_NaturalezaSaldo', $naturaleza, $selected3) }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_Estado', 'Estado:') }}
            {{ Form::select('CON_CatalogoContable_Estado',$esta,$selected2) }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}


@stop