@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Motivos de Inventario</small></h2>

<div class="pull-right">
    <a href="{{{ URL::to('contabilidad/configuracion') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
</div>

<br>
<br>
@if(isset($Conceptos) && $Conceptos->count())
	
<h3>Motivos Activos</h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Tipo Movimiento</th>
			<th>Observaciones</th>
			<th>Activo</th>
			<th></th>
		</tr>
	</thead>	
<tbody>
@foreach($Conceptos as $concepto)
<tr>
	@if($concepto->INV_MotivoMovimiento_Activo)
	
		<td>{{{$concepto->INV_MotivoMovimiento_Nombre}}}</td>
		@if($concepto->INV_MotivoMovimiento_TipoMovimiento != 1)
			<td>Salida</td>
		@else
			<td>Entrada</td>
		@endif
		<td>{{{$concepto->INV_MotivoMovimiento_Observaciones}}}</td>
		@if ($concepto->INV_MotivoMovimiento_Activo == 1)
		<td ><span class="glyphicon glyphicon-ok"></td>
		@else 
		<td><span class="glyphicon glyphicon-remove"></td>
		@endif
        <td><a class="btn btn-info glyphicon glyphicon-pencil" href="{{ URL::to('contabilidad/configuracion/motivoinventarios/'.$concepto->INV_MotivoMovimiento_ID.'/edit') }}"> Editar</a></td>

        @endif
        </tr>
@endforeach
</tbody>
</table>

<h3>Motivos Inactivos</h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Tipo Movimiento</th>
			<th>Observaciones</th>
			<th>Activo</th>
			<th></th>
		</tr>
	</thead>	
<tbody>
@foreach($Conceptos as $concepto)
<tr>
	@if(!($concepto->INV_MotivoMovimiento_Activo)) <td>{{{$concepto->INV_MotivoMovimiento_Nombre}}}</td>
		@if($concepto->INV_MotivoMovimiento_TipoMovimiento!=1)
		<td>Entrada</td>
		@else
		<td>Salida</td>
		@endif
		<td>{{{$concepto->INV_MotivoMovimiento_Observaciones}}}</td>
		@if ($concepto->INV_MotivoMovimiento_Activo == 1)
		<td ><span class="glyphicon glyphicon-ok"></td>
		@else 
		<td><span class="glyphicon glyphicon-remove"></td>
		@endif
        <td><a class="btn btn-info glyphicon glyphicon-pencil" href="{{ URL::to('contabilidad/configuracion/motivoinventarios/'.$concepto->INV_MotivoMovimiento_ID.'/edit') }}"> Editar</a></td>

        @endif
        </tr>
@endforeach
</tbody>
</table>
@else
<p>No hay conceptos!</p>
@endif


@stop
