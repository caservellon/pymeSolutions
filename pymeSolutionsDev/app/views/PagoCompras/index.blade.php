@extends('layouts.scaffold')


@section('main')
	<div class="page-header">
	<div class='row'>
		<div class='col-sm-10'>
			 <h2><i class='glyphicon glyphicon-list'></i> Lista de cuentas por pagar </h2>
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
			<th>Forma de Pago</th>
			<th>Fecha limite de pago</th>
			<th>Total</th>
			<th>Accion</th>
		</tr>
		</thead>
		<tbody>


			@foreach ($OrdenesPago as $key)
			<?php $idop=$key->COM_OrdenPago_IdOrdenPago; 
				$prov=invContabilidad::ProveedorInfo($key->COM_Proveedor_IdProveedor); ?>
			<tr>
				<td>{{$idop}}</td>
				<td> {{ $prov['INV_Proveedor_Nombre'] }}</td>
					<?php $porpagar=PagoCompras::find($idop);
					 $var=invContabilidad::getFormaPago($key->COM_OrdenCompra_FormaPago);?>
				<td> {{ $var['Nombre']; }}</td>
				<td> {{date('Y-m-d',strtotime($key->COM_OrdenCompra_FechaPagar))}} </td>
				<td> {{$key->COM_OrdenCompra_Monto}}</td>
				<td>
					<button id="{{$idop}}" class="pago btn btn-success">
						Pagar <i class="glyphicon glyphicon-hand-up"></i></button> 
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
				alert(data);
				location.reload();
			})
			.error(function(xhr,error){
				console.log(xhr.responseText);
				console.log(error.responseText);
			});

	});

	</script>

@stop