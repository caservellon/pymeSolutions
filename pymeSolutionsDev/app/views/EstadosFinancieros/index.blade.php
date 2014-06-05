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
			{{Form::select('CP',$Periodos,NULL,array('class'=>'form-control'))}}
			</div>
		</div>
		<div class="col-sm-4 form-group">
			<label>Periodo:</label>
			<div id="periodos">
				<select id="PC" class="form-control"></select>
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
		  <li><a href="#estado" data-toggle="tab">Estado de Resultados</a></li>
		  <li><a href="#balance" data-toggle="tab">Balance General</a></li>
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

	$(document).ready(function(){

			$('#CP').on('change',function(){

				$.post('{{URL::route("con.blclasificacion")}}',{id:this.value})
					.success(function(data){
						$("#periodos").html(data);
						$('#PC').on('change',function(){

							$.post('{{URL::route("con.bltable")}}',{id:this.value})
									.success(function(data){
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
	});

	</script>

@stop