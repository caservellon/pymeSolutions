@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listando Devoluciones</h2>

@if ($Devs)
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Devolución Código</th>
                <th>Monto</th>
                <th>Venta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Devs as $Dev)
                <tr>
                    <td>{{{ $Dev->VEN_Devolucion_id }}}</td>
                    <td>{{{ $Dev->VEN_Devolucion_Codigo }}}</td>
                    <td>{{{ $Dev->VEN_Devolucion_Monto }}}</td>
                    <td>{{{ $Dev->VEN_Venta_VEN_Venta_id }}}</td>
                    <td>{{ link_to_route('Ventas.DevsOne', 'Show', array($Dev->VEN_Devolucion_id), array('class' => 'btn btn-info')) }}</td>
                </tr>
            @endforeach
        </tbody>

      </table>
    </div>
@else
    <div class="alert alert-danger">
      <strong>Oh no!</strong> Aún no hay ninguna devolución :(
    </div>

@endif

@stop


