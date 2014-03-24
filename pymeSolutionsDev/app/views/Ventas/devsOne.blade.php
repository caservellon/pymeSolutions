@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listando Detalle de Devolución</h2>

@if ($Dev)
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Dev as $dev)
                <tr>
                    <td>{{{ $dev->VEN_DetalleDevolucion_id }}}</td>
                    <td>{{{ $dev->VEN_DetalleDevolucion_Cantidad }}}</td>
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


