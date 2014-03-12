@extends('layouts.scaffold')

@section('main')

<h1>Libro Diario</h1>
@if($PeriodoContable->count())
<link rel="stylesheet" href="<?php public_path(); ?>/datepicker/css/datepicker.css">
<script src="<?php public_path(); ?>/datepicker/js/bootstrap-datepicker.js"></script>


      <div class="well table form-inline">
            <label>Fecha Inicio:</label> <input type="text" class="span2 form-control" value="" id="dpd1">
            <label>Fecha Final:</label> <input type="text" class="span2 form-control" value="" id="dpd2">
            <button id='charge' type="Submmit" class="btn btn-success">Cargar</button>
      </div>
      <p class="result"></p>
<div id="LibroDiario">
	@include('LibroDiario.table')

</div>
	<script type="text/javascript">
		var firstTemp = "{{strstr($PeriodoContable->CON_PeriodoContable_FechaInicio,' ',true)}}";
		firstTemp=firstTemp.split('-');
		var now = new Date(parseInt(firstTemp[0]),parseInt(firstTemp[1])-1,parseInt(firstTemp[2]));
		var checkin = $('#dpd1').datepicker({
		  format: 'yyyy-mm-dd', 
		  onRender: function(date) {
		    return date.valueOf() < now.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  if (ev.date.valueOf() > checkout.date.valueOf()) {
		    var newDate = new Date(ev.date)
		    newDate.setDate(newDate.getDate() + 1);
		    checkout.setValue(newDate);
		  }
		  checkin.hide();
		  $('#dpd2')[0].focus();
		}).data('datepicker');

		var checkout = $('#dpd2').datepicker({
			format: 'yyyy-mm-dd',
		  onRender: function(date) {
		    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  checkout.hide();
		}).data('datepicker');
	</script>
	<script type="text/javascript">

		$(document).ready($('#charge').on('click',function()
			{

				$.post('librodiario',{date1:$('#dpd1').val(),date2:$('#dpd2').val()}).then(function(data){
					$("#LibroDiario").html(data);
				});


			}));
	</script>
@else
	No hay periodos contables
@endif
@stop