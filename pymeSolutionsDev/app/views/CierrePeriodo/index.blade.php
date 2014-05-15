@extends ('layouts.scaffold')

@section ('main')
<div class="page-header containe">
	<div class="row">
		<div class="col-sm-10">
			<h2><i class="glyphicon glyphicon-time"></i> Cierre de Periodo</h2>
		</div>

		<div class="col-sm-2">
			<a class="btn btn-sm btn-primary pull-right" href="{{{URL::route('con.cierreperiodo')}}}">
			<i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
		</div>
	</div>
</div>

<div id="h4-msg">
	<h4 id="h4-Mayorizacion" class="alert alert-info"> Mayorizacion </h4>
	<h4 id="h4-Balanza" class="alert alert-info"> Balanza Comprobacion </h4>
	<h4 id="h4-Estado" class="alert alert-info"> Estado de Resultados </h4>
	<h4 id="h4-Balance" class="alert alert-info"> Balance General </h4>
	<h4 id="h4-NuevoPeriodo" class="alert alert-info"> Nuevo Periodo </h4>
</div>
<div>
	<h4 id="h4-error" class="alert" style="display:none"> </h4>
</div>

<div class="row ">
	<div id="buttons"  class="col-sm-2">
		<button id="btn-cierre" class="btn btn-lg btn-success">Iniciar Cierre</button>
		<button id="btn-reintentar" class="btn btn-lg btn-primary" style="display:none;">Reintentar</button>
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

		var funEstado=function(){
						$.ajax({
							url:"{{URL::route('con.cierreperiodo.estado')}}",
							method:"post",
							success: function(data){
								console.log('state: ');
								console.log(data);
								var msgs=$("#h4-msg")[0].children;
								for (var i = 0; i < data.length; i++) {
									$(msgs[data[i][0]]).attr('class','alert alert-success');
									$("#bar").attr('style','width:'+data[i][1]);
								};
							}
						});
					};
		
		var funEjecutar= function(){
			$.ajax({
				url:"{{URL::route('con.cierreperiodo.run')}}",
				method: "post",
				success: function(data){
					//window.clearInterval(estado);
					var msgs=$("#h4-msg")[0].children;
					
					if(data.success){
						console.log('run: ');
						console.log(data);
						for (var i = 0; i < msgs.length; i++) {
								$(msgs[i]).attr('class','alert alert-success');
						};
					}else{
						console.log('not success: ');
						console.log(data.error);
						
						$("#btn-reintentar").attr('style','');
						
						for (var i = 0; i < data.current; i++) {
								$(msgs[i]).attr('class','alert alert-success');
						};
						$(msgs[data.current]).attr('class','alert alert-danger');
						$("#h4-error").attr("style","").text(data.error);
					}	
				}
			});	
		}
		$('#btn-cierre').on('click',function(){
			var estado,btn;
			btn=$(this);
			btn.remove();
			estado = window.setTimeout(funEstado,1);
			funEjecutar();

		});

		$('#btn-reintentar').on('click',function(){
			$("#h4-msg").children().attr('class','alert alert-info');
			$("#bar").attr('style','width:0%');
			$("#h4-error").attr("style","display:none").text("");
			estado = window.setTimeout(funEstado,1);
			funEjecutar();
		});

	});

</script>

@stop