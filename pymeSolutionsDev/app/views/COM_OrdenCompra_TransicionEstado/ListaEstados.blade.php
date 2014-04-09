@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header">Agregar Nueva Transicion Estado Orden Compra</h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Configuración <small>>Parametrizar>Transicion de Estados Orden de Compra</small>
	</a>
</div>
      
         <div class="table-responsive">
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Observacion</th>
                  <th>Estado</th>
                </tr>
              </thead>
         </div>
    
      <tbody>   
      
         @foreach($data1 as $nombre)
         <tr>
         <td>{{{ $nombre->COM_EstadoOrdenCompra_Nombre}}}</td>
         <td>{{{ $nombre->COM_EstadoOrdenCompra_Observacion}}}</td>
        
                @if($nombre->COM_EstadoOrdenCompra_Activo==1)
                <td>Activo</td>
                
                @else
                <td>Inactivo</td>
                @endif 
                <td><a href="{{ route('NuevaTransicion', array('id'=>$nombre->COM_EstadoOrdenCompra_IdEstadoOrdenCompra)) }}" class="btn btn-info">Nueva Transicion</a></td>
         @endforeach
         </tr>
     
     </tbody>
     </table>
             
<div >
      <h6>{{ $data1->links() }}</h6>
</div>
@stop