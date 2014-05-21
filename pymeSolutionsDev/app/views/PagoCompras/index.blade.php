@extends('layouts.scaffold')


@section('main')
	<div class="page-header">
	<div class='row'>
		<div class='col-sm-10'>
			 <h2><i class='glyphicon glyphicon-list'></i> Lista de pagos </h2>
		</div>
		<div class="col-sm-2">
			<a href="{{URL::route('con.principal')}}" class="btn btn-sm btn-primary">
				<i class="glyphicon glyphicon-arrow-left"></i> Atras
			</a>
		</div>
	</div>
	</div>

	<div>
		<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th>Codigo</th>
			<th>Proveedor</th>
			<th>Total</th>
			
			<th>Forma de Pago</th>
			<th>Fecha limite de pago</th>
			<th>Por pagar</th>
			<th>Cuota</th>
			<th>Accion</th>
		</tr>
		</thead>
		<tbody>


			<?php $count=-1; ?>
			@foreach ($OrdenesPago as $key)
			<?php $idop=$key['idop']; $count++; ?>
			<tr>
				<td>{{$idop}}</td>
				<td> {{ invContabilidad::ProveedorInfo($key['idop'])->INV_Proveedor_Nombre}}</td>
				<td> {{$key['total']}}</td>

					<?php $porpagar=PagoCompras::find($idop);
					 $var=invContabilidad::getFormaPago($key['idfp']);?>
				<td> {{$var['Nombre']; }}</td>
				<td> -- </td>

				@if ($porpagar)
					<td> {{$porpagar->CON_Pago_PorPagar }}</td>
				@else
					<td> {{$key['total']}}</td>
				@endif
				<td> -- </td>
				<td>
				<button id="{{$count}}" class="pago btn btn-success">
				Pagar 	<i class="glyphicon glyphicon-usd"></i></button> 
				
				</td>
			</tr>
			@endforeach									
		</tbody>
		</table>
	</div>

@stop

@section('contabilidad_scripts')
	
	<script type="text/javascript">
	$(".pago").on('click',function(){
		//alert(this.id);
		$.post("{{URL::route('con.pagarcompra')}}",{id:this.id})
			.success(function(data){
				//alert(data);
				location.reload();
			})
			.error(function(xhr,error){
				console.log(xhr.responseText);
				console.log(error.responseText);
			});

	});

	</script>

@stop