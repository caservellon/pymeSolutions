@extends('layouts.scaffold')

@section('main')
<div class="row">
    <div class="page-header clearfix">
      <h3 class="pull-left">Crear Orden de Compra&gt;sin cotizacion&gt;Detalle<small></small></h3>
      <div class="pull-right">
        <a href="/Compras/OrdenCompra/Autorizacion/ListaOrdenes" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
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
<div class="row">
    <div class="col-md-4">
        <h4>Para:</h4>
        <h5>nombre del Proveedor</h5>
        <h5>Direccion@electronica.proveedor</h5>
        <h5>Direccion fisica del proveedor</h5>
        <h5>telefonos y fax del proveedor</h5>
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
                      <tr>
                        <td>01-002-lm</td>
                        <td>papel scott</td>
                        <td>tempor et</td>
                        <td>14</td>
			<td>6.35</td>
			<td>latas</td>
                      </tr> 
                       <tr>
                        <td>01-002-lm</td>
                        <td>papel scott</td>
                        <td>tempor et</td>
                        <td>14</td>
			<td>6.35</td>
			<td>latas</td>
                      </tr> 
                       <tr>
                        <td>01-002-lm</td>
                        <td>papel scott</td>
                        <td>tempor et</td>
                        <td>14</td>
			<td>6.35</td>
			<td>latas</td>
                      </tr> 
                       <tr>
                        <td>01-002-lm</td>
                        <td>papel scott</td>
                        <td>tempor et</td>
                        <td>14</td>
			<td>6.35</td>
			<td>latas</td>
                      </tr> 
                       <tr>
                        <td>01-002-lm</td>
                        <td>papel scott</td>
                        <td>tempor et</td>
                        <td>14</td>
			<td>6.35</td>
			<td>latas</td>
                      </tr> 
      
              
              </tbody>
            </table>
          </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label>Fecha de Emision</label>
        <label>23/03/2014</label>
        <label>Fecha de Entrega</label>
        <label>23/03/2014</label>
        <br>
        <label>Forma de Pago</label>
        <label>Efectivo</label>
    </div>
    <div class="col-md-4">
        <label>Direccion de Entrega*:</label>
        <label>Direccion del lugar de entrega</label>
    </div>
    <div class="col-md-4" style="text-align: right">
        <label>Total:  23432.45</label>
    </div>
</div>
<div class="row" >
    <div class="col-md-6" ><label>Activo</label></div>
    <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
</div>
<div class="row">
    
    <input type="submit" value="Autorizar" class="btn btn-sm btn-primary">
    <input type="submit" value="Rechazar" class="btn btn-sm btn-primary">
</div>
@stop