@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header">Listado de Cajas</h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
	  Configuración <small>>Parametrizar>Estados Orden de Compra</small>
	</a>
</div>
   
         <div class="table-responsive">
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th>Estado Anterior</th>
                  <th>Estado Actual</th>
                  <th>Estado Posterior</th>
                  <th>Observacion</th>
                </tr>
              </thead>
         </div>
    
      <tbody>   
      
         @foreach($data1 as $nombre)
         <tr>
        
         
          <td>{{{ COM_EstadoOrdenCompra::find($nombre->COM_OrdenCompra_TransicionEstado_EstadoPrevio)->COM_EstadoOrdenCompra_Nombre}}}</td>
          <td>{{{ COM_EstadoOrdenCompra::find($nombre->COM_OrdenCompra_TransicionEstado_EstadoActual)->COM_EstadoOrdenCompra_Nombre}}}</td>
          <td>{{{ COM_EstadoOrdenCompra::find($nombre->COM_OrdenCompra_TransicionEstado_EstadoPosterior)->COM_EstadoOrdenCompra_Nombre}}}</td>
          <td>{{{ $nombre->COM_OrdenCompra_TransicionEstado_Observacion}}}</td>
               
                <td><a href="{{ route('EditarTransicion', array('id'=>$nombre->COM_OrdenCompra_TransicionEstado_Id)) }}" class="btn btn-info">Editar</a></td>
         @endforeach
         </tr>
     
     </tbody>
     </table>
             

      <h6>{{ $data1->links() }}</h6>
@stop