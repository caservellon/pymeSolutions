@extends('layouts.scaffold')

@section('main')
<div class="row">
    <div class="page-header clearfix">
      <h3 class="pull-left">Autorizar Orden de Compra&gt;sin cotizacion&gt;Detalle<small></small></h3>
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
                      <?php $product1=  Producto::find($product->COM_Producto_idProducto);
                              ?>
                      <tr>
                        <td>{{ $product1->INV_Producto_Codigo}}</td>
                        <td>{{ $product1->INV_Producto_Nombre}}</td>
                        <td>{{ $product1->INV_Producto_Descripcion}}</td>
                        <td>{{ $product->COM_DetalleOrdenCompra_Cantidad}}</td>
			<td>{{ $product->COM_DetalleOrdenCompra_PrecioUnitario}}</td>
                        <?php $medida=  UnidadMedida::find($product1->INV_UnidadMedida_ID);?>
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
        <label>Total:  23432.45</label>
    </div>
</div>
<div class="row" >
    <div class="col-md-6" >{{Form::checkbox('COM_OrdenCompra_Activo','1',true)}}<label>Activo</label></div>
    <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
</div>
<hr>
<div class="row">
    
    <h3>Historial de la Orden de Compra</h3>
      <div class="table-responsive">
     <table class="table table-striped table-bordered" >
       
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Activo</th>
                  <th>Transiciones</th>
                  <th>Observaciones</th>
                  <th>Fecha de Transicion</th>
		  <th>Usuario</th>
		  
                </tr>
              </thead>
              <tbody >
     @foreach ($historial as $product)
                      
           
                  
                      
                      <tr>
                        <td>{{ $product->COM_TransicionEstado_Codigo}}</td>
                        @if($product->COM_TransicionEstado_Activo)
                        <td>Actual</td>
                        @else
                        <td>Pasada</td>
                        @endif
                        <?php $estado= COM_EstadoOrdenCompra::find($product->COM_OrdenCompra_TransicionEstado_Id);
                        ?>
                        <td>{{ $estado->COM_EstadoOrdenCompra_Nombre}}</td>
                        <td>{{ $product->COM_TransicionEstado_Observacion}}</td>
                        <td>{{ $product->COM_TransicionEstado_FechaCreo}}</td>
                        <?php $id_t= $product->COM_TransicionEstado_Id ; ?>
			<td>{{ $product->COM_Usuario_idUsuarioCreo}}</td>
                        
                      </tr> 
                        @endforeach
                  </tbody>
            </table>
                      </div>
    <?php       $ante=array();
                $sig=array();
                
               foreach ($transiciones as $transicion){
                  $ante[]=$transicion->COM_OrdenCompra_TransicionEstado_EstadoPrevio;
                  $sig[]=$transicion->COM_OrdenCompra_TransicionEstado_EstadoPosterior;
               }
               
               $anterior=  COM_EstadoOrdenCompra::find($ante)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
               $siguiente= COM_EstadoOrdenCompra::find($sig)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
               $actual1= COM_EstadoOrdenCompra::find($actual);
               
               
    ?>
    <br>
    <br>
    <hr>
    <h3>Cambiar Estado de La orden de Compra</h3>
    
                 {{Form::open(array('route'=>'cambioAdministracio'))}}
                 <h4>Accion a Realizar</h4>
                 <div class="form-group" >
                     {{Form::radio('queHacer','TransitarAntes',true)}}<span>Regresar Transision Anterior  </span>
                     
                 </div>
                 <div class="form-group">
                        {{Form::radio('queHacer','TransitarDespues',true)}}<span>Avanzar Transision Siguiente  </span>
                 </div>
                  <div class="form-group">
                 <label>Estado Anterior :</label>
                        {{ Form::select('COM_TransicionEstado_EstadoPrevio' ,$anterior,array('class'=>'form-control')) }}
                  </div>
                  <div class="form-group">
                        
                        <label>Estado Actual :</label>
                        <span> {{$actual1->COM_EstadoOrdenCompra_Nombre}}</span>
                        {{Form::text('id_oc',$ordenCompra->COM_OrdenCompra_IdOrdenCompra,array('style'=>'display:none'))}}
                        {{Form::text('id_actual',$actual,array('style'=>'display:none'))}}
                        {{Form::text('id_historial',$id_t,array('style'=>'display:none'))}}
                  </div>
                         <div class="form-group">
                        <label>Estado Siguiente : </label>
                        {{ Form::select('COM_TransicionEstado_EstadoPosterior' ,$siguiente) }}
                         </div>
                         <div class="form-group">
                        <label>Observacion : </label>
                        {{Form::textarea('COM_TransicionEstado_Observacion')}}
                         </div>
                        <br>
                        <br>
                        {{Form::submit('Transitar',array('class'=>'btn btn-sm btn-primary'))}}
                 {{Form::close()}}
    
    <br>
    <br>
    <br>
    
   
</div>


@stop