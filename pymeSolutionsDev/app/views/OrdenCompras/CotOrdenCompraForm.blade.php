@extends('layouts.scaffold')

@section('main')
<div class="row">
    <div class="page-header clearfix">
      <h3 class="pull-left">Crear Orden de Compra&gt;sin cotizacion&gt;Detalle<small></small></h3>
      <div class="pull-right">
        <a href="javascript:window.history.back();" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
</div>
<div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2>Orden de Compra</h2>
        <h5>Empresa X S.A.</h5>
        <h5>Colonia la America, Tegucigalpa,Francisco Morazán</h5>
        <h5>Honduras C.A.</h5>
    </div>
    <div class="col-md-4 " style="text-align: right">
        <h5 >Tel.2234-9000 Fax.2234-9000</h5>
    </div>
</div>
{{Form::open(array('route'=>'GuardaOCcnCot'),array('id'=>'formu'))}}
<div class="row">
    <div class="col-md-4">
        <h4>Para:</h4>
        {{Form::text('COM_Proveedor_IdProveedor',$proveedor, array('style' => 'display:none'))}}
        {{Form::text('Id_Cot',$id_cot, array('style' => 'display:none'))}}
        <?php $proveedora=  Proveedor::find($proveedor)?>
        <h5>{{$proveedora->INV_Proveedor_Nombre}}</h5>
        <h5>{{$proveedora->INV_Proveedor_Email}}</h5>
        <h5>{{$proveedora->INV_Proveedor_Direccion}}</h5>
        <h5>{{$proveedora->INV_Proveedor_Telefono}}</h5>
    </div>
</div>
<div class="row">
     <div class="table-responsive">
            <table class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Cantidad</th>
		  <th>Precio Unitario</th>
                  <th>Total</th>
		  <th>Unidad</th>
                </tr>
              </thead>
                  <tbody >
                      <?php $contador=0;
                        $total=0;
                        $elemento=3;
                        $totalGeneral=0;
                      ?>
                      @foreach ($productos as $product)
                      <?php $product1=  Producto::find($productos[$contador]);
                            $detcot=DB::select('SELECT * FROM COM_DetalleCotizacion WHERE  COM_DetalleCotizacion_IdCotizacion = ?', array($id_cot));
                            $cantidad=null;
                            $precioUnitario=null;
                            foreach ($detcot as $det){
                                if($det->COM_Producto_Id_Producto==$product){
                                        
                                        $cantidad=$det->COM_DetalleCotizacion_Cantidad;
                                        $precioUnitario=$det->COM_DetalleCotizacion_PrecioUnitario;
                                }
                            }
                           
                            ?>
                            
                      <tr>
                          {{Form::text('COM_Producto_idProducto'.$contador,$productos[$contador], array('style' => 'display:none'))}}
                          <td>{{ $product1->INV_Producto_Codigo}}<script></script></td>
                        <td>{{ $product1->INV_Producto_Nombre}}</td>
                        <td>{{ $product1->INV_Producto_Descripcion}}</td>
                        <?//esta es la forma para llamar a java script desde laravel?>
                        {{Form::text('COM_DetalleOrdenCompra_Cantidad'.$contador,$cantidad, array('style' => 'display:none'))}}
                        <td>{{$cantidad}}</td>
                        {{Form::text('COM_DetalleOrdenCompra_PrecioUnitario'.$contador,$precioUnitario, array('style' => 'display:none'))}}
                        <td>{{$precioUnitario}}</td>
                        <td>{{$cantidad*$precioUnitario}}</td>
                        <?php $medida=  UnidadMedida::find($product1->INV_UnidadMedida_ID);
                            $totalGeneral+=$cantidad*$precioUnitario;
                        ?>
			<td>{{$medida->INV_UnidadMedida_Nombre}}</td>
                  
                      </tr> 
                      <?php $contador++; ?>
                      @endforeach
              </tbody>
            </table>
          </div>
</div>
<div class="row">
    <div class="col-md-4">
        
        <label>Fecha Emision</label>
        {{date('Y/m/d H:i:s')}}
        
        <label>Fecha Entrega *</label>
         {{Form::text('COM_OrdenCompra_FechaEntrega',null,array('id'=>'COM_OrdenCompra_FechaEntrega','value'=>'','required '=>'required '))}}
		 <?php $horaInicio="08:30";
		 $horaFinal="19:00";
		?>
         <script>  $('#COM_OrdenCompra_FechaEntrega').appendDtpicker({
                        "autodateOnStart": false,
                        "futureOnly": true,
                        "locale":"es",
                        "minTime": "{{$horaInicio}}",
                        "maxTime": "{{$horaFinal}}",
                        "dateFormat": "YYYY/MM/DD hh:mm"
                    });
            </script>
             <?/*{{Form::text('COM_OrdenCompra_FechaEntrega',null, array('readonly' => 'readonly', 'id'=>'COM_OrdenCompra_FechaEntrega'))}}*/?>
          
          <hr>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        
        <br>
        <label>Forma de Pago</label>
         <?php $formapago=DB::table('INV_Proveedor_FormaPago')->where('INV_Proveedor_ID', '=',$proveedor)->get();
                $form=array();
                $id=array();
                foreach ($formapago as $forma){
                       $id[]=$forma->INV_FormaPago_ID;
                 }
                 $m=  FormaPago::find($id)->Lists('INV_FormaPago_Nombre','INV_FormaPago_ID');
                 
                 
         ?>
         {{ Form::select('formapago',$m) }}
         <?php $Coti=Cotizacion::find($id_cot);?>
         <label>Periodo de Gracia</label>
           <br>
           {{  Form::text('COM_OrdenCompra_PeriodoGracia',$Coti->COM_Cotizacion_PeriodoGracia, array('readonly'=>'readonly')) }}
           <label>Cantidad de Abonos a Realizar</label>
           {{  Form::text('COM_OrdenCompra_CantidadPago',$Coti->COM_Cotizacion_CantidadPago, array('readonly'=>'readonly') )}}
         
    </div>
    <div class="col-md-4">
        <label>Direccion de Entrega*:</label>
        <br>
         {{Form::radio('COM_OrdenCompra_Direccion','uno',true)}}Colonia America
         <br>
         {{Form::radio('COM_OrdenCompra_Direccion','uno',false)}}Colonia Carrizal
    </div>
    <div class="col-md-4" style="text-align: right">
        
        
        <label>Total: Lps. {{$totalGeneral}}</label>
        
        <input type="text" id="total" value="<?echo $totalGeneral;?>" style='display:none'>
        {{Form::text('totalG',$totalGeneral, array('style' => 'display:none'))}}
    </div>
</div>
<div class="row" >
    <div class="col-md-6" >
        {{Form::checkbox('COM_OrdenCompra_Activo','1',true)}}<label>Activo</label>
          <div class="form-group" id="campos Locales otros"> 
     
      <?/* usar lo q se ocupa */?>
      <h5>Campos Locales de Solicitud de Cotizacion</h5>
       @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get() as $campo)
              <br>
              <label >{{{ $campo->GEN_CampoLocal_Nombre }}}</label> 
              <br>      
              <?php 
                  $valores=ValorCampoLocal::where('COM_CampoLocal_IdCampoLocal','=',$campo->GEN_CampoLocal_ID)->first();
              ?>
              {{$valores->COM_ValorCampoLocal_Valor}}
              
        @endforeach
        <hr>
        <h5>Campos Locales de Cotizacion</h5>
       @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_COT%')->get() as $campo)
              <br>
              <label >{{{ $campo->GEN_CampoLocal_Nombre }}}</label> 
              <br>      
              <?php 
                  $valores=ValorCampoLocal::where('COM_CampoLocal_IdCampoLocal','=',$campo->GEN_CampoLocal_ID)->first();
              ?>
              {{$valores->COM_ValorCampoLocal_Valor}}
              
        @endforeach                   
  </div>
    </div>
    <div class="col-md-6" style="text-align: right">
          <div class="form-group" id="campos Locales compras"> 
     
      <?/* usar lo q se ocupa */?>

       @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_OC%')->get() as $campo)
              <br>
              <label >{{{ $campo->GEN_CampoLocal_Nombre }}}</label> 
              <br>      
              @if ($campo->GEN_CampoLocal_Requerido)
                                                             
                @if ($campo->GEN_CampoLocal_Tipo == 'TXT')
                        <td>*{{  Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'INT')
                        <td>*{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        <td>*{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                       <td>* {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_Valor')) }}</td>
                    @endif
                    @else
                        @if ($campo->GEN_CampoLocal_Tipo == 'TXT')
                        <td>{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'INT')
                        <td>{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        <td>{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                       <td> {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_Valor')) }}</td>
                    @endif

               @endif
            
        @endforeach                   
  </div>

        <h5>Nombre del Oficial de Compras</h5>
    </div>
</div>

<div class="row">
    {{Form::submit('Guargar', array('class' => 'btn btn-sm btn-primary'))}}
    
</div>
{{Form::close()}}
@stop