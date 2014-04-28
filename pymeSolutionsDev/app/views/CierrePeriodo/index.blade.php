@extends ('layouts.scaffold')

@section ('main')
<div class="page-header containe">
	<div class="row">
		<div class="col-sm-10">
			<h2><i class="glyphicon glyphicon-time"></i> Cierre de Periodo</h2>
		</div>

		<div class="col-sm-2">
			<a class="btn btn-primary pull-right" href="{{{URL::to('contabilidad')}}}">Atras</a>
		</div>
	</div>
</div>

<h4 id="h4-Mayorizacion" class="alert alert-info"> Mayorizacion </h4>
<h4 id="h4-Balanza" class="alert alert-info"> Balanza Comprobacion </h4>
<h4 id="h4-Estado" class="alert alert-info"> Estado de Resultados </h4>
<h4 id="h4-Balance" class="alert alert-info"> Balance General </h4>
<div class="row ">
	<div class="col-sm-2">
		<button id="btn-cierre" class="btn btn-lg btn-success">Iniciar Cierre</button>
	</div>
	<div class="col-sm-10">
		<div class="progress progress-striped active">
		  <div id="bar" class="progress-bar "  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
		    <span class="sr-only">0% Complete</span>
		  </div>
		</div>
	</div>
</div>
@stop

@section('contabilidad_scripts')
<script type="text/javascript">
	
	$(document).ready(function(){

		$('#btn-cierre').on('click',function(){
			btnCierre = $(this);
			$.ajax({
				url: "{{{URL::route('con.mayorizar')}}}",
				method: "post",
				beforeSend: function(){
					 btnCierre.text('Espere...');
					 return true;
				},
				success: function(data){
					$('#h4-Mayorizacion').removeClass('alert-info').addClass('alert-success');
					$('#bar').attr('style','width:25%');
					$.ajax({
						url: "{{{URL::route('con.balanza')}}}",
						method: "post",
						success: function(data){
							$('#h4-Balanza').removeClass('alert-info').addClass('alert-success');
							$('#bar').attr('style','width:50%');
							$.ajax({
								url: "{{{URL::route('con.estado')}}}",
								method: "post",
								success: function(data){
									$('#h4-Estado').removeClass('alert-info').addClass('alert-success');
									$('#bar').attr('style','width:75%');
									$.ajax({
										url: "{{{URL::route('con.balance')}}}",
										method: "post",
										success: function(data){
											$('#h4-Balance').removeClass('alert-info').addClass('alert-success');
											$('#bar').attr('style','width:100%');
											$('.progress').removeClass('active');
											//btnCierre.on('click',null);
										},
										error: function(xhr){
											console.log(xhr);
										}
									});
								},
								error: function(xhr){
									console.log
								}
							});
						},
						error: function(xhr){
							console.log(xhr);
						}
					});
				},
				error: function(xhr){
					console.log(xhr);
					$('#h4-Mayorizacion').removeClass('alert-info').addClass('alert-danger');
				}
			});		

		});

	});

</script>

@stop