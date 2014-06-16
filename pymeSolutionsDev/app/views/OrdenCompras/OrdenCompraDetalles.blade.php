@extends('layouts.scaffold')

@section('main')
<div class="row">
    <div class="page-header clearfix">
      <h3 class="pull-left">Autorizar Orden de Compra&gt;sin cotizacion&gt;Detalle<small></small></h3>
      <div class="pull-right">
        <a href="/Compras/OrdenCompra/Autorizacion/ListaOrdenes" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>
</div>
<div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <?php $perfil = DB::table('SEG_Config')->first();?>
            <h2>Orden de Compra</h2>
            <h5>{{$perfil->SEG_Config_NombreEmpresa}}</h5>
            <h5>{{$perfil->SEG_Config_Direccion}}</h5>
            <h5>Honduras C.A.</h5>
    </div>
    <div class="col-md-4 " style="text-align: right">
        <h5 >{{$perfil->SEG_Config_Telefono.' '.$perfil->SEG_Config_Telefono2}}</h5>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <h4>Para:</h4>
        
        <?php $proveedora=  Proveedor::find($proveedor)?>
        <h5>{{$proveedora->INV_Proveedor_Nombre}}</h5>
        <h5>{{$proveedora->INV_Proveedor_Email}}</h5>
        <h5>{{$proveedora->INV_Proveedor_Direccion}}</h5>
        <h5>{{$proveedora->INV_Proveedor_Telefono}}</h5>
    </div>
</div>
<div class="row">
     <div class="table-responsive">
            <table class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Cantidad</th>
      <th>Precio Unitario</th>
      <th>Unidad</th>
                </tr>
              </thead>
                  <tbody >
                      <?php $contador=0;
                        $total=0;
                      ?>
                      @foreach ($detalles as $product)
                      <?php $product1=  invCompras::ProductoCompras($product->COM_Producto_idProducto);//Producto::find($product->COM_Producto_idProducto);
                              ?>
                      <tr>
                        <td>{{ $product1->INV_Producto_Codigo}}</td>
                        <td>{{ $product1->INV_Producto_Nombre}}</td>
                        <td>{{ $product1->INV_Producto_Descripcion}}</td>
                        <td>{{ $product->COM_DetalleOrdenCompra_Cantidad}}</td>
      <td>{{ $product->COM_DetalleOrdenCompra_PrecioUnitario}}</td>
                        <?php $medida=  invCompras::UnidadCompras($product1->INV_UnidadMedida_ID);//UnidadMedida::find($product1->INV_UnidadMedida_ID);?>
      <td>{{$medida->INV_UnidadMedida_Nombre}}</td>
                      </tr> 
                      <?php $contador++; ?>
                      @endforeach
              </tbody>
            </table>
          </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label>Fecha de Emision</label>
        {{$ordenCompra->COM_OrdenCompra_FechaEmision}}
        
        <label>Fecha de Entrega</label>
        {{$ordenCompra->COM_OrdenCompra_FechaEntrega}}
        <br>
        <label>Forma de Pago :</label>
         <?php         
                 $forma=  invCompras::FormaPagoCompras($ordenCompra->COM_OrdenCompra_FormaPago);//FormaPago::find($ordenCompra->COM_OrdenCompra_FormaPago);
                 
         ?>
        <label>{{$forma->INV_FormaPago_Nombre}}</label>
         
         
    </div>
    <div class="col-md-4">
        <label>Direccion de Entrega*:</label>
        <br>
         Colonia America
         
    </div>
    <div class="col-md-4" style="text-align: right">
        <label>Total :</label>
        <label>{{$ordenCompra->COM_OrdenCompra_Total}}</label>
    </div>
</div>
<div class="row" >
    <div class="col-md-6" >{{Form::checkbox('COM_OrdenCompra_Activo','1',true)}}<label>Activo</label></div>
    <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
</div>

<div class="row">
    
    <a href="{{ route('AutorizarOrdCom', array('id'=>$ordenCompra->COM_OrdenCompra_IdOrdenCompra)) }}" class="btn btn-info">Autorizar</a>
    <a href="javascript:window.history.back();" class="btn btn-info">Cancelar</a>
    
</div>

@stop