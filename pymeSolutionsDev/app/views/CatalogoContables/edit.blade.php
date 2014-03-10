@extends('layouts.scaffold')

@section('main')

<h1>Edit CatalogoContable</h1>
@if ($errors->any())
<div class="bs-callout bs-callout-danger error">
    <ul >
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
    </div>
@endif

{{ Form::model($CatalogoContable, array('action' => array('CatalogoContablesController@update', $CatalogoContable->CON_CatalogoContable_ID), 'method' => 'PUT')) }}

	<ul>
        
        <!--<li>
            {{ Form::label('CON_CatalogoContable_Codigo', 'Codigo:') }}
            {{ Form::text('CON_CatalogoContable_Codigo') }}
        </li> -->

        <li>
            {{ Form::label('CON_CatalogoContable_Nombre', 'Nombre:') }}
            {{ Form::text('CON_CatalogoContable_Nombre' ) }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('CON_CatalogoContable_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_NaturalezaSaldo', 'Naturaleza Saldo:') }}
            {{ Form::select('CON_CatalogoContable_NaturalezaSaldo', $naturaleza, $selected3) }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_Estado', 'Estado:') }}
            {{ Form::select('CON_CatalogoContable_Estado',$esta,$selected2) }}
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


<script type="text/javascript">
    
   $(document).ready( $("#CON_CatalogoContable_Estado").click(function(){
        if ($(this).attr('value')==1){
            $(this).val(0);
        }else{
            $(this).val(1);
        }

    }));
</script>
@stop
