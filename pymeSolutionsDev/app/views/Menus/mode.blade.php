@extends('layouts.scaffold')

@section('main')

<br>
<div class="page-header">
	<div class="row">
		<div class="col-sm-10">
		<h1><i class="glyphicon glyphicon-cog"></i> Mantenimiento</h1>
		</div>
		<div class="col-sm-2">
		<a class="btn btn-sm btn-primary pull-right" href="#">
		<i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
		</div>
	</div>
</div>
<br>
<p>Your ip: {{Request::getClientIp()}}</p>
@if (App::isDownForMaintenance())
	<button id="btn-up" class="btn btn-primary">Salir de modo mantenimiento</button>
	<i id="icon-up" class="glyphicon glyphicon-ok" style="display:none;"></i>
@else
	<button id="btn-down" class="btn btn-warning">Entrar a modo mantenimiento</button>
	<i id="icon-down" class="glyphicon glyphicon-ok" style="display:none;"></i>
@endif

@stop

@section ('contabilidad_scripts')
	<script type="text/javascript">
	$(document).ready(function(){
			$("#btn-up").on('click',function(){
				$.post("{{URL::route('mantenimiento.up')}}").success(function(data){
					$('#icon-up').attr('style','');
					window.setTimeout(function(){window.location.reload()},300);
				});
			});

			$("#btn-down").on('click',function(){
				$.post("{{URL::route('mantenimiento.down')}}").success(function(data){
					$('#icon-down').attr('style','');
					window.setTimeout(function(){window.location.reload()},300);
				});
			});

	});

	</script>
@stop