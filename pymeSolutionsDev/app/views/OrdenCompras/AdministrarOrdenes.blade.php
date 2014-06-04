@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Administrar Ordenes de Compra por Cotizacion<small></small></h3>
      <div class="pull-right">
        <a href="/Compras/OrdenCompra" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
<div class="row">
   
    <div class=" col-lg-12">
			
    </div>
    
	<div class="col-md-9" >
            <form action="" method=GET>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Proveedor</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
                  <tbody >
                      
                      <?php $ordenes= OrdenCompra::where('COM_OrdenCompra_Activo','=',1)->paginate();
                            
                      ?>
                      @foreach($ordenes as $orden)
                      <?php $or=  OrdenCompra::find($orden->COM_OrdenCompra_IdOrdenCompra);
                            $proveedor= invCompras::ProveedorCompras($or->COM_Proveedor_IdProveedor);//Proveedor::find($or->COM_Proveedor_IdProveedor);
                            $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
                                
                      ?>
                        <tr>
                            
                            <td>{{$or->COM_OrdenCompra_Codigo}}</td>
                            <td>{{$proveedor->INV_Proveedor_Nombre}}</td>
                            <td>{{$or->COM_OrdenCompra_FechaEmision}}</td>
                            @foreach($trans as $tran)
                            
                            <?php 
                            //echo var_dump($tran);
                            
                            if($tran->COM_OrdenCompra_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                                        //$tratra= COMOrdenCompraTransicionEstado::find($tran->COM_OrdenCompra_TransicionEstado_Id);
                                        $t= COM_EstadoOrdenCompra::find($tran->COM_EstadoOrdenCompra_IdEstAct);
                                        ?><td>{{$t->COM_EstadoOrdenCompra_Nombre}}</td><?php
                                        } ?>
                                        
                            @endforeach
                            <td><a href="{{ route('AdministraOrCOm', array('id'=>$or->COM_OrdenCompra_IdOrdenCompra,)) }}" class="btn btn-info">Administrar</a></td>
                        </tr> 
                     @endforeach
                       
              </tbody>
            </table>
            <label>{{$ordenes->links()}}</label>
          </div>
        </div>
      
			</form>
</div>
@stop