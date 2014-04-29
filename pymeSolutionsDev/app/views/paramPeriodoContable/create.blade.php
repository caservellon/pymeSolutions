@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Periodo Contable &gt; <small>Nuevo Periodo</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('contabilidad/configuracion/periodocontable') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
      </div>
</div>

@include('_messages.errors')


{{ Form::open(array('route' => 'periodocontable','class'=>'form-horizontal','role'=>'form')) }}
	  

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_Nombre', 'Nombre del Periodo:*') }}
            <div class="col-md-5 ">
              {{ Form::text('CON_ClasificacionPeriodo_Nombre','',array('maxlength'=>'45','required')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_CatidadDias', 'Cantidad de Dias del Periodo:*') }}
            <div class="col-md-2">
            {{ Form::select('CON_ClasificacionPeriodo_CatidadDias',$CantidadDias) }}
            </div>
        </div>

        <div class="form-group">
         {{ Form::label('CON_PeriodoContable_FechaInicio', 'Fecha que Inicia el Periodo Contable:*') }}
         <div class="col-md-4"> 

         {{ Form::input('text', 'CON_PeriodoContable_FechaInicio','',array('value'=>'','id'=>'dpd1','placeholder'=>'aaaa-mm-dd','required')) }}
          </div>
        </div>

      <div class="col-md-5">
			{{ Form::submit('Agregar Periodo Contable', array('class' => 'btn btn-success')) }}
		  </div>
	
{{ Form::close() }}



@stop

@section('contabilidad_scripts')

<link rel="stylesheet" href="<?php public_path(); ?>/datepicker/css/datepicker.css">
<script src="<?php public_path(); ?>/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        $("input").addClass("form-control");
        $("select").addClass("form-control");
        $("label").addClass("col-md-4 control-label pull-left");
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