@extends('layouts.scaffold')

@section('main')


<h1>Editar Periodo contable</h1>

@include('_messages.errors')

{{ Form::model($ClasificacionPeriodo, array('action' => array('ParamPeriodoContableController@update', $ClasificacionPeriodo->CON_ClasificacionPeriodo_ID), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_Nombre', 'Nombre:') }}
            {{ Form::text('CON_ClasificacionPeriodo_Nombre') }}
        </div>

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_CatidadDias', 'Cantidad Dias:') }}
            {{ Form::select('CON_ClasificacionPeriodo_CatidadDias',$CantidadDias,'',array('class'=>'form-control')) }}
        </div>
         <div class="form-group">
         {{ Form::label('CON_PeriodoContable_FechaInicio', 'Fecha que inicia:') }} 
         {{ Form::text('CON_PeriodoContable_FechaInicio',$ClasificacionPeriodo->CON_PeriodoContable_FechaInicio,
            array('type'=>'text','class'=>'span2','value'=>'','id'=>'dpd1','placeholder'=>'yyyy-mm-dd')) }}
        </div>
		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </div>
	   
{{ Form::close() }}



@stop

@section('contabilidad_scripts')

<link rel="stylesheet" href="<?php public_path(); ?>/datepicker/css/datepicker.css">
<script src="<?php public_path(); ?>/datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
        $("input").addClass("form-control");
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