@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header">Editar Estado Orden Compra</h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Configuración <small>>Parametrizar>Estados Orden de Compra</small>
	</a>
</div>
         <div class="table-responsive">
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Observacion</th>
                  <th>activa</th>
                </tr>
              </thead>
         </div>
    
      <tbody>   
      
         @foreach($data1 as $nombre)
         <tr>
            <div class="form-group">
                <td>{{{ $nombre->COM_EstadoOrdenCompra_Nombre}}}</td>
            <div class="col-md-4">
                <td>{{{ $nombre->COM_EstadoOrdenCompra_Observacion}}}</td>
            </div>
         </div>
        <div class="form-group">
                @if($nombre->COM_EstadoOrdenCompra_Activo==0)
                <td>No activo</td>
                @else
                <td>Activo</td>
                @endif 
                <td><a href="{{ route('EditarEstadoOrdenCompra', array('id'=>$nombre->COM_EstadoOrdenCompra_IdEstadoOrdenCompra)) }}" class="btn btn-info">Editar</a></td>
   
         @endforeach
         </tr>
     
     </tbody>
     </table>
             
      <h6>{{ $data1->links() }}</h6>
@stop