@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración > <small>Motivos de Inventario</small></h2>

<div class="pull-right">
    <a href="{{{ URL::to('contabilidad/configuracion') }}}" class="btn btn-sm btn-primary">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
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
			<th>Motivo Asignado</th>
			<th>Activo</th>
			@if(Seguridad::ConfigurarMotivosDeInventario())
			<th></th>
			@endif
		</tr>
	</thead>	
<tbody>
@foreach($Conceptos as $concepto)
<tr>
	@if($concepto->INV_MotivoMovimiento_Activo)
	
		<td>{{{$concepto->INV_MotivoMovimiento_Nombre}}}</td>
		@if($concepto->INV_MotivoMovimiento_TipoMovimiento == 1)
			<td>Salida</td>
		@else
			<td>Entrada</td>
		@endif
		<td>{{{$concepto->INV_MotivoMovimiento_Observaciones}}}</td>
		<td>{{ $concepto->CON_MotivoTransaccion_Descripcion}}</td>
		@if ($concepto->INV_MotivoMovimiento_Activo == 1)
		<td ><span class="glyphicon glyphicon-ok"></td>
		@else 
		<td><span class="glyphicon glyphicon-remove"></td>
		@endif
		@if(Seguridad::ConfigurarMotivosDeInventario())
        <td><a class="btn btn-info" href="{{ URL::route('con.motivoinventario.editar',$concepto->INV_MotivoMovimiento_ID) }}"><i class="glyphicon glyphicon-pencil"></i> Editar</a></td>
        @endif
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
			@if(Seguridad::ConfigurarMotivosDeInventario())
			<th></th>
			@endif
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
		@if (Seguridad::ConfigurarMotivosDeInventario())
        <td><a class="btn btn-info" href="{{ URL::route('con.motivoinventario.editar',$concepto->INV_MotivoMovimiento_ID) }}"><i class="glyphicon glyphicon-pencil"></i> Editar</a></td>
        @endif
        @endif
        </tr>
@endforeach
</tbody>
</table>
@else
<p>No hay conceptos!</p>
@endif


@stop
