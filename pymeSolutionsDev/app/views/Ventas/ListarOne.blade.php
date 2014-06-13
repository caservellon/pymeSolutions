@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Venta &gt; <small>Detalle de Venta</small></h3>
      <div class="pull-right">
        <a href="/Ventas/Listar" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($Venta)
    <div class="table-responsive">
      <table class="table selectable table-striped" id="pro-list-table" data-editable="true">
      @foreach ( DB::table('VEN_Venta')->where('VEN_Venta_id', array_values($Venta)[0]->VEN_Venta_VEN_Venta_id)->distinct()->get() as $ven )
          <h2>Factura Número: {{{ $ven->VEN_Venta_id }}} </h2><br>
          @if ($ven->CRM_Empresas_CRM_Empresas_ID)
            <h4><b>Empresa:</b> {{{ DB::table('CRM_Empresas')->where('CRM_Empresas_ID',$ven->CRM_Empresas_CRM_Empresas_ID)->first()->CRM_Empresas_Nombre }}}</h4>
            <h4><b>Cliente:</b> {{{ DB::table('CRM_Personas')->where('CRM_Personas_ID',DB::table('CRM_Empresas')->where('CRM_Empresas_ID',$ven->CRM_Empresas_CRM_Empresas_ID)->first()->CRM_Personas_CRM_Personas_ID)->first()->CRM_Personas_Nombres.' '.DB::table('CRM_Personas')->where('CRM_Personas_ID',DB::table('CRM_Empresas')->where('CRM_Empresas_ID',$ven->CRM_Empresas_CRM_Empresas_ID)->first()->CRM_Personas_CRM_Personas_ID)->first()->CRM_Personas_Apellidos }}}</h4><br>
          @elseif ($ven->CRM_Personas_CRM_Personas_ID)
            <h4><b>Cliente:</b> {{{ DB::table('CRM_Personas')->where('CRM_Personas_ID',$ven->CRM_Personas_CRM_Personas_ID)->first()->CRM_Personas_Nombres.' '.DB::table('CRM_Personas')->where('CRM_Personas_ID',$ven->CRM_Personas_CRM_Personas_ID)->first()->CRM_Personas_Apellidos }}}</h4><br>
          @endif
          <thead>
              <tr>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Precio Unitario</th>
                  <th>Cantidad</th>
                  <th>Total</th>
              </tr>
          </thead>
          <tbody class="pro-list">
            @foreach ($Venta as $venta)
                <tr>
                    <td>{{{ $venta->VEN_DetalleDeVenta_Codigo }}}</td>
                    <td>{{{ DB::table('INV_Producto')->where('INV_Producto_Codigo',$venta->VEN_DetalleDeVenta_Codigo)->first()->INV_Producto_Nombre }}}</td>
                    <td>{{{ $venta->VEN_DetalleDeVenta_PrecioVenta }}}</td>
                    <td>{{{ $venta->VEN_DetalleDeVenta_CantidadVendida }}}</td>
                    <td>{{{ $venta->VEN_DetalleDeVenta_PrecioVenta*$venta->VEN_DetalleDeVenta_CantidadVendida }}}</td>
                </tr>
            @endforeach
          </tbody>
      </table>
      
        <div class="venta-info">
            <div>
                <span class="bold-span">Sub Total: </span> <span class="sub-total ventas-valores">Lps. {{{ $ven->VEN_Venta_Subtotal }}}</span>
            </div>
            <div>
                <span class="bold-span">Descuento: </span> <span class="descuento ventas-valores">Lps. {{{ $ven->VEN_Venta_TotalDescuentoProductos }}}</span>
            </div>
            <div>
                <span class="bold-span">ISV: </span> <span class="isv ventas-valores">Lps. {{{ $ven->VEN_Venta_ISV }}}</span>
            </div>
            <hr>
            <div>
                <span class="bold-span">Total: </span> <span class="grand-total ventas-valores">Lps. {{{ $ven->VEN_Venta_Total }}}</span>
            </div>
            <hr>
            <div>
                <span class="bold-span">Saldo: </span> <span class="saldo-info ventas-valores">Lps. {{{ $ven->VEN_Venta_TotalCambio}}}</span>
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


