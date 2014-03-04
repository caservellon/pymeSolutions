@extends('layouts.layout')

@section('main')


<h1>Create Unidad Monetaria</h1>

@if ($errors->any())
<div class="bs-callout bs-callout-danger error">
    <ul >
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
    </div>
@endif

{{ Form::open(array('url' => 'unidad-monetaria')) }}

        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_Nombre', 'Nombre:') }}
            {{ Form::text('CON_UnidadMonetaria_Nombre') }}
        </div>

        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_TasaConversion', 'Tasa Conversion:') }}
            {{ Form::text('CON_UnidadMonetaria_TasaConversion') }}
        </div>


        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_Observacion', 'Observacion:') }}
            {{ Form::text('CON_UnidadMonetaria_Observacion') }}
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