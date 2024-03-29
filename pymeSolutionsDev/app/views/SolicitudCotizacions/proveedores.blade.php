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
<div class="alert alert-danger fade in">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      @if($errors->count() > 1)
      <h4>Oh no! Se encontraron errores!</h4>
      @else
      <h4>Oh no! Se encontró un error!</h4>
      @endif
      <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </ul>
      
</div>
@endif     




@for($j=0; $j < count($proveedor); $j++)
<?php $proveedores = invCompras::ProveedorCompras($proveedor[$j]);
      $empresa= Seguridad::Compania(); ?>
<div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2> Solicitud de Cotizacion</h2>
        <h5><?php echo $empresa->SEG_Config_NombreEmpresa; ?></h5>
        <h5><?php echo $empresa->SEG_Config_Direccion; ?></h5>
        <h5>Honduras C.A.</h5>
    </div>
    <div class="col-md-4 " style="text-align: right">
        <h5 >Tel: <?php echo " ".$empresa->SEG_Config_Telefono; echo '  '; echo $empresa->SEG_Config_Telefono2; ?></h5>
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
                    <?php $prov_prod = invCompras::ProveedorProducto($proveedores->INV_Proveedor_ID) ?>
                    @foreach($prov_prod as $key)
                   
			@for($i=0; $i < count($cualquierProducto); $i++)
                        
                                    <?php $cualquierProducto1= invCompras::ProductoCompras($cualquierProducto[$i]);  $nombret = str_replace(' ', '', $proveedores->INV_Proveedor_Nombre);?>
                                    @if($cualquierProducto1->INV_Producto_ID == $key->INV_Producto_ID)
                                    <tr>
					
                                       
                                        
					<td>{{{ $cualquierProducto1->INV_Producto_Nombre }}}</td>
					<td>{{{ $cualquierProducto1->INV_Producto_Descripcion }}}</td>
                                        <?php $nombre = str_replace(' ', '', $cualquierProducto1->INV_Producto_Nombre ); if(empty($Input)){ ?>
                                       
                                        <td>{{ Form::text('CantidadSolicitar'.$nombret.$nombre, null, array('class' => 'form-control', 'placeholder'=>'##', 'id' => 'CantidadSolicitar'.$proveedores->INV_Proveedor_Nombre.$cualquierProducto1->INV_Producto_Nombre ))}}</td>
                                        <?php }else{ ?>
                                        <td>{{ Form::text('CantidadSolicitar'.$nombret.$nombre, $Input['CantidadSolicitar'.$nombret.$nombre], array('class' => 'form-control', 'placeholder'=>'##', 'id' => 'CantidadSolicitar'.$proveedores->INV_Proveedor_Nombre.$cualquierProducto1->INV_Producto_Nombre ))}}</td>
                                        <?php } ?>
                                        
                                        <?php $unidad= invCompras::UnidadCompras($cualquierProducto1->INV_UnidadMedida_ID) ?>
                                        <td>{{{ $unidad->INV_UnidadMedida_Nombre }}}</td>
                                        
                                       
                                        
                                        
                                </tr>
                               @endif 
                           
                          @endfor
                    
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
            {{ Form::text($campo->GEN_CampoLocal_Codigo.$nombret,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo.$nombret)) }}
            
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'INT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo.$nombret,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo.$nombret, 'placeholder'=>'##')) }}
            
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo.$nombret,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo.$nombret, 'placeholder'=>'#.##')) }}
            
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
            {{ Form::select($campo->GEN_CampoLocal_Codigo.$nombret, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_Valor')) }}
            
            @endif
        </div>
    </div> 
    @endforeach

</div>
<div class="col-md-4">
<label>Forma de Pago</label>
           <?php $formapago=  invCompras::ProveedorFormaPago($proveedores->INV_Proveedor_ID);
                  $form=array();
                  $id=array();
                  foreach ($formapago as $forma){
                         $id[]=$forma->INV_FormaPago_ID;
                   }
                   $m= invCompras::FormaPagolista($id);
                  
                 
           ?>
           {{ Form::select('formapago'.$nombret,$m) }}
           
</div>	
<div class="col-md-4">
    <p>Por favor mandar la cantidad de pagos a realizar y el periodo de gracia para realizar el primer pago a partir de enviar la cotizacion</p>
</div>	

<div class="row" >
    <div class="col-md-6" ><label></label></div>
    <div class="col-md-6" style="text-align: right"><label>Oficial Compras</label><h5><?php echo Auth::user()->SEG_Usuarios_Nombre; ?></h5></div>
</div>
<hr>
@endfor    

{{Form::close()}}
    
@stop






  

                
               
          
                














