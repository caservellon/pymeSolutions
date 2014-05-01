@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Crear Orden de Compra<small></small></h3>
      <div class="pull-right">
        <a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
<div class="row">
    <div class=" col-lg-12">
			<div  class="col-md-9" >
                          
                                 <div class="col-xs-5 col-sm-6 col-md-12">
                                    {{ Form::open(array('route' => 'OrdenCompra.search_index')) }}
                                    {{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
                                    {{ Form::text('search', null, array('class' => 'col-md-4','style'=>'width: 400px', 'form-control', 'id' => 'search', 'placeholder'=>'Buscar por nombre, ciudad, codigo..')) }}
                                    {{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' , 'style'=>'margin-left: 5px' )) }}
                                    {{ Form::close() }}
                                </div>
                                    
                                
                            
                            <div  class="col-xs-12 col-sm-6 col-md-8" >
                                {{Form::open(array('route'=>'OrdenSinCotizacion'))}}
                                <label>Proveedor : </label>
                                <?php $provedor=  Proveedor::where('INV_Proveedor_Activo','=',1)->lists('INV_Proveedor_Nombre','INV_Proveedor_ID');?>
                                {{ Form::select('proveedor',$provedor,$proveedor) }}
                                
                            </div>
                                
			</div>
			<div class="col-md-3">
                            
                            
                                {{Form::submit('Continuar', array('class' => 'btn btn-default btn-block col-md-6'))}}
                                
			</div>
    </div>
    
	<div class="col-md-9" style="overflow:auto; height: 350px">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Proveedor"("es")"</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php $contador=1;?>
                        @foreach($inventario as $producto)
                            @if($producto->INV_Producto_Activo==1)
                            
                                 <tr>
                                    <td>{{$producto->INV_Producto_Codigo}}</td>
                                    <td>{{$producto->INV_Producto_Nombre}}</td>
                                    <td>{{$producto->INV_Producto_Descripcion}}</td>
                                    <td>{{$producto->INV_Producto_Cantidad}}</td>
                                    <td>
                                        <?php $proveedores = DB::table('INV_Producto_Proveedor')->where('INV_Producto_ID', '=',$producto->INV_Producto_ID )->get();?>                                    
                                        @foreach($proveedores as $proveedor)
                                        <?php $provedor1=  Proveedor::find($proveedor->INV_Proveedor_ID)?>
                                            <a href="">{{$provedor1->INV_Proveedor_Nombre}} </a>
                                        @endforeach
                                        
                                    </td>
                                    <td>{{Form::checkbox('incluir'.$contador,'1',false)}}incluir</td>
                                    {{Form::text('Id'.$contador,$producto->INV_Producto_ID, array('style' => 'display:none'))}}
                                </tr>
                                <?php $contador++;?>
                            @endif
                            
                        @endforeach
              </tbody>
            </table>
          </div>
        </div>
	{{Form::close()}}
</div>
@stop