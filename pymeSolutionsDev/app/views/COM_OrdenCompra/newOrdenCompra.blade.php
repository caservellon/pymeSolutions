@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Campos Locales</h2>
<div class="btn-agregar">
	<a type="button" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Campo Local
	</a>
</div>

<div class="page-header clearfix">
    <h3 class="pull-left">Caja &gt; <small>Nueva Venta</small></h3>
    <div class="pull-right">
        <a href="{{{ URL::to('Ventas/Ventas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
    </div>
</div>

<form class="form-inline busqueda-cliente">
        <span>Cliente: </span><input type="text" placeholder="Cliente Único" class="cliente"><button class="btn btn-info">Buscar</button>
</form>

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
        <h4>Opciones de Caja</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarProducto">Agregar Producto</button>
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
@stop


