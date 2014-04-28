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
            <?php for($i=0; $i< count($imprimir); $i++){ foreach ($proveedores as $prov){ if($imprimir[$i]==$prov->INV_Proveedor_ID){ ?>
                
            <h5><?php echo $prov->INV_Proveedor_Nombre; ?></h5>
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
