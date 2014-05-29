@extends('layouts.scaffold')

@section('main')

<?php $proveedores = Proveedor::all(); ?>
<div style='text-align: center; margin-top: 25%'>
    @if(!empty($correo))
    <div class='row'>
        <div class="col-md-12">
            <h3 class="is-hidden">
                {{{ $mensaje}}}
            </h3>
        </div>
        
    </div>
    <div class='row'>
        <div class="col-md-12">
            <div class="col-md-5">
            <?php for($j=0; $j< count($correo); $j++){ foreach ($proveedores as $prov){ if($correo[$j]==$prov->INV_Proveedor_ID){ ?>
            
               <h5><?php echo $prov->INV_Proveedor_Nombre; ?></h5> 
            
            
            <?php }}} ?>
            </div>   
        </div>
    </div>
    @endif
    @if(!empty($imprimir))
    <div class='row'>
        <div class='row'>
        <div class="col-md-12">
            <h3 class="is-hidden">
                {{{ $mensaje2}}}
            </h3>
        </div>
        
    </div>
    <div class='row'>
        <div class="col-md-12">
            <div class='col-md-5'>  
            <?php for($i=0; $i< count($imprimir); $i++){ foreach ($proveedores as $prov){ if($imprimir[$i]==$prov->INV_Proveedor_ID){ ?>
             
            <h5><?php echo $prov->INV_Proveedor_Nombre; ?></h5>
            
            <?php }}} ?>
            </div>
        </div>
    </div>
    
</div>
    @endif
    <div class='row'>
        <div class="col-md-12">
            <a href="{{{ $ruta }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok btn-sm"></span></a>
        </div>  
    </div>
</div>




@stop
