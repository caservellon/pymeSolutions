@extends('layouts.scaffold')

@section('main')
    <script type="text/javascript" src="/assets/javascript/jquery.simple-dtpicker.js"></script>
    <link type="text/css" href="/assets/javascript/jquery.simple-dtpicker.css" rel="stylesheet" />
    <script type="text/javascript" src="/assets/javascript/datetimepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.simple-dtpicker.css">
    
<div class="row">
    <div class="page-header clearfix">
      <h3 class="pull-left">Devolucion de Compra&gt;Detalle<small></small></h3>
      <div class="pull-right">
        <a href="javascript:window.history.back();" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
</div>
<div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2>Devolucion sobre Compra</h2>
        <h5>Empresa X S.A.</h5>
        <h5>Colonia la America, Tegucigalpa,Francisco Morazán</h5>
        <h5>Honduras C.A.</h5>
    </div>
    <div class="col-md-4 " style="text-align: right">
        <h5 >Tel.2234-9000 Fax.2234-9000</h5>
    </div>
</div>
<? 
      //$Orden=OrdenCompra::find();
    
    
?>
{{Form::open(array('route'=>'guardaDevolucion'),array('id'=>'formu'))}}
<div class="row">
    <div class="col-md-4">
        <h4>Para:</h4>
        {{Form::text('COM_Proveedor_IdProveedor',$proveedor, array('style' => 'display:none'))}}
        {{Form::text('Id_Orden',$id_cot, array('style' => 'display:none'))}}
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
                  
                  <th>Cantidad</th>
		  <th>Precio Unitario</th>
                  <th>Total</th>
		  <th>Unidad</th>
                </tr>
              </thead>
                  <tbody >
                      <?php $contador=0;
                        $total=0;
                        $elemento=3;
                        $totalGeneral=0;
                        $contados=1;
                      ?>
                      @foreach ($detalle as $Elemento)
                      <?php $product1=  Producto::find($Elemento->COM_Producto_idProducto);
                            
                            
                            ?>
                            
                      <tr>
                          {{Form::text('COM_Producto_idProducto'.$contador,$Elemento->COM_Producto_idProducto, array('style' => 'display:none'))}}
                          <td>{{ $product1->INV_Producto_Codigo}}<script></script></td>
                        <td>{{ $product1->INV_Producto_Nombre}}</td>
                        
                        <?//esta es la forma para llamar a java script desde laravel?>
                        {{Form::text('COM_DetalleOrdenCompra_Cantidad'.$contador,$cantidades[0], array('style' => 'display:none'))}}
                        <td>{{$cantidades[0]}}</td>
                        {{Form::text('COM_DetalleOrdenCompra_PrecioUnitario'.$contador,$Elemento->COM_DetalleOrdenCompra_PrecioUnitario, array('style' => 'display:none'))}}
                        <td>{{$Elemento->COM_DetalleOrdenCompra_PrecioUnitario}}</td>
                        <td>{{$cantidades[0]*$Elemento->COM_DetalleOrdenCompra_PrecioUnitario}}</td>
                        <?php $medida=  UnidadMedida::find($product1->INV_UnidadMedida_ID);
                            $totalGeneral+=$cantidades[0]*$Elemento->COM_DetalleOrdenCompra_PrecioUnitario;
                        ?>
			                 <td></td>
                  
                      </tr> 
                      <?php $contador++;
                            $contados++; ?>
                      @endforeach
              </tbody>
            </table>
          </div>
</div>
<div class="row">
    <div class="col-md-4">
        
       
        
             
       
    </div>
    <div class="col-md-4">
      
    </div>
    <div class="col-md-4" style="text-align: right">
        
        <?php
          $isv1=$totalGeneral*($isv/100);
          ?>
        <label>Subtotal: Lps. {{$totalGeneral}}</label>
        <br>
        <label>I.S.V.: Lps. {{$isv1}}</label>
        <br>
        <?php $totalGeneral=$totalGeneral+$isv1?>
        <label>Total Devolucion: Lps. {{$totalGeneral}}</label>
        <br>
        <label>Saldo Anterior: Lps.{{$saldo}}</label>
        <br>
        <label>Total: Lps. {{$saldo-$totalGeneral}}</label>
        
        
        {{Form::text('totalG',$totalGeneral, array('style' => 'display:none'))}}
        {{Form::text('isv',$isv, array('style' => 'display:none'))}}
        {{Form::text('saldo',$saldo, array('style' => 'display:none'))}}
        
    </div>
</div>
<div class="row" >
    <div class="col-md-6" >
       
          <div class="form-group" id="campos Locales otros"> 
     
   
        <h5>Nombre del Oficial de Compras</h5>
    </div>
</div>

<div class="row">
    {{Form::submit('Guargar', array('class' => 'btn btn-sm btn-primary'))}}
    
</div>
{{Form::close()}}
@stop