@extends('layouts.scaffold')

@section('main')


<h1>Edit Unidad Monetaria</h1>

@include('_messages.errors')

{{ Form::model($UnidadMonetaria, array('action' => array('UnidadMonetariaController@update', $UnidadMonetaria->CON_UnidadMonetaria_ID), 'method' => 'PUT')) }}
	
        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_Nombre', 'Nombre:') }}
            {{ Form::text('CON_UnidadMonetaria_Nombre','',array('maxlength'=>'45')) }}
        </div>

        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_TasaConversion', 'Tasa Conversion:') }}
            {{ Form::text('CON_UnidadMonetaria_TasaConversion','',array('maxlength'=>'5','placeholder'=>'##.##')) }}
        </div>

        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_Observacion', 'Observacion:') }}
            {{ Form::text('CON_UnidadMonetaria_Observacion','',array('maxlength'=>'255')) }}
        </div>

		<div class="form-group">
			{{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
           	</div>
	
{{ Form::close() }}



@stop

@section('contabilidad_scripts')
    <script type="text/javascript">
    $(document).ready($("input").addClass("form-control"));

</script>
@stop