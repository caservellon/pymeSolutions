@extends('layouts.scaffold')

@section('main')
<? 
  $subTotal=0;
  $totalGeneral=0;
  $contadorDetalle=1;
?>
<form action="{{ route('GuardaOCsnCot') }}" method="post" name="fomu">
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
                  
                    <tr id="{{$contadorDetalle}}" style='cursor: pointer' onclick='muestra(this.id)'>
                        <td>{{{ $contadorDetalle }}}</td>
                        <td>{{{ $Producto->INV_Producto_Codigo }}}</td>
                        <td>{{{ $Producto->INV_Producto_Nombre }}}</td>
                        <td class='precio'><input type="text" id="{{'precio'.$contadorDetalle}}" value="{{ $Producto->INV_Producto_PrecioCosto }}" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); margin-left:80px; max-width:90px;"/></td>
                        <td><input type="text" id="{{'cantidad'.$contadorDetalle}}" value="{{$Producto->INV_Producto_NivelReposicion}}" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); margin-left:80px; max-width:90px;"/></td>
                        <td>{{Form::text('tot'.$contadorDetalle,$proveedor, array('style' => 'display:none'))}}
                        <input type="text"  id="{{'total'.$contadorDetalle}}" value="{{$Producto->INV_Producto_NivelReposicion*$Producto->INV_Producto_PrecioCosto}}" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); max-width:90px;"></td>
                    </tr>
                    <? 
                      $contadorDetalle++; 
                      $subTotal += $Producto->INV_Producto_NivelReposicion*$Producto->INV_Producto_PrecioCosto;
                      ?>
                    @endforeach
        </tbody>
    </table>
    
    
    
    <div class="venta-info" style="text-align:right;" >
        <hr>
        <div>
            <span class="bold-span">Sub Total: </span> <span class="bold-span"><label style="margin-left:25px; text-align:right;">Lps.</label> <input type="text"  id="subtotal" value="{{$subTotal}}" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); max-width:90px; text-align:right;"/></span>
        </div>
        <div>
            <span class="bold-span">Descuento: </span> <span class="bold-span"><label style="margin-left:14px; text-align:right;">Lps.</label> <input type="text"  id="descuento" value="0.00" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); max-width:90px; text-align:right;"/></span>
        </div>
        <div>
            <span class="bold-span">ISV: </span> <span class="bold-span"><label style="margin-left:68px; text-align:right;">Lps.</label> <input type="text"  id="isv" value="{{$subTotal*0.15}}" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); max-width:90px; text-align:right;"/></span>
        </div>
        <hr>
        <div>
            <span class="bold-span">Total: </span> <span class="bold-span"><label style="margin-left:56px; text-align:right; ">Lps.</label> <input type="text"  id="total" value="{{$totalGeneral=$subTotal+($subTotal*0.15)}}" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); max-width:90px; text-align:right;"/></span>
        </div>
        </div>
        <hr>
        
		</div>

			<div class="col-md-4">
				<div class="opciones-cajas">
        
					<a href="{{ route('DetallePago') }}" ><button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar-Producto" onClick="alerta()">Agregar Producto</button></a>
					<button type="button" class="btn btn-info editar-prod" onClick="mostrarVentana()" >Editar Cantidad</button>
					<button type="button" class="btn btn-warning eliminar-prod" onClick="subTotal(5)" >Eliminar Producto</button>
					<button type="button" class="btn btn-danger cancel-venta" onClick="ocultarVentana()" >Cancelar Ventas</button>
       
				</div>
			</div>
		</div>
	</div>

      
  <div class="row">
		<div class="col-md-4">
          <label>Fecha Emision</label>
          {{date('Y/m/d H:i:s')}}
          <label>Fecha Entrega</label>
		  <input type="text" id="COM_OrdenCompra_FechaEntrega">
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
  </div>
  <div class="row" >
      <div class="col-md-6" >
	  {{Form::checkbox('COM_OrdenCompra_Activo','1',true)}}
      <input  id="COM_OrdenCompra_Activo" type="checkbox" checked="checked">
      <label>Activo</label>
      </div>
      <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
  </div>

	<div class="row">  
      <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
    </div>

</form>
<div id="miVentana" style="position: fixed; width: 350px; height: 190px; top: 0; left: 0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; border: #333333 3px solid; background-color: #FAFAFA; color: #000000; display:none;">
<br>
<br>
<label>Introduzca la nueva Cantidad</label>
<br>
<input id="Ccantidad" type="text" value="1" />
<button type="button" class="btn btn-info cancel-venta" onClick="ocultarVentana({{$contadorDetalle}})" >Cambiar</button>
</div>
  @stop