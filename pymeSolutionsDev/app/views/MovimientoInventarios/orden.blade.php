@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Movimiento Inventario <small>Registro de Orden<small></h2>
<div class="btn-agregar">
	<div class="pull-right">
    	<a href="{{{ URL::to('Inventario/MovimientoInventario') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    </div>
</div>
<div>
	{{ Form::open(array('route' => 'Inventario.MovimientoInventario.search', 'class' => "form-horizontal" , 'role' => 'form')) }}
		<div class="form-group" style="margin-top: 5%;">
		    {{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-6">
			    {{ Form::text('search', null, array('class' => 'form-control', 'id' => 'search', 'placeholder'=>'Ingrese el código de la Orden de Compra')) }}
			</div>
			<div class="col-md-2">
			    {{ Form::submit('Buscar', array('class' => 'btn btn-info')) }}
			</div>
		</div>
	{{ Form::close() }}
</div>

@if ($orden)
	<h3>Orden de Compra</h3>
	<div class="col-md-8">
		<div class="col-md-13">
	      <h5 class="col-md-6"><strong>Código Orden:</strong></h5> <h5 class="col-md-6" style="margin-left:-15%;">{{{ $ordenes[$CodigoOrdenCompra - 1]->COM_OrdenCompra_Codigo }}}</h5>
	    </div>
	    <div class="col-md-13">
	      <h5 class="col-md-6"><strong>Proveedor:</strong></h5> <h5 class="col-md-6" style="margin-left:-15%;"> {{{ $proveedores[$ordenes[$CodigoOrdenCompra - 1]->COM_Proveedor_IdProveedor - 1]->INV_Proveedor_Nombre }}}</h5>
	    </div>
	    <div class="col-md-13">
	      <h5 class="col-md-6"><strong>Fecha de Emisión:</strong></h5> <h5 class="col-md-6" style="margin-left:-15%;"> {{{ $ordenes[$CodigoOrdenCompra - 1]->COM_OrdenCompra_FechaEmision }}}</h5>
	    </div>
	    <div class="col-md-13">
	      <h5 class="col-md-6"><strong>Fecha de Entrega:</strong></h5> <h5 class="col-md-6" style="margin-left:-15%;"> {{{ $ordenes[$CodigoOrdenCompra - 1]->COM_OrdenCompra_FechaEntrega }}}</h5>
	    </div>
	    <div class="col-md-13">
	      <h5 class="col-md-6"><strong>Dirección:</strong></h5> <h5 class="col-md-6" style="margin-left:-15%;"> {{{ $ordenes[$CodigoOrdenCompra - 1]->COM_OrdenCompra_DireccionEntrega }}}</h5>
	    </div>
    </div>

    <div class="col-md-4" style="text-align:right;">
    	{{ Form::open(array('method' => 'POST', 'route' => 'Inventario.MovimientoInventario.Recibida')) }}
			{{ Form::hidden('INV_Movimiento_IDOrdenCompra', $ordenes[$CodigoOrdenCompra - 1]->COM_OrdenCompra_IdOrdenCompra) }}
			{{ Form::hidden('INV_Movimiento_Observaciones', 'Compra Recibida') }}
			{{ Form::hidden('INV_Movimiento_FechaCreacion', date('Y-m-d H:i:s')) }}
			{{ Form::hidden('INV_Movimiento_UsuarioCreacion', 'Admin') }}
			{{ Form::hidden('INV_Movimiento_FechaModificacion', date('Y-m-d H:i:s')) }}
			{{ Form::hidden('INV_Movimiento_UsuarioModificacion', 'Admin') }}
			{{ Form::hidden('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', 2) }}
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Observaciones</h4>
			      </div>
			      <div class="modal-body">
			       	{{ Form::textarea('INV_Movimiento_Observaciones', 'Compra Recibida', array('class' => 'form-control', 'id' => 'INV_Movimiento_Observaciones', 'placeholder' => 'Observaciones', 'rows' => '3', 'maxlength'=>'256')) }}
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			        {{ Form::submit('Aceptar', array('class' => 'btn btn-primary')) }}
			      </div>
			    </div>
			  </div>
			</div>
		<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
		  Recibida
		</button>
		{{ Form::close() }}
    </div>
    <div class="col-md-4" style="text-align:right;">
    	{{ Form::open(array('method' => 'POST', 'route' => 'Inventario.MovimientoInventario.Recibida')) }}
			{{ Form::hidden('INV_Movimiento_IDOrdenCompra', $ordenes[$CodigoOrdenCompra - 1]->COM_OrdenCompra_IdOrdenCompra) }}
			{{ Form::hidden('INV_Movimiento_Observaciones', 'Compra Recibida Con Errores') }}
			{{ Form::hidden('INV_Movimiento_FechaCreacion', date('Y-m-d H:i:s')) }}
			{{ Form::hidden('INV_Movimiento_UsuarioCreacion', 'Admin') }}
			{{ Form::hidden('INV_Movimiento_FechaModificacion', date('Y-m-d H:i:s')) }}
			{{ Form::hidden('INV_Movimiento_UsuarioModificacion', 'Admin') }}
			{{ Form::hidden('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', 2) }}
			{{ Form::submit('Recibida Con Errores', array('class' => 'btn btn-primary btn-block', 'style' => 'margin-top:5%;')) }}
		{{ Form::close() }}
    </div>
    <div class="col-md-4" style="text-align:right;">
    	{{ Form::open(array('method' => 'POST', 'route' => 'Inventario.MovimientoInventario.Rechazada')) }}
			{{ Form::hidden('INV_Movimiento_IDOrdenCompra', $ordenes[$CodigoOrdenCompra - 1]->COM_OrdenCompra_IdOrdenCompra) }}
			{{ Form::hidden('INV_Movimiento_Observaciones', 'Compra Rechazada') }}
			{{ Form::hidden('INV_Movimiento_FechaCreacion', date('Y-m-d H:i:s')) }}
			{{ Form::hidden('INV_Movimiento_UsuarioCreacion', 'Admin') }}
			{{ Form::hidden('INV_Movimiento_FechaModificacion', date('Y-m-d H:i:s')) }}
			{{ Form::hidden('INV_Movimiento_UsuarioModificacion', 'Admin') }}
			{{ Form::hidden('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', 2) }}
			{{ Form::submit('Rechazada', array('class' => 'btn btn-primary btn-block', 'style' => 'margin-top:5%;')) }}
		{{ Form::close() }}
    </div>


	<div class="col-md-10"><h3>Detalle Orden Compra</h3></div>
	<div class="table-responsive col-md-12">
        <table class="table table-striped">
            <thead>
				<tr>
					<th>#</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
				</tr>
			</thead>
		    <tbody>
		       	@foreach ($orden as $orden)
		           	<tr>
		           		<td>{{{ $orden->ID }}}</td>
						<td>{{{ $orden->Nombre }}}</td>
						<td>{{{ $orden->Cantidad }}}</td>
						<td>{{{ $orden->Precio }}}</td>
					</tr>
		        @endforeach
            </tbody>
        </table>
    </div>
@else
	@if ($ordenes->count())
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Código</th>
						<th>Proveedor</th>
						<th>Estado de la Orden</th>
						<th>Fecha Entrega</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($ordenes as $orden)
						<tr>
							<td>{{{ $orden->COM_OrdenCompra_Codigo }}}</td>
							<td>{{{ $proveedores[$orden->COM_Proveedor_IdProveedor - 1]->INV_Proveedor_Nombre }}}</td>
							<td> En Proceso </td>
							<td>{{{ $orden->COM_OrdenCompra_FechaEntrega }}}</td>
							<td>
								{{ Form::open(array('method' => 'POST', 'route' => 'Inventario.MovimientoInventario.search')) }}
									{{ Form::hidden('search', $orden->COM_OrdenCompra_Codigo) }}
									{{ Form::submit('Ver Detalles', array('class' => 'btn btn-info')) }}
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<div class="alert alert-danger">
			<h3>No Hay Órdenes de Compra Disponibles</h3>
		</div>
	@endif

@endif

@stop