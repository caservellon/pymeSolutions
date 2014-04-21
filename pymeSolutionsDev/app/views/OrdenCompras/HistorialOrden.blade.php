@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Historial de Orden de Compra <small></small></h3>
      <div class="pull-right">
        <a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
<div class="row">
    
    <h3>Historial de la Orden de Compra</h3>
      <div class="table-responsive" syle="overflow  :auto">
     <table class="table table-striped table-bordered" >
       
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Estado Anterior</th>
                  <th>Estado Actual</th>
                  <th>Observaciones</th>
                  <th>Fecha de Transicion</th>
		  <th>Usuario</th>
		  
                </tr>
              </thead>
              <tbody >
     @foreach ($historial as $product)
                      
           
                  
                      
                      <tr>
                        <td>{{ $product->COM_TransicionEstado_Codigo}}</td>
                         <?php $estado= COM_EstadoOrdenCompra::find($product->COM_EstadoOrdenCompra_IdEstAnt); ?>
                        <td>{{ $estado->COM_EstadoOrdenCompra_Nombre}}</td>
                        <?php $estado= COM_EstadoOrdenCompra::find($product->COM_EstadoOrdenCompra_IdEstAct); ?>
                        <td>{{ $estado->COM_EstadoOrdenCompra_Nombre}}</td>
                        <td>{{ $product->COM_TransicionEstado_Observacion}}</td>
                        <td>{{ $product->COM_TransicionEstado_FechaCreo}}</td>
                        <?php //$id_t= $product->COM_TransicionEstado_Id ; ?>
			<td>{{ $product->COM_Usuario_idUsuarioCreo}}</td>
                        
                      </tr> 
                        @endforeach
                  </tbody>
            </table>
          
          </div>
   <h6>{{ $historial->links() }}</h6>
</div>
@stop