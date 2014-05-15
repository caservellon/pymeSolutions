@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listando Detalle de Venta</h2>

@if ($Venta)
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Venta as $venta)
                <tr>
                    <td>{{{ $venta->VEN_DetalleDeVenta_Codigo }}}</td>
                    <td>{{{ $venta->VEN_DetalleDeVenta_CantidadVendida }}}</td>
                    <td>{{{ $venta->VEN_DetalleDeVenta_PrecioVenta }}}</td>
                </tr>
            @endforeach
        </tbody>

      </table>
    </div>
@else
    <div class="alert alert-danger">
      <strong>Oh no!</strong> Aún no hay ninguna venta :(
    </div>

@endif

@stop


