@extends ('layouts.scaffold')
@section('main')

<h2 class='sub-header'><i class="glyphicon glyphicon-cog"></i>Balanza de Comprobacion <small> Ver</small>
<a class='btn btn-primary pull-right ' href="{{URL::to('contabilidad')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
</h2>

<table class="table table-striped">
	<thead>
		<th>Cuenta</th>
		<th>Debe</th>
		<th>Haber</th>
	</thead>
	<tbody>
		@foreach ($Cuentas as $Cuenta)
			<tr>
					<td>{{{ $Cuenta->CON_CatalogoContable_Nombre }}}</td>
					@if ( $Cuenta->CON_CuentaT_AcreedorDeudor == 0 )
						<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
					@else
						<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
					@endif
			</tr>
			
		@endforeach
	</tbody>
</table>
<a class='btn btn-default pull-right' href="">Generar Balanza Comprobacion Ajustada</a>
@stop
