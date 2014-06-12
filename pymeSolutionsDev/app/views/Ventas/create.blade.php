@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix no-print">
    <h3 class="pull-left">Caja &gt; <small>Nueva Venta</small></h3>
</div>

<div class="form-inline busqueda-cliente">
        <center><h3>No. Factura: <span class="num-factura">Compra no Finalizada</span></h3></center>
        <hr>
        <center><label class="control-label">Cliente: </label><input type="text" placeholder="Cliente Único" class="cliente form-control">
        {{ Form::select('Tipo_de_Cliente', array('0' => 'Persona', '1' => 'Empresa'),'0',array('class' => 'Tipo_de_Cliente form-control')) }}
        <button class="btn btn-info no-print search-cliente">Buscar</button></center>
        {{ Form::hidden('id-cliente-buscado', null, array('class' => 'id-cliente-buscado'))}}
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
            
        </tbody>
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
        <h4 class="no-print">Opciones de Caja</h4>
        <button type="button" class="btn btn-success no-print" data-toggle="modal" data-target="#agregarProducto">Agregar Producto</button>
        <button type="button" class="btn btn-info editar-prod no-print">Editar Cantidad</button>
        <button type="button" class="btn btn-warning eliminar-prod no-print">Eliminar Producto</button>
        <button type="button" class="btn btn-danger cancel-venta no-print">Cancelar Ventas</button>
        <br>
        <button type="button" class="btn btn-default no-print" data-toggle="modal" data-target="#agregarPago">Agregar Pago</button>
        <button type="button" class="btn btn-default no-print" data-toggle="modal" data-target="#agregarDescuento">Agregar Descuento</button>
        <button type="button" class="btn btn-default guardar-compra no-print">Finalizar Compra</button>
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
                    @foreach ($Productos as $Producto)
                    <tr>
                        <td>{{{ $Producto->INV_Producto_ID }}}</td>
                        <td class='cod'>{{{ $Producto->INV_Producto_Codigo }}}</td>
                        <td class='nombre'>{{{ $Producto->INV_Producto_Nombre }}}</td>
                        <td class='precio'>{{{ number_format((float)$Producto->INV_Producto_PrecioVenta, 2, '.', '') }}}</td>
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
                    @foreach ($Descuentos as $Descuento)
                    <tr>
                        <td><input type="checkbox" class="descuento_{{$Descuento->VEN_DescuentoEspecial_id}}"></td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_id }}}</td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_Codigo }}}</td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_Nombre }}}</td>
                        <td>{{{ $Descuento->VEN_DescuentoEspecial_Valor }}}</td>
                    </tr>
                    @endforeach
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
                <span>Cantidad Efectivo: </span><input type="text" class="ammount-pago">
                <br>
                <br>
                <button class="btn btn-success add-pago-modal-bt">Agregar</button>
                <hr>
                <button class="btn btn-success add-bono-modal-bt">Bono de Compra</button>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Agregar Bono de Compra -->
<div class="modal fade" id="agregarBono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Bono de Compra</h4>
      </div>
      <div class="modal-body">
        <center>
            <input type="text" class="bono-compra-tb"> <button class="btn btn-default veri-bono">Verificar</button>
            <br>
            <div class="alert alert-warning" id="no-valido">
              <span>
                <p>Su bono no es valido o esta vencido</p>
              </span>
            </div>
            <div class="alert alert-success" id="valido">
              <span>
                <p>Su bono es valido</p>
              </span>
            </div>
            <div class="alert alert-danger" id="no-existe">
              <span>
                <p>El bono ingresado no existe</p>
              </span>
            </div>

         </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cerrar-bono-modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Busqueda CRM -->
<div class="modal fade" id="buscarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Busqueda de Cliente</h4>
      </div>
      <div class="modal-body">

            <table class="table busqueda-cliente-table selectable" id="busqueda-cliente-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>
                    <tbody class="clientes-buscados-list">
                        
                    </tbody>
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default agregar-cliente-sel">Aceptar</button>
      </div>
    </div>
  </div>
</div>
@stop
