@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Devolución &gt; <small>Detalle de Devolución</small></h3>
      <div class="pull-right">
        <a href="/Ventas/Devs" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($Dev)
    <div class="table-responsive">
    <table class="table selectable table-striped" id="pro-list-table" data-editable="true">
    @foreach ( DB::table('VEN_Devolucion')->where('VEN_Devolucion_id', array_values($Dev)[0]->VEN_Devolucion_VEN_Devolucion_id)->distinct()->get() as $DEV )
      <h2>Devolución Número: {{{ $DEV->VEN_Devolucion_id }}} </h2><br>
      <thead>
              <tr>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Cantidad Devuelta</th>
                  <th>Precio</th>
                  <th>Total</th>
              </tr>
          </thead>
          <tbody class="pro-list">
            @foreach ($Dev as $dev)
                <tr>
                    <td>{{{ $dev->VEN_DetalleDevolucion_Producto }}}</td>
                    <td>{{{ DB::table('INV_Producto')->where('INV_Producto_Codigo',$dev->VEN_DetalleDevolucion_Producto)->first()->INV_Producto_Nombre }}}</td>
                    <td>{{{ DB::table('INV_Producto')->where('INV_Producto_Codigo',$dev->VEN_DetalleDevolucion_Producto)->first()->INV_Producto_Descripcion }}}</td>
                    <td>{{{ $dev->VEN_DetalleDevolucion_Cantidad }}}</td>
                    <td>{{{ $dev->VEN_DetalleDevolucion_Precio }}}</td>
                    <td>{{{ $dev->VEN_DetalleDevolucion_Cantidad * $dev->VEN_DetalleDevolucion_Precio }}}</td>
                </tr>
            @endforeach
          </tbody>
    </table>
          <div class="venta-info">
              <div>
                  <span class="bold-span">Total: </span> <span class="ventas-valores">Lps. {{{ $DEV->VEN_Devolucion_Monto }}}</span>
              </div>
              <div>
                  <span class="bold-span">Codigo: </span> <span class="ventas-valores">{{{ $DEV->VEN_Devolucion_Codigo }}}</span>
              </div>
              <div>
                <br><span>{{ link_to_route('Ventas.ListarOne', 'Ver Venta', array($DEV->VEN_Venta_VEN_Venta_id), array('class' => 'btn btn-info btn-block')) }}</span>
              </div>
          </div>
    @endforeach
    </div>
@else
    <div class="alert alert-danger">
      <strong>Oh no!</strong> Aún no hay ninguna venta :(
    </div>

@endif

@stop


