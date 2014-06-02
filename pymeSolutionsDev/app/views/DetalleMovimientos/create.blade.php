@extends('layouts.scaffold')

@section('main')


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

<h3 class="sub-header">Seleccione los Productos a Incluir en la Entrada de Inventario</h3>
{{ Form::open(array('route' => 'Inventario.DetalleMovimiento.search', 'class' => "form-horizontal" , 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-6">
        {{ Form::text('search', null, array('class' => 'form-control', 'id' => 'search', 'placeholder'=>'Buscar por nombre, codigo, categoria..')) }}
    </div>
    <div class="col-md-2">
        {{ Form::submit('Buscar', array('class' => 'btn btn-info')) }}
    </div>
</div>
{{ Form::close() }}

{{ Form::open(array('route' => 'Inventario.DetalleMovimiento.store', 'class' => "form-horizontal", 'role' => 'form')) }}
    {{ Form::hidden('Motivo', $Motivo->INV_Movimiento_ID) }}
    {{ Form::hidden('Motivo2', $Motivo->INV_MotivoMovimiento_INV_MotivoMovimiento_ID) }}
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
                <th>Agregar</th>
                <th>Cantidad Agregar</th>
                <th>Precio Costo</th>
                <th>Otro Precio</th>
                <th>ID</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Precio Venta</th>
                <th>Precio Costo</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($Productos as $Producto)
                <tr>
                    <td>{{ Form::checkbox('A'.$Producto->INV_Producto_ID) }}</td>
                    {{ Form::hidden('Pro'.$Producto->INV_Producto_ID, $Producto->INV_Producto_ID) }}
                    <td>{{ Form::text('Cant'.$Producto->INV_Producto_ID, 0, array('class' => 'form-control text-center', 'id' => 'Cant'.$Producto->INV_Producto_ID)) }}</td>
                    <td>
                        <div class="">
                            {{ Form::select('INV_DetalleMovimiento_PrecioCosto'.$Producto->INV_Producto_ID, array($Producto->INV_Producto_PrecioCosto => 'Precio de Inventario', 0 => 'Sin Precio', 1 => 'Otro Precio'), $Producto->INV_Producto_PrecioCosto, array('class' => 'form-control', 'placeholder' => '#' )) }}
                        </div>
                    </td>
                    <td>
                        <div class="agregar-precio text-center">
                          <div>
                            {{ Form::text('OtroPrecio'.$Producto->INV_Producto_ID, 0, array('class' => 'form-control text-center', 'id' => 'INV_DetalleMovimiento_PrecioCosto')) }}
                          </div>
                        </div>
                    </td>
                    <td>{{{ $Producto->INV_Producto_ID }}}</td>
                    <td>{{{ $Producto->INV_Producto_Nombre }}}</td>
                    <td>{{{ $Categorias[$Producto->INV_Categoria_ID - 1]->INV_Categoria_Nombre }}}</td>
                    <td>{{{ $Producto->INV_Producto_Cantidad }}}</td>
                    <td>{{{ $Producto->INV_Producto_PrecioVenta }}}</td>
                    <td>{{{ $Producto->INV_Producto_PrecioCosto }}}</td>
                </tr>
                
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="form-group col-md-2">
        {{ Form::submit('Terminar', array('class' => 'btn btn-info')) }}
    </div>
{{ Form::close() }}
    <div>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.MovimientoInventario.destroy', $id))) }}
            {{ Form::submit('Cancelar', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
    </div>
@stop


