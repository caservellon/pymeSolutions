@extends ('layouts.scaffold')
@section('main')


<div class="page-header">
	<div class="row">
	<h2 class='sub-header'><i class="glyphicon glyphicon-cog"></i>Balanza de Comprobacion <small> Ver</small>
	<a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad')}}">
	    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
	</h2>
	</div>
</div>

<div class="row">
	<div class="col-sm-3 form-group">
		{{Form::label('CP','Clasificacion de Periodo:')}}
		<div>
		{{Form::select('CP',$Periodos,NULL,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="col-sm-3 form-group">
		<label>Periodo:</label>
		<div id="periodos">
			<select id="PC" class="form-control"></select>
		</div>
	</div>
</div>
<br>
<div id="table">
</div>

<!--a class='btn btn-default pull-right disabled' href="">Generar Balanza Comprobacion Ajustada</a-->
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
										$("#table").html(data);
										$(".date").html("Para el "+$("#PC option:selected").text().split("-")[1]);
									});
						});
						$('#PC').change();
				});
			});

			
			$('#CP').change();
	});

	</script>

@stop
