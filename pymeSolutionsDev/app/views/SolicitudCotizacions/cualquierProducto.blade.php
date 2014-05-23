@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Cotizaciones &gt; <small>Crear Solicitud de Cotizacion</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/SolicitudCotizacion/Crear') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>  

<div  class="col-md-9" >
                          
                                 <div class="col-xs-5 col-sm-6 col-md-12">
                                    {{ Form::open(array('route' => 'SolicitudCotizacions.buscarCualquierProducto')) }}
                                    {{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
                                    {{ Form::text('search', null, array('class' => 'col-md-4', 'form-control', 'id' => 'search', 'placeholder'=>'Buscar por nombre, ciudad, codigo..')) }}
                                    {{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' )) }}
                                    {{ Form::close() }}
                                </div>
             
             
          </div>
            {{ Form::open(array('route' => 'seleccion', 'class' => "form-horizontal" , 'role' => 'form' )) }}
            <div class="row">
                
               <div class="col-md-1 col-md-offset-10"> {{ Form::submit('Continuar', array('class' => 'btn btn-default btn-md')) }}</div>
            </div>       
                <div class="table-responsive">
                <table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
                                <th>Stock</th>
                                <th>Reorden</th>
                                <th>Proveedor</th>
                                <th></th>
                                
			</tr>
		</thead>

		<tbody>
                    
			@foreach ($cualquierProducto as $value)
                            <?php $prov_prod = invCompras::ProductoProveedor(1); ?>
				<tr>
					<td>{{{ $value->INV_Producto_Codigo }}}</td>
					<td>{{{ $value->INV_Producto_Nombre }}}</td>
					<td>{{{ $value->INV_Producto_Descripcion }}}</td>
					<td>{{{ $value->INV_Producto_Cantidad }}}</td>
                                        <td>{{{ $value->INV_Producto_PuntoReorden }}}</td>
                                        <td>@foreach($prov_prod as $key)
                                  
                                        <a>{{{$key->INV_Proveedor_Codigo}}}</a>
                                        {{form::text('idP'.$key->INV_Proveedor_ID, $key->INV_Proveedor_ID, array('style'=>'display:none'))}}
                                        
                                        @endforeach</td>
                                         
                                        <!--<td>{{ link_to_route('seleccion', 'Incluir', array('id'=>$value->INV_Producto_ID), array('class' => 'btn btn-info')) }}</td>-->
                                        <td>Incluir{{ Form::checkbox('Incluir'.$value->INV_Producto_ID, '1', false) }}</td>
                                        {{form::text('id'.$value->INV_Producto_ID, $value->INV_Producto_ID, array('style'=>'display:none'))}}
                                </tr>
                                
                @endforeach
                
            
                </tbody> 
             </table>
          </div>
           
             
{{Form::close()}}













@stop