@extends('layouts.scaffold')

@section('main')
<div class="row">
  <div class="row">
      <div class="page-header clearfix">
        <h3 class="pull-left">Crear Orden de Compra&gt;sin cotizacion&gt;Detalle<small></small></h3>
        <div class="pull-right">
          <a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
        </div>
  </div>
  </div>
  <div class="row">
      <div class="col-md-4 " ></div>
      <div class="col-md-4 " style="text-align: center">
          <h2>Orden de Compra</h2>
          <h5>Empresa X S.A.</h5>
          <h5>Colonia la America, Tegucigalpa,Francisco Morazán</h5>
          <h5>Honduras C.A.</h5>
      </div>
      <div class="col-md-4 " style="text-align: right">
          <h5 >Tel.2234-9000 Fax.2234-9000</h5>
      </div>
  </div>
  {{Form::open(array('route'=>'GuardaOCsnCot'))}}
  <div class="row">
      <div class="col-md-4">
          <h4>Para:</h4>
          {{Form::text('COM_Proveedor_IdProveedor',$proveedor, array('style' => 'display:none'))}}
          <?php $proveedora=  Proveedor::find($proveedor)?>
          <h5>{{$proveedora->INV_Proveedor_Nombre}}</h5>
          <h5>{{$proveedora->INV_Proveedor_Email}}</h5>
          <h5>{{$proveedora->INV_Proveedor_Direccion}}</h5>
          <h5>{{$proveedora->INV_Proveedor_Telefono}}</h5>
      </div>
  </div>

<div class="row">  

<div class="col-md-8">
    
    <table class="table selectable" id="pro-list-table" data-editable="true">
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody class="pro-list">
           @foreach ($productos as $Producto)
                    <tr>
                        <td>{{{ $Producto->INV_Producto_ID }}}</td>
                        <td>{{{ $Producto->INV_Producto_Codigo }}}</td>
                        <td>{{{ $Producto->INV_Producto_Nombre }}}</td>
                        <td class='precio'>{{{ $Producto->INV_Producto_PrecioVenta }}}</td>
                        <td><input type="text"></td>
                        <td><input type="test"></td>
                    </tr>
                    @endforeach
    </table>
    <hr>
    <div class="venta-info">
        <div>
            <span class="bold-span">Sub Total: </span> <span class="sub-total ventas-valores">Lps. 0.00</span>
        </div>
        <div>
            <span class="bold-span">Descuento: </span> <span class="descuento ventas-valores">Lps. 0.00</span>
        </div>
        <div>
            <span class="bold-span">ISV: </span> <span class="isv ventas-valores">Lps. 0.00</span>
        </div>
        <hr>
        <div>
            <span class="bold-span">Total: </span> <span class="grand-total ventas-valores">Lps. 0.00</span>
        </div>
        <hr>
        <div>
            <span class="bold-span">Abonado: </span> <span class="abonado-info ventas-valores">Lps. 0.00</span>
        </div>
        <div>
            <span class="bold-span">Saldo: </span> <span class="saldo-info ventas-valores">Lps. 0.00</span>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="opciones-cajas">
        <h4>Opciones de Caja</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar-Producto">Agregar Producto</button>
        <button type="button" class="btn btn-info editar-prod">Editar Cantidad</button>
        <button type="button" class="btn btn-warning eliminar-prod">Eliminar Producto</button>
        <button type="button" class="btn btn-danger cancel-venta">Cancelar Ventas</button>
        <br>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#agregarPago">Agregar Pago</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#agregarDescuento">Agregar Descuento</button>
        <button type="button" class="btn btn-default guardar-compra">Finalizar Compra</button>
    </div>
</div>
</div>

<!-- Modal de Agregar Producto -->
<div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Buscar Producto</h4>
      </div>
      <div class="modal-body">
        <form class="busqueda-producto form-inline">
            <span>Producto: </span><input type="text" class="form-control"> <button type="button" class="btn btn-default">Buscar</button>
            <table class="table selectable" id="productos-venta">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody class="pro-search">
                    @foreach ($productos as $Producto)
                    <tr>
                        <td>{{{ $Producto->INV_Producto_ID }}}</td>
                        <td>{{{ $Producto->INV_Producto_Codigo }}}</td>
                        <td>{{{ $Producto->INV_Producto_Nombre }}}</td>
                        <td class='precio'>{{{ $Producto->INV_Producto_PrecioVenta }}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary agregar-producto">Agregar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Agregar Descuento -->
<div class="modal fade" id="agregarDescuento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Descuento</h4>
      </div>
      <div class="modal-body">
        <form class="busqueda-descuento form-inline">
            <table class="table" id="descuento-venta">
                <thead>
                    <tr>
                        <th>Selección</th>
                        <th>#</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody class="descuento-add">
                   <?/* @foreach ($Descuentos as $Descuento)
                    <tr>
                        <td><input type="checkbox" class="descuento_{{$Descuento->VEN_DescuentoEspecial_id}}"></td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_id }}}</td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_Codigo }}}</td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_Nombre }}}</td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_Valor }}}</td>
                    </tr>
                    @endforeach */?>
                </tbody>
            </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary agregar-descuento">Agregar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Agregar Pago -->
<div class="modal fade" id="agregarPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Pago</h4>
      </div>
      <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <table class="table pagos-tabla" id="pagos-tabla">
                    <thead>
                        <tr>
                            <th>Metodo Pago</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody class="pagos-list">
                        
                    </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <span>Cantidad: </span><input type="text" class="ammount-pago">
                <br>
                <span>Metodo de Pago: Efectivo</span>
                <br>
                <button class="btn btn-success add-pago-modal-bt">Agregar</button>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal de Agregar Pago -->
<?/*<div class="modal fade" id="agregarPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Pago</h4>
      </div>
      <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <table class="table pagos-tabla" id="pagos-tabla">
                    <thead>
                        <tr>
                            <th>Metodo Pago</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody class="pagos-list">
                        
                    </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <span>Cantidad: </span><input type="text" class="ammount-pago">
                <br>
                <span>Metodo de Pago: Efectivo</span>
                <br>
                <button class="btn btn-success add-pago-modal-bt">Agregar</button>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
  <!--este es el lucasfilm del diseño-->
       <div class="table-responsive">
         
              <table class="table table-striped table-bordered" >
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
        <th>Precio Unitario</th>
                    <th>Total</th>
        <th>Unidad</th>
                  </tr>
                </thead>
                    <tbody >
                        <?php $contador=0;
                          $total=0;
                          $elemento=2;
                          $cantidad=1;
                          $totalGeneral=0;
                        ?>
                        @foreach ($productos as $product)
                        <?php $product1=  Producto::find($productos[$contador])?>
                        <tr>
                            {{Form::text('COM_Producto_idProducto'.$contador,$productos[$contador], array('style' => 'display:none'))}}
                          <td>{{ $product1->INV_Producto_Codigo}}</td>
                          <td>{{ $product1->INV_Producto_Nombre}}</td>
                          <td>{{ $product1->INV_Producto_Descripcion}}</td>
                          <td><?$elemento++;?>{{Form::custom('number','COM_DetalleOrdenCompra_Cantidad'.$contador,$cantidad,array('min'=>'1','required '=>'required ','onChange'=>'setearTotalcc(this.form,'.$elemento.')'))}}</td>
                          <td><?$elemento++;?>{{Form::custom('number','COM_DetalleOrdenCompra_PrecioUnitario'.$contador,$product1->INV_Producto_PrecioCosto,array('min'=>'1','step'=>'0.01','required '=>'required ','onChange'=>'setearTotalcp(this.form,'.$elemento.')'))}}</td>
                          <td><?$elemento+=2;?><input type="number" id="totalproducto<?php echo $contador;?>" value="<?echo $cantidad*$product1->INV_Producto_PrecioCosto;?>" readonly="readonly" style=" border-style: none; background-color: transparent;" ></td>
                          <?php $medida=  UnidadMedida::find($product1->INV_UnidadMedida_ID);
                                  $totalGeneral+=$cantidad*$product1->INV_Producto_PrecioCosto?>
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
          <label>Fecha Emision</label>
          {{date('Y/m/d H:i:s')}}
        
          <label>Fecha Entrega</label>
          {{Form::custom('date','COM_OrdenCompra_FechaEntrega','2014/03/17',array('format'=>'AAAA/MM/DD','required '=>'required '))}}
        
          <br>
          <label>Forma de Pago</label>
           <?php $formapago=DB::table('INV_Proveedor_FormaPago')->where('INV_Proveedor_ID', '=',$proveedor)->get();
                  $form=array();
                  $id=array();
                  foreach ($formapago as $forma){
                         $id[]=$forma->INV_FormaPago_ID;
                   }
                   $m=  FormaPago::find($id)->Lists('INV_FormaPago_Nombre','INV_FormaPago_ID');
                  
                 
           ?>
           {{ Form::select('formapago',$m) }}
           
     </div>
      <div class="col-md-4">
        <label>Direccion de Entrega*:</label>
          <br>
           {{Form::radio('COM_OrdenCompra_Direccion','uno',true)}}Colonia America
           <br>
           {{Form::radio('COM_OrdenCompra_Direccion','uno',false)}}Colonia Carrizal
      </div>
      <div class="col-md-4" style="text-align: right">
          <label>Total:</label>
          <input type="text" id="total" value="<?echo $totalGeneral;?>">
          {{Form::text('totalG',$totalGeneral, array('style' => 'display:none'))}}
      </div>
  </div>
  <div class="row" >
      <div class="col-md-6" >{{Form::checkbox('COM_OrdenCompra_Activo','1',true)}}<label>Activo</label></div>
      <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
  </div>
*/?>
  <div class="row">
      {{Form::submit('Guargar', array('class' => 'btn btn-sm btn-primary'))}}
    
    </div>
    {{Form::close()}}
    
</div>
  @stop