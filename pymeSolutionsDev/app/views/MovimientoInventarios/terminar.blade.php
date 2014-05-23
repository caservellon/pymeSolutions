@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Movimiento Inventario &gt; <small>Detalles</small></h3>
</div>
<div class="form-horizontal" role="form">
<div class="form-group">
    <h4>Fecha</h4>
    <div class="col-md-6">
        {{{ $Movimiento->INV_Movimiento_FechaCreacion }}}
    </div>
</div>
<div class="form-group">
    <h4>Concepto</h4>
    <div class="col-md-5">
        {{{ $Motivo }}}
    </div>
</div>
<div class="form-group">
    <h4>Observaciones</h4>
    <div class="col-md-8">
        {{{ $Movimiento->INV_Movimiento_Observaciones }}}
    </div>
</div>

<h4 class="sub-header">Productos</h4>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Venta</th>
                <th>Precio Costo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Detalles as $Detalle)
                <tr>
                    <td>{{{ $Detalle->INV_DetalleMovimiento_IDProducto }}}</td>
                    <td>{{{ $Detalle->INV_DetalleMovimiento_CodigoProducto }}}</td>
                    <td>{{{ $Detalle->INV_DetalleMovimiento_NombreProducto }}}</td>
                    <td>{{{ $Detalle->INV_DetalleMovimiento_CantidadProducto }}}</td>
                    <td>{{{ $Detalle->INV_DetalleMovimiento_PrecioVenta }}}</td>
                    <td>{{{ $Detalle->INV_DetalleMovimiento_PrecioCosto }}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
</div>
<div class="form-group">
    {{ link_to_route('Inventario.MovimientoInventario.index', 'Aceptar', null, array('class' => 'btn btn-info')) }}
</div>
@stop