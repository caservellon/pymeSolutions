


@if(Request::ajax())
	<p><strong>Is ajax request </strong> </p>
@endif

@if ($LibroDiario->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>Fecha</th>
				<th>Detalle Cuenta</th>
				<th>Debe</th>
				<th>Haber</th>
				<th>Observaciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($LibroDiario as $Libro)
				<tr>	
					<td>{{{$Libro->CON_LibroDiario_ID}}}</td>
					<td></td>
					<td></td>
					<td></td>
                  	<td></td>
                  	<td>{{{ $Libro->CON_LibroDiario_Observacion }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<h4>No se encontraron asientos en el libro diario</h4>
@endif