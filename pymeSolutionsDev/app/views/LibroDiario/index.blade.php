@extends('layouts.scaffold')

@section('main')

<h1>Libro Diario</h1>
<link rel="stylesheet" href="<?php public_path(); ?>/datepicker/css/datepicker.css">
<script src="<?php public_path(); ?>/datepicker/js/bootstrap-datepicker.js"></script>


      <div class="well table form-inline">
            <label>Fecha Inicio:</label> <input type="text" class="span2 form-control" value="" id="dpd1">
            <label>Fecha Final:</label> <input type="text" class="span2 form-control" value="" id="dpd2">
            <button id='charge' type="Submmit" class="btn btn-success">Cargar</button>
      </div>

@if ($LibroDiarios->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>Fecha</th>
				<th>Detalle Cuenta</th>
				<th>Debe</th>
				<th>Haber</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($LibroDiarios as $LibroDiario)
				<tr>
					<td>{{{ $LibroDiario->CON_LibroDiario_Observacion }}}</td>
                    <td>{{ link_to_route('LibroDiarios.edit', 'Edit', array($LibroDiario->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('LibroDiarios.destroy', $LibroDiario->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no LibroDiarios
@endif
	<script type="text/javascript">
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		 
		var checkin = $('#dpd1').datepicker({
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
				$.post('librodiario',{id:1});


			}));
	</script>

@stop
