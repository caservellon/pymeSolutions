@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listando Ventas</h2>

@if ($Ventas)
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Venta Código</th>
                <th>Descuento</th>
                <th>Impuesto</th>
                <th>SubTotal</th>
                <th>Total</th>
                <th>Caja</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Ventas as $Venta)
                <tr>
                    <td>{{{ $Venta->VEN_Venta_id }}}</td>
                    <td>{{{ $Venta->VEN_Venta_Codigo }}}</td>
                    <td>{{{ $Venta->VEN_Venta_DescuentoCliente }}}</td>
                    <td>{{{ $Venta->VEN_Venta_ISV }}}</td>
                    <td>{{{ $Venta->VEN_Venta_Subtotal }}}</td>
                    <td>{{{ $Venta->VEN_Venta_Total }}}</td>
                    <td>{{{ DB::table('VEN_Caja')->where('VEN_Caja_ID',$Venta->VEN_Caja_VEN_Caja_id)->first()->VEN_Caja_Numero }}}</td>
                    <td>{{ link_to_route('Ventas.ListarOne', 'Ver Detalle de Venta', array($Venta->VEN_Venta_id), array('class' => 'btn btn-info')) }}</td>
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


