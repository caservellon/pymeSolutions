@extends('layouts.scaffold')

@section('main')

<h1>Editar cuenta</h1>

@include('_messages.errors')

{{ Form::model($CatalogoContable, array('action' => array('CatalogoContablesController@update', $CatalogoContable->CON_CatalogoContable_ID), 'method' => 'PUT')) }}            
            
        
            {{ Form::label('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', 'Clasificacion Cuenta:') }}
            {{ Form::select('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', $clasi, $selected) }}

            {{ Form::label('CON_CatalogoContable_Codigo', 'Codigo:') }}
            {{ Form::text('CON_CatalogoContable_Codigo') }}

            {{ Form::label('CON_CatalogoContable_Nombre', 'Nombre:') }}
            {{ Form::text('CON_CatalogoContable_Nombre' ) }}

            {{ Form::label('CON_CatalogoContable_UsuarioCreacion', 'Usuario Creacion:') }}
            {{ Form::text('CON_CatalogoContable_UsuarioCreacion') }}

            {{ Form::label('CON_CatalogoContable_NaturalezaSaldo', 'Naturaleza Saldo:') }}
            {{ Form::select('CON_CatalogoContable_NaturalezaSaldo', $naturaleza, $selected3) }}

            
<div class="form-group">
            {{ Form::label('CON_CatalogoContable_Estado', 'Estado:') }}
            {{ Form::select('CON_CatalogoContable_Estado',$esta,$selected2) }}
</div>
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
    
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
<script type="text/javascript">
    $(document).ready(function(){

        $("input").addClass("form-control");
        $("select").addClass("form-control");

    });

</script>
@stop
