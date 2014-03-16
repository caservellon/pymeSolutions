@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
    <h3 class="pull-left">Caja &gt; <small>Nueva Venta</small></h3>
    <div class="pull-right">
        <a href="{{{ URL::to('Ventas/Ventas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
    </div>
</div>

<div class="row">    
<div class="col-md-8">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>FAS-02</th>
                <th>Libra de Limones</th>
                <th>Lps. 4.50</th>
                <th>12.5</th>
                <th>Lps. 56.25</th>
            </tr>
            <tr>
                <th>2</th>
                <th>FAS-33</th>
                <th>Libra de Tomate</th>
                <th>Lps. 4.50</th>
                <th>12.5</th>
                <th>Lps. 56.25</th>
            </tr>
            <tr>
                <th>3</th>
                <th>FAS-43</th>
                <th>Libra de Cebolla</th>
                <th>Lps. 4.50</th>
                <th>12.5</th>
                <th>Lps. 56.25</th>
            </tr>
        </tbody>
    </table>
    
    <div class="venta-info">
        <div>
            <span class="bold-span">Sub Total: </span> <span class="sub-total ventas-valores">Lps. 0.00</span>
        </div>
        <div>
            <span class="bold-span">ISV: </span> <span class="isv ventas-valores">Lps. 0.00</span>
        </div>
        <div>
            <span class="bold-span">Total: </span> <span class="total ventas-valores">Lps. 0.00</span>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="opciones-cajas">
        <h4>Opciones de Caja</h4>
        <button type="button" class="btn btn-success">Agregar Producto</button>
        <button type="button" class="btn btn-info">Editar Producto</button>
        <button type="button" class="btn btn-warning">Eliminar Producto</button>
        <button type="button" class="btn btn-danger">Cancelar Ventas</button>
        <br>
        <button type="button" class="btn btn-primary">Finalizar Compra</button>
        <button type="button" class="btn btn-default">Guardar Compra</button>
    </div>
</div>
</div>


@stop


