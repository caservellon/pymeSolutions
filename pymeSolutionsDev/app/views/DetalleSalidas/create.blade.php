@extends('layouts.scaffold')

@section('main')


@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

<h3 class="sub-header">Productos Agregados</h3>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Categoría Padre</th>
                <th>Cantidad</th>
                <th>Precio Venta</th>
                <th>Precio Costo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{{ $result->INV_DetalleMovimiento_IDProducto }}}</td>
                    <td>{{{ $result->INV_DetalleMovimiento_CodigoProducto }}}</td>
                    <td>{{{ $result->INV_DetalleMovimiento_NombreProducto }}}</td>
                    <td>{{{ $Categorias[$result->INV_Producto_INV_Categoria_ID - 1]->INV_Categoria_Nombre }}}</td>
                    <td>{{{ $Categorias[$result->INV_Producto_INV_Categoria_IDCategoriaPadre - 1]->INV_Categoria_Nombre }}}</td>
                    <td>{{{ $result->INV_DetalleMovimiento_CantidadProducto }}}</td>
                    <td>{{{ $result->INV_DetalleMovimiento_PrecioVenta }}}</td>
                    <td>{{{ $result->INV_DetalleMovimiento_PrecioCosto }}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h3 class="sub-header">Seleccione los Productos a Incluir en la Salida de Inventario</h3>
{{ Form::open(array('route' => 'Inventario.DetalleSalida.search', 'class' => "form-horizontal" , 'role' => 'form')) }}
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
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Categoría Padre</th>
                <th>Cantidad</th>
                <th>Precio Venta</th>
                <th>Precio Costo</th>
                <th>Incluir</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($Productos as $Producto)
                <tr>
                    <td>{{{ $Producto->INV_Producto_ID }}}</td>
                    <td>{{{ $Producto->INV_Producto_Codigo }}}</td>
                    <td>{{{ $Producto->INV_Producto_Nombre }}}</td>
                    <td>{{{ $Categorias[$Producto->INV_Categoria_ID - 1]->INV_Categoria_Nombre }}}</td>
                    <td>{{{ $Categorias[$Producto->INV_Categoria_IDCategoriaPadre - 1]->INV_Categoria_Nombre }}}</td>
                    <td>{{{ $Producto->INV_Producto_Cantidad }}}</td>
                    <td>{{{ $Producto->INV_Producto_PrecioVenta }}}</td>
                    <td>{{{ $Producto->INV_Producto_PrecioCosto }}}</td>
                    <td>{{ link_to_route('Inventario.DetalleSalida.Agregar', 'Agregar', array($Producto->INV_Producto_ID), array('class' => 'btn btn-info')) }}</td>
                </tr>
                
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="form-group">
      <div class="col-md-5">
            <!-- comment{{ link_to_route('Inventario.MovimientoInventario.Terminar', 'Terminar', $id, array('class' => 'btn btn-info')) }}-->
            @if ($results != null)
                {{ link_to_route('Inventario.MovimientoInventario.Detalles', 'Terminar', $id, array('class' => 'btn btn-info')) }}
            @else
                {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.SalidaInventario.destroy', $id))) }}
                    {{ Form::submit('Cancelar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                <!--{{ link_to_route('Inventario.MovimientoInventario.destroy', 'Cancelar', $id, array('class' => 'btn btn-danger')) }} -->
            @endif
      </div>
    </div>



@stop


