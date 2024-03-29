@extends('layouts.scaffold')



@section('main')

<div id="options">
	<div class="page-header">
		<div class="row">
		<h2 class='sub-header'><i class="glyphicon glyphicon-paperclip"></i> Estados Financieros 
		<!--a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad')}}">
		    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a-->
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
		  <li id="tab_balanza" class="active">
		  	<a href="#balanza" data-toggle="tab">Balanza de Comprobacion</a></li>
		  <li id="tab_estado"><a href="#estado" data-toggle="tab">Estado de Resultados</a></li>
		  <li id="tab_balance"><a href="#balance" data-toggle="tab">Balance General</a></li>
		  <li id="tab_libromayor" ><a href="#libromayor" data-toggle="tab">Libro Mayor</a></li>
		</ul>
</div>
		<!-- tab content -->
		<div class="tab-content">
		  <div class="tab-pane fade in active" id="balanza"></div>
		  <div class="tab-pane fade" id="estado"></div>
		  <div class="tab-pane fade" id="balance"></div>
		  <div class="tab-pane fade" id="libromayor"></div>
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
							flag_balanza = flag_estado = flag_balance = flag_libromayor = false;
							cleanTabs();
							window.setTimeout($("li.active a").click(),2000);
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

			$('#tab_balanza a').click(function (e){
				if(!flag_balanza){
				$.post('{{URL::route("con.balanza")}}',{id:$("#PC").val()})
							.success(function(data){
								flag_balanza=true;
								$("#balanza").html(data);
								$(".date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
							});
				}
			});

			$('#tab_estado a').click(function (e) {
			if(!flag_estado){
			  $.post('{{URL::route("con.estado")}}',{id:$("#PC").val()})
									.success(function(data){
										flag_estado=true;
										$("#estado").html(data);
										$(".estado-date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
										
									});
			}
			});

			$('#tab_balance a').click(function (e) {
				if(!flag_balance){
				$.post('{{URL::route("con.balance")}}',{id:$("#PC").val()})
									.success(function(data){
										flag_balance=true;
										$("#balance").html(data);
										$(".balance-date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
										
									});
				}
			});

			$('#tab_libromayor a').click(function (e) {
				if(!flag_libromayor){
				$.post('{{URL::route("con.libromayor")}}',{id:$("#PC").val()})
									.success(function(data){
										flag_libromayor=true;
										$("#libromayor").html(data);
										$(".date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
										
									});
				}
			});

			function cleanTabs(){
				var layout='<div class="jumbotron" align="center">'
							  +'<h3><i class="glyphicon glyphicon-list"></i> :title</h3>'
							+'</div>';
				$("#balanza").html(layout.replace(":title","Balanza de Comprobacion"));
				$("#estado").html(layout.replace(":title","Estado de Resultados"));
				$("#balance").html(layout.replace(":title","Balance General"));
				$("#libromayor").html(layout.replace(":title","Libro Mayor"));
			}
			  
	});

	</script>
			

@stop