@extends('layouts.scaffold')

@section('main')

<h1>Registrar Devolución</h1>

<div style="display:none;" class="alert alert-danger fade in">

</div>

<div class="factura-info">
    <label>Ingrese numero de factura: </label><input type="text" class="no-factura"> <button class="no-fact-accept btn btn-success">Ingresar</button>
</div>

<div class="mensaje"></div>

<table class="table table-striped" id="detalle-factura">
    <thead>
        <tr>
            <th>Devolver</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody class="productos-dev">
        
    </tbody>
</table>

<button class="btn btn-success crear-devolucion">Procesar Devolución</button>

<div class="modal fade" id="resultadoDevolucion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmación de Devolución</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped" id="detalle-devolucion">
            <thead>
                <tr>
                    <th>Codigo Producto</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <div class="bono-compra">
            <h4>Bono de Compra Generado</h4>
            <div>
                <label>Codigo: </label><span class="codigo-bc"></span>
            </div>
            <div>
                <label>Cantidad: </label><span class="cantidad-bc"></span>    
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@stop


