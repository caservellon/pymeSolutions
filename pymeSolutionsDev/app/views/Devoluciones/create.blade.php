@extends('layouts.scaffold')

@section('main')

<h1>Registrar Devolución</h1>

<div class="factura-info">
    <span>Ingrese numero de factura: </span><input type="text" class="no-factura"> <button class="no-fact-accept">Ingresar</button>
</div>

<div class="mensaje"></div>

<table class="table" id="detalle-factura">
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

<button class="crear-devolucion">Procesar Devolución</button>

<div class="modal fade" id="resultadoDevolucion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmación de Devolución</h4>
      </div>
      <div class="modal-body">
        <table class="table" id="detalle-devolucion">
            <thead>
                <tr>
                    <th>Codigo Producto</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@stop


