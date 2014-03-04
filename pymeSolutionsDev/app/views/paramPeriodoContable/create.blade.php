@extends('layouts.layout')

@section('main')


<h1>Create Clasificacion Periodo</h1>

@if ($errors->any())
<div class="bs-callout bs-callout-danger error">
    <ul >
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
    </div>
@endif

{{ Form::open(array('url' => 'param-periodo')) }}
	  

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_Nombre', 'Nombre:') }}
            {{ Form::text('CON_ClasificacionPeriodo_Nombre') }}
        </div>

        <div class="form-group">
            {{ Form::label('CON_ClasificacionPeriodo_CatidadDias', 'Cantidad de dias:') }}
            {{ Form::text('CON_ClasificacionPeriodo_CatidadDias') }}
        </div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</div>
	
{{ Form::close() }}


<script type="text/javascript">
	$(document).ready(function(){

        $("input").addClass("form-control");

    });

</script>
@stop