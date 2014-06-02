@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Concepto Motivo &gt; <small>Editar Concepto</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('contabilidad/conceptomotivo') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
      </div>
</div>

@include('_messages.errors')

{{ Form::model($ConceptoMotivos, array('class'=>'form-horizontal','action' => array('ConceptoMotivoController@update', $ConceptoMotivos->CON_ConceptoMotivo_ID), 'method' => 'PUT')) }}
            
<div class="form-group">
            {{ Form::label('CON_ConceptoMotivo_Concepto', 'Nombre del Concepto:*') }}
            <div class="col-md-3">
            {{ Form::text('CON_ConceptoMotivo_Concepto' ) }}
</div>
</div>

<div class="form-group">
            {{ Form::label('CON_MotivoTransaccion_ID', 'Motivo del Concepto:') }}
            <div class="col-md-3">
            {{ Form::select('CON_MotivoTransaccion_ID',$ListaMotivos) }}
</div></div>

<div class="col-md-5">
            {{ Form::submit('Actualizar Concepto', array('class' => 'btn btn-success')) }}
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
