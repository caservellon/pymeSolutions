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
	      <h5 class="col-md-6"><strong>Proveedor:</strong></h5> <h5 class="col-md-6" style="margin-left:-15%;"> {{{ $proveedores[$ordenes[$CodigoOrdenCompra - 1]->COM_Proveedor_IdProveedor]->INV_Proveedor_Nombre }}}</h5>
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
    	<a href="{{{ URL::to('Inventario/MovimientoInventario') }}}" class="btn btn-primary btn-block" style="margin-top:5%;">Recibida</a>
    </div>
    <div class="col-md-4" style="text-align:right;">
    	<a href="{{{ URL::to('Inventario/MovimientoInventario') }}}" class="btn btn-primary btn-block" style="margin-top:5%;">Recibida con Errores</a>
    </div>
    <div class="col-md-4" style="text-align:right;">
    	<a href="{{{ URL::to('Inventario/MovimientoInventario') }}}" class="btn btn-primary btn-block" style="margin-top:5%;">Rechazada</a>
    </div>


	<div class="col-md-10"><h3>Detalle Orden Compra</h3></div>
	<div class="table-responsive">
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
	no
@endif

@stop