@extends('layouts.scaffold')

@section('main')
<link rel="stylesheet" href="<?php public_path(); ?>/datepicker/css/datepicker.css">
<script src="<?php public_path(); ?>/datepicker/js/bootstrap-datepicker.js"></script>

<h1>Crear Clasificacion Periodo</h1>

@include('_messages.errors')


{{ Form::open(array('url' => 'param-periodo')) }}
	  

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_Nombre', 'Nombre:') }}
            {{ Form::text('CON_ClasificacionPeriodo_Nombre','',array('maxlength'=>'45')) }}
        </div>

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_CatidadDias', 'Cantidad de dias:') }}
            {{ Form::text('CON_ClasificacionPeriodo_CatidadDias','',array('maxlength'=>'3','placeholder'=>'###')) }}
        </div>
        <div class="form-group">
         {{ Form::label('CON_PeriodoContable_FechaInicio', 'Fecha que inicia:') }} 
         {{ Form::text('CON_PeriodoContable_FechaInicio','',array('type'=>'text','class'=>'span2','value'=>'','id'=>'dpd1','placeholder'=>'yyyy-mm-dd')) }}
        </div>
		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</div>
	
{{ Form::close() }}


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
          /*if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }*/
          checkin.hide();
          //$('#dpd2')[0].focus();
        }).data('datepicker');
        /*
        var checkout = $('#dpd2').datepicker({
          format: 'yyyy-mm-dd',
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');*/
        
  });
</script>
@stop