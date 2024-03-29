@extends('layouts.scaffold')

@section('main')

<div class='page-header clearfix'>
<h2>Transacciones Automaticas > <small>Listar</small>
    <a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad/configuracion')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a></h2>    
</div>


@if ($ConceptoMotivos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nombre del Concepto</th>
				<th>Motivo Transaccion</th>
				@if(Seguridad::EditarConceptosDeTransaccionesAutomaticas())
				<th>Accion</th>
				@endif
			</tr>
		</thead>

		<tbody>
			@foreach ($ConceptoMotivos as $ConceptoMotivo)
				<tr>
					<td>{{{ $ConceptoMotivo->CON_ConceptoMotivo_Concepto }}}</td>
					@foreach ($Moti as $M)
						@if($ConceptoMotivo->CON_MotivoTransaccion_ID == $M->CON_MotivoTransaccion_ID)
						<td>{{{ $M->CON_MotivoTransaccion_Descripcion }}}</td>
						@endif
					@endforeach
					@if(Seguridad::EditarConceptosDeTransaccionesAutomaticas())
					<td><a class="btn btn-info" href="{{URL::to('contabilidad/conceptomotivo/'.$ConceptoMotivo->CON_ConceptoMotivo_ID.'/edit')}}"><i class="glyphicon glyphicon-pencil"></i> Editar</a></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Losiento no ha creado Conceptos! :(
@endif

@stop
