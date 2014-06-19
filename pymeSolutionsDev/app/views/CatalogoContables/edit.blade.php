@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Catalogo Contable &gt; <small>Editar Cuenta</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('contabilidad/configuracion/catalogocuentas') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
      </div>
</div>

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
            {{ Form::select('CON_CatalogoContable_Estado',array(1=>'Activo',0=>'Inactivo')) }}
</div></div>
<div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}



@stop

@section('contabilidad_scripts')

<script type="text/javascript">
    $(document).ready(function(){

        $("input").addClass("form-control");
        $("select").addClass("form-control");
        $("label").addClass("control-label pull-left col-md-3");
    });

</script>
@stop
