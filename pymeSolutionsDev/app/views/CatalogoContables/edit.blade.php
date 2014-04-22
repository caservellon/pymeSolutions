@extends('layouts.scaffold')

@section('main')

<h1>Editar cuenta</h1>

@include('_messages.errors')

{{ Form::model($CatalogoContable, array('class'=>'form-horizontal','action' => array('CatalogoContablesController@update', $CatalogoContable->CON_CatalogoContable_ID), 'method' => 'PUT')) }}            
            
        
           
            {{ Form::hidden('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID') }}

            
            {{ Form::hidden('CON_CatalogoContable_Codigo') }}

<div class="form-group">
            {{ Form::label('CON_CatalogoContable_Nombre', 'Nombre:') }}
            <div class="col-md-3">
            {{ Form::text('CON_CatalogoContable_Nombre' ) }}
</div>
</div>
            
            {{ Form::hidden('CON_CatalogoContable_UsuarioCreacion') }}

            {{ Form::hidden('CON_CatalogoContable_NaturalezaSaldo') }}
            {{ Form::hidden('CON_CatalogoContable_CodigoSubcuenta')}}
            
<div class="form-group">
            {{ Form::label('CON_CatalogoContable_Estado', 'Estado:') }}
            <div class="col-md-3">
            {{ Form::select('CON_CatalogoContable_Estado',$esta,$selected2) }}
</div></div>
<div class="col-md-5">
            {{ Form::submit('Realizar Cambios en la cuenta', array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}



@stop

@section('contabilidad_scripts')

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
        $("label").addClass("control-label pull-left col-md-3");
    });

</script>
@stop
