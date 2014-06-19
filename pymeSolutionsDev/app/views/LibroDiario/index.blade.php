@extends('layouts.scaffold')

@section('main')

<div class="page-header">
	<div class="row">
		      <h2 class="pull-lef">Libro Diario &gt; <small>Ver Asientos</small> <!--a href="{{URL::to('contabilidad')}}" class="btn btn-sm btn-primary pull-right">
		        	<i class="glyphicon glyphicon-arrow-left"></i> Atras</a--></h2>
		
	</div>
</div>
@if(Seguridad::CrearAsientosContable())
<div>
	<a href="{{URL::to('contabilidad/crear/asientocontable')}}" class="btn btn-info">
	<span class="glyphicon glyphicon-edit"></span> Crear Asiento</a>
</div>
<br>
@endif

@if($PeriodoContable!=null && $PeriodoContable->count())
<form id="search" action="{{URL::route('con.librodiario.search')}}" method="post">
      <div class="well table form-inline">
            <label><i class="glyphicon glyphicon-calendar"></i> Fecha Inicio:</label>
            	<input required name="date1" type="text" class="span2 form-control" value="" id="dpd1" placeholder="aaaa-mm-dd" readonly>

            <label><i class="glyphicon glyphicon-calendar"></i> Fecha Final:</label>
            	<input required name="date2" type="text" class="span2 form-control" value="" id="dpd2" placeholder="aaaa-mm-dd" readonly >
            <button id='charge' type="Submmit" class="btn btn-success">Filtrar</button>
            <label id="lbl-filtro"></label>
      </div>
</form>
      <p class="result"></p>
<div id="LibroDiario">
	@include('LibroDiario.table')
</div>


@stop
@section('contabilidad_scripts')
	<link rel="stylesheet" href="<?php public_path(); ?>/datepicker/css/datepicker.css">
	<script src="<?php public_path(); ?>/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		
		var firstTemp = "{{strstr($PeriodoContable->CON_PeriodoContable_FechaInicio,' ',true)}}";
		firstTemp=firstTemp.split('-');
		var now = new Date(parseInt(firstTemp[0]),parseInt(firstTemp[1])-1,parseInt(firstTemp[2]),0,0,0,0);

		var checkin = $('#dpd1').datepicker({
		  format: 'yyyy-mm-dd', 
		  onRender: function(date) {

		    return date.valueOf() < now.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  if (ev.date.valueOf() > checkout.date.valueOf()) {
		    var newDate = new Date(ev.date);
		    newDate.setDate(newDate.getDate() + 1);
		    checkout.setValue(newDate);
		  }
		  checkin.hide();
		  $('#dpd2')[0].focus();
		}).data('datepicker');
		checkin.setValue(now);
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
	
		$(document).ready(function(){

			/*$('#charge').on('click',function(){


				$.ajax({
					type:'post',
					url:'librodiario',
					data:{date1:$('#dpd1').val(),date2:$('#dpd2').val()},
				success:function(data){
					//console.log(data.id);
					//console.log(data);
					$('#LibroDiario').html(data);
					$('#lbl-filtro')[0].textContent='Listo';
				},
				beforeSend:function(){
					if($('#dpd1').val()=="" || $('#dpd2').val()==""){
						$('#lbl-filtro')[0].textContent='Tiene campos sin llenar';
						return false;
					}
					$('#lbl-filtro')[0].textContent='Espere...';
					return true;
				},
				error:function(error,xhr){
					$('#lbl-filtro')[0].textContent='Se produjo un error';
					console.log(error.responseText);
					console.log(xhr);
				}
				});
			});
*/
			@if (isset($Fields))
				$("#dpd1").val("{{ $Fields[0] }}");
				$("#dpd2").val("{{ $Fields[1] }}");
			@endif

			$("#search").on('submit',function(e){
				if ($('#dpd1').val()=="" || $('#dpd2').val()==""){
					$('#lbl-filtro')[0].textContent='Tiene campos sin llenar';
					e.preventDefault();
				}else{
					$('#lbl-filtro')[0].textContent='Espere...';
				}

			});	
			$('.revertir').on('click',function(e){
			
				$.post('{{{URL::route("revertirasiento")}}}',{id:e.toElement.id})
				.success(function(data){
					//console.log(data.id);
					//console.log(data);
					if(data.success){
						location.reload();
					}

				});
				//console.log('itworks');	
			});
		});
	</script>

	@stop
	@else
	<div align="center" class="well container col-md-8 col-md-offset-2">
	
	<h3>No hay periodos contables</h3>
	<a class='btn btn-info btn-lg' href="{{{URL::route('periodocontable')}}}">Crear Nuevo Periodo</a>
	</div>
	@stop	
@endif
