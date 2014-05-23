@extends ('layouts.scaffold')
@section('main')

<h2 class='sub-header'><i class="glyphicon glyphicon-th"></i>Libro Mayor <small> </small>
<a class='btn btn-primary pull-right ' href="{{URL::to('contabilidad')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
</h2>
@foreach ($Libro as $Cuenta)
	<table class="table table-striped">
		<thead>
			<th colspan="2">{{{ $Cuenta->CON_CatalogoContable_Nombre }}}</th>
		</thead>
		<tbody>
			<tr>
				<th>Debe</th>
				<th>Haber</th>
			</tr>
			<tr>
				@if ( $Cuenta->CON_CuentaT_AcreedorDeudor)
					<td></td>
					<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
				@else
					<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
					<td></td>
				@endif
			</tr>
		</tbody>
	</table>
@endforeach
@stop
