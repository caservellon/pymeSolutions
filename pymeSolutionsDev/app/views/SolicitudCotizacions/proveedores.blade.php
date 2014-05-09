@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Crear Solicitud de Cotizacion &gt; <small>Detalle</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/SolicitudCotizacion/Crear/CualquierProducto') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>

{{ Form::open(array('route' => array('Compras.SolicitudCotizacions.store', 'cualquiera'=>$cualquierProducto, 'prove'=>$proveedor), 'class' => "form-horizontal" , 'role' => 'form' )) }}
<div class="row">
    <div class="col-md-1 col-md-offset-10"> {{ Form::submit('Confirmar', array('class' => 'btn btn-default btn-md')) }}</div>
</div> 

        
@if ($errors->any())
<div class="alert alert-danger">
    {{ implode('', $errors->all('<li >:message</li>')) }}
</div>
@endif      




@for($j=0; $j < count($proveedor); $j++)
<?php $proveedores = Proveedor::find($proveedor[$j]); ?>
<div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2> Solicitud de Cotizacion</h2>
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
        <h5>{{{$proveedores->INV_Proveedor_Nombre}}}</h5>
        <h5>{{$proveedores->INV_Proveedor_Email}}</h5>
        <h5>{{$proveedores->INV_Proveedor_Direccion}}</h5>
        <h5>{{$proveedores->INV_Proveedor_Telefono}}</h5>
    </div>
</div>


<div class="table-responsive">
                <table class="table table-striped table-bordered">
		<thead>
			<tr>
				
				<th>Nombre</th>
				<th>Descripcion</th>
                                <th>Cantidad a Solicitar</th>
                                <th>Unidad</th>
                               
                                
			</tr>
		</thead>

		<tbody>
                    <?php $prov_prod = DB::table('INV_Producto_Proveedor')->get(); ?>
                    
                
                    @foreach($prov_prod as $key)
                    @if($proveedores->INV_Proveedor_ID == $key->INV_Proveedor_ID)
			@for($i=0; $i < count($cualquierProducto); $i++)
                        
                                    <?php $cualquierProducto1= Producto::find($cualquierProducto[$i]);  ?>
                                    @if($cualquierProducto1->INV_Producto_ID == $key->INV_Producto_ID)
                                    <tr>
					
                                       
                                        
					<td>{{{ $cualquierProducto1->INV_Producto_Nombre }}}</td>
					<td>{{{ $cualquierProducto1->INV_Producto_Descripcion }}}</td>
                                        <td>{{Form::text('CantidadSolicitar'.$cualquierProducto1->INV_Producto_ID, null,array('placeholder'=>'##'))}}</td>
					
                                        
                                        <?php $unidad= UnidadMedida::find($cualquierProducto1->INV_UnidadMedida_ID) ?>
                                        <td>{{{ $unidad->INV_UnidadMedida_Nombre }}}</td>
                                        
                                       
                                        
                                        
                                </tr>
                               @endif 
                           
                          @endfor
                    @endif
                    @endforeach
                </tbody> 
             </table>
          </div>


<div class="col-md-8 " style="text-align: left">
    @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get() as $campo)
    <div class="form-group">
        {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
        @if ($campo->GEN_CampoLocal_Requerido)
        <label>*</label>
        @endif
        <div class="col-md-5">
            @if ($campo->GEN_CampoLocal_Tipo == 'TXT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo.$proveedores->INV_Proveedor_Nombre,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo.$cualquierProducto1->INV_Producto_ID)) }}
            
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'INT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo.$proveedores->INV_Proveedor_Nombre,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo.$cualquierProducto1->INV_Producto_ID, 'placeholder'=>'##')) }}
            
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo.$proveedores->INV_Proveedor_Nombre,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo.$cualquierProducto1->INV_Producto_ID, 'placeholder'=>'#.##')) }}
            
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
            {{ Form::select($campo->GEN_CampoLocal_Codigo.$proveedores->INV_Proveedor_Nombre, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_Valor')) }}
            
            @endif
        </div>
    </div> 
    @endforeach

</div>



<div class="row" >
    <div class="col-md-6" ><label></label></div>
    <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
</div>
<hr>
@endfor    

{{Form::close()}}
    
@stop






  

                
               
          
                














