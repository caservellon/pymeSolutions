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

		function ajax_calls(params,n){
			if(n<params.length){
				ob=params[n];
				$.ajax({
					url:ob.url,
					method:"post",
					success: function(data){
						$("#h4-"+ob.h4).removeClass('alert-info').addClass('alert-success');
						$("#bar").attr('style','width:'+ob.barWidth);
						if(params.length==(n+1)){
							$('.progress').removeClass('active');
							//$('#btn-cierre').remove();
							return true;
						}
						n++;
						ajax_calls(params,n);
					},
					error: function(xhr){
						console.log(xhr.responseText);
						$('#h4-'+ob.h4).removeClass('alert-info').addClass('alert-danger');
					}
				});
			}
		}

		$('#btn-cierre').on('click',function(){
			array=[
				{url:"{{{URL::route('con.mayorizar')}}}",h4:"Mayorizacion",barWidth:"25%"},
				{url:"{{{URL::route('con.balanza')}}}",h4:"Balanza",barWidth:"50%"},
				{url:"{{{URL::route('con.estado')}}}",h4:"Estado",barWidth:"75%"},
				{url:"{{{URL::route('con.balance')}}}",h4:"Balance",barWidth:"100%"}
			];	
			ajax_calls(array,0);

		});

	

	

	});

</script>

@stop