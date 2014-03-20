@extends('layouts.scaffold')

@section('main')
<div class="row">
    
    <h3>Historial de la Orden de Compra</h3>
      <div class="table-responsive" syle="overflow  :auto">
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
   <h6>{{ $historial->links() }}</h6>
</div>
@stop