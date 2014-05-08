@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header">Listado de Cajas</h2>
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
                  <th>activa</th>
                </tr>
              </thead>
         </div>
    
      <tbody>   
      
         @foreach($data1 as $nombre)
         <tr>
         <td>{{{ $nombre->COM_EstadoOrdenCompra_Nombre}}}</td>
         <td>{{{ $nombre->COM_EstadoOrdenCompra_Observacion}}}</td>
        
                @if($nombre->COM_EstadoOrdenCompra_Activo==0)
                <td>No activo</td>
                @else
                <td>Activo</td>
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