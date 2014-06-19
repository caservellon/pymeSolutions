@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Periodo Contable &gt; <small>Editar Periodo</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('contabilidad/configuracion/periodocontable') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
      </div>
</div>

@include('_messages.errors')

{{ Form::model($ClasificacionPeriodo, array('class'=>'form-horizontal','action' => array('ParamPeriodoContableController@update', $ClasificacionPeriodo->CON_ClasificacionPeriodo_ID), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_Nombre', 'Nombre:*') }}
            <div class="col-md-4">
            {{ Form::text('CON_ClasificacionPeriodo_Nombre') }}
            </div>
        </div>

		<div class="col-md-5">
			{{ Form::submit('Aceptar', array('class' => 'btn btn-success')) }}
        </div>
	   
{{ Form::close() }}



@stop

@section('contabilidad_scripts')

<link rel="stylesheet" href="<?php public_path(); ?>/datepicker/css/datepicker.css">
<script src="<?php public_path(); ?>/datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
        $("input").addClass("form-control");
        $("label").addClass("control-label col-md-3");
    });
</script>

<script type="text/javascript">
  $(document).ready(function() {
      var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          format: 'yyyy-mm-dd',
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkin.hide();
        }).data('datepicker');
        
  });
</script>


@stop