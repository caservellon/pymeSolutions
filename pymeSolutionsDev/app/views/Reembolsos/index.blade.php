@extends('layouts.scaffold')

@section('main')

<div class="page-header">
	<div class='row'>
		<div class='col-sm-10'>
			 <h2><i class='glyphicon glyphicon-list'></i> Reembolsos pendientes </h2>
		</div>
		<div class="col-sm-2">
			<a href="{{URL::route('con.principal')}}" class="btn btn-sm btn-primary">
				<i class="glyphicon glyphicon-arrow-left"></i> Atras
			</a>
		</div>
	</div>
	</div>
@if($Reembolsos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<th>Proveedor deudor</th>
			<th>Monto de la devolucion </th>
			<th>Accion </th>
		</thead>

		<tbody>
			@foreach ($Reembolsos as $reembolso)
				<?php $ProveedorName=invContabilidad::ProveedorInfo(
				$reembolso->COM_ReembosoDevolucionCompras_Proveedor); ?>
				<td>{{ $ProveedorName->INV_Proveedor_Nombre}}</td>
				<td>{{ $reembolso->COM_ReembosoDevolucionCompras_Monto}} </td>
				@if(Seguridad::RealizarReembolso())
					<td><a href="{{URL::route('con.registrarReembolso',$reembolso->COM_ReembosoDevolucionCompras_ID)}}" class="btn btn-success">Marcar recibido</a>
				@endif
			@endforeach

		</tbody>



	</table>
@else
<p>No hay Reembolsos Pendientes</p>
@endif
@stop