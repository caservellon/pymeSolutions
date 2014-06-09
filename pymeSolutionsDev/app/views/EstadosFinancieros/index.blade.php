@extends('layouts.scaffold')



@section('main')

<div id="options">
	<div class="page-header">
		<div class="row">
		<h2 class='sub-header'><i class="glyphicon glyphicon-paperclip"></i> Estados Financieros 
		<a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad')}}">
		    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
		</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4 form-group">
			{{Form::label('CP','Clasificacion de Periodo:')}}
			<div>
			{{Form::select('CP',$CPeriodos,NULL,array('class'=>'form-control', 'id'=>'CP'))}}
			</div>
		</div>
		<div class="col-sm-4 form-group">
			{{Form::label('PC','Periodo:')}}
			<div id="periodos">
				{{Form::select('PC',$Periodos,NULL,array('class'=>'form-control','id'=>'PC'))}}
			</div>
		</div>
		<div class="col-sm-4">
			<br>
			<button id="print" class="btn btn-success pull-right">Imprimir 
			<i class="glyphicon glyphicon-print"></i></button>
		</div>
	</div>

	<br>

	
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#balanza" data-toggle="tab">Balanza de Comprobacion</a></li>
		  <li id="tab_estado"><a href="#estado" data-toggle="tab">Estado de Resultados</a></li>
		  <li id="tab_balance"><a href="#balance" data-toggle="tab">Balance General</a></li>
		  <li><a href="#mayor" data-toggle="tab">Libro Mayor</a></li>
		</ul>
</div>
		<!-- tab content -->
		<div class="tab-content">
		  <div class="tab-pane fade in active" id="balanza">...</div>
		  <div class="tab-pane fade" id="estado">..</div>
		  <div class="tab-pane fade" id="balance">.</div>
		  <div class="tab-pane fade" id="mayor"></div>
		</div>


@stop

@section('contabilidad_scripts')

	<script type="text/javascript">
	var flag_balanza = flag_estado = flag_balance = flag_libromayor = false;
	$(document).ready(function(){



			$('#CP').on('change',function(){
				var PC=$('#PC')[0];
				PC.disabled=true;
				$.post('{{URL::route("con.periodoslist")}}',{id:this.value})
					.success(function(data){
						$("#periodos").html(data);
						PC.disabled=false;
						$('#PC').on('change',function(){

							$.post('{{URL::route("con.balanza")}}',{id:this.value})
									.success(function(data){
										flag_balanza=true;
										$("#balanza").html(data);
										$(".date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
									});
						});
						$('#PC').change();
				});

			});

			
			$('#CP').change();

			$('#print').on('click',function(){

				$("#options").toggle();
				window.print();
				$("#options").toggle();
			});

			$('#tab_estado a').click(function (e) {
			  
			  //e.preventDefault();
			  //$(this).tab('show');

			  $.post('{{URL::route("con.estado")}}',{id:$("#PC")[0].value})
									.success(function(data){
										flag_estado=true;
										$("#estado").html(data);
										$(".estado-date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
										
									});
			});

			$('#tab_balance a').click(function (e) {

				$.post('{{URL::route("con.balance")}}',{id:$("#PC")[0].value})
									.success(function(data){
										flag_estado=true;
										$("#balance").html(data);
										$(".balance-date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
										
									});
			});
			  
	});

	</script>

@stop