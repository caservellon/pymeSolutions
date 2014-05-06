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
<ul>
    {{ implode('', $errors->all('<li class="alert alert-danger">:message</li>')) }}
</ul>
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
<hr>
<?php $prov_prod = DB::table('INV_Producto_Proveedor')->get(); ?>


@foreach($prov_prod as $key)
@if($proveedores->INV_Proveedor_ID == $key->INV_Proveedor_ID)
@for($i=0; $i < count($cualquierProducto); $i++)

<?php $cualquierProducto1 = Producto::find($cualquierProducto[$i]); ?>
@if($cualquierProducto1->INV_Producto_ID == $key->INV_Producto_ID)
<div class="row">
    <div class="form-group">
        {{ Form::label('Producto', 'Producto', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::label('$cualquierProducto1->INV_Producto_Nombre',$cualquierProducto1->INV_Producto_Nombre , array('class' => 'col-md-2 control-label')) }}
        </div>

    </div>
    <div class="form-group">
        {{ Form::label('Descripcion', 'Descripcion', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::label('$cualquierProducto1->INV_Producto_Descripcion',$cualquierProducto1->INV_Producto_Descripcion , array('class' => 'col-md-2 control-label')) }}
        </div>

    </div>
    <div class="form-group">
        {{ Form::label('Cantidad', 'Cantidad', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{Form::text('CantidadSolicitar'.$cualquierProducto1->INV_Producto_ID, null, array('class' => 'form-control', 'id' => 'Cantidad', 'placeholder'=>'##')) }}<label>*</label>

        </div>

    </div>
    <?php $unidad = UnidadMedida::find($cualquierProducto1->INV_UnidadMedida_ID) ?>
    <div class="form-group">
        {{ Form::label('Unidad', 'Unidad', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::label('$unidad->INV_UnidadMedida_Nombre',$unidad->INV_UnidadMedida_Nombre , array('class' => 'col-md-2 control-label')) }}
        </div>

    </div>
    @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get() as $campo)
    <div class="form-group">
        {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
        @if ($campo->GEN_CampoLocal_Requerido)
        <label>*</label>
        @endif
        <div class="col-md-5">
            @if ($campo->GEN_CampoLocal_Tipo == 'TXT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'INT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
            {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
            @endif
            @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
            {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID')) }}
            @endif
        </div>
    </div> 
    @endforeach

</div>















@endif 

@endfor
@endif
@endforeach

<div class="row" >
    <div class="col-md-6" ><label></label></div>
    <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
</div>
<hr>
@endfor    

{{Form::close()}}
    
@stop






  

                
               
          
                














