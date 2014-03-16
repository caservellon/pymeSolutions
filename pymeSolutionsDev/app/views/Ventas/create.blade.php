@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
    <h3 class="pull-left">Caja &gt; <small>Nueva Venta</small></h3>
    <div class="pull-right">
        <a href="{{{ URL::to('Ventas/Ventas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
    </div>
</div>

<div class="row">    
<div class="col-md-8">
    <table class="table" id="pro-list-table" data-editable="true">
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
            <tr>
                <td>1</td>
                <td>FAS-02</td>
                <td>Libra de Limones</td>
                <td class="precio">Lps. 4.50</td>
                <td class="cantidad">12.5</td>
                <td class="total-art">Lps. 56.25</td>
            </tr>
            <tr>
                <td>2</td>
                <td>FAS-33</td>
                <td>Libra de Tomate</td>
                <td class="precio">Lps. 4.50</td>
                <td class="cantidad">12.5</td>
                <td class="total-art">Lps. 56.25</td>
            </tr>
            <tr>
                <td>3</td>
                <td>FAS-43</td>
                <td>Libra de Cebolla</td>
                <td class="precio">Lps. 4.50</td>
                <td class="cantidad">12.5</td>
                <td class="total-art">Lps. 56.25</td>
            </tr>
        </tbody>
    </table>
    
    <div class="venta-info">
        <div>
            <span class="bold-span">Sub Total: </span> <span class="sub-total ventas-valores">Lps. 0.00</span>
        </div>
        <div>
            <span class="bold-span">ISV: </span> <span class="isv ventas-valores">Lps. 0.00</span>
        </div>
        <div>
            <span class="bold-span">Total: </span> <span class="grand-total ventas-valores">Lps. 0.00</span>
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
        <button type="button" class="btn btn-primary fin-compra">Finalizar Compra</button>
        <button type="button" class="btn btn-primary add-descuento">Agregar Descuento</button>
        <button type="button" class="btn btn-default guardar-compra">Guardar Compra</button>
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
            <table class="table" id="productos-venta">
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
@stop


