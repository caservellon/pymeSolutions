@extends('layouts.scaffold')

@section('main')

<?php $proveedores = Proveedor::all(); ?>
<div style='text-align: center; margin-top: 25%'>
    <div class='row'>
        <div class="col-md-12">
            <h3 class="is-hidden">
                {{{ $mensaje->GEN_Mensajes_Mensaje}}}
            </h3>
        </div>
        
    </div>
    <div class='row'>
        <div class="col-md-12">
            <?php for($j=0; $j< count($correo); $j++){ foreach ($proveedores as $prov){ if($correo[$j]==$prov->INV_Proveedor_ID){ ?>
            <div class="col-md-5">
               <h5><?php echo $prov->INV_Proveedor_Nombre; ?></h5> 
            </div>   
            
            <?php }}} ?>
        </div>
    </div>
    <div class='row'>
    <div class='row'>
        <div class="col-md-12">
            <?php for($i=0; $i< count($imprimir); $i++){ foreach ($proveedores as $prov){ if($imprimir[$i]==$prov->INV_Proveedor_ID){ ?>
            <div class='col-md-5'>   
            <h5><?php echo $prov->INV_Proveedor_Nombre; ?></h5>
            </div>
            <?php }}} ?>
        </div>
    </div>
    <div class='row'>
        <div class="col-md-12">
            <a href="{{{ $ruta }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok btn-sm"></span></a>
        </div>  
    </div>
</div>




@stop