@extends('layouts.scaffold')

@section('main')

<h1>Crear Subcuenta</h1>

@include('_messages.errors')

{{ Form::open(array('url' => 'subcuenta')) }}
	
        <div class="form-group">
            {{ Form::label('CON_CatalogoContable_ID', 'Subcuenta de:') }}
            {{ Form::select('CON_CatalogoContable_ID', $Catalogo, $selected) }}
        </div>      
            {{ Form::label('CON_Subcuenta_Codigo', 'Codigo:') }}
            {{ Form::text('CON_Subcuenta_Codigo') }}
        <div class="form-group">
            {{ Form::label('CON_Subcuenta_Nombre', 'Nombre:') }}
            {{ Form::text('CON_Subcuenta_Nombre') }}
        </div>

            <div class="form-group">
    
			{{ Form::submit('Submit', array('class' => 'btn btn-info form-control')) }}
	       </div>
	
{{ Form::close() }}



<script type="text/javascript">
    $(document).ready(function(){

        $("input").addClass("form-control");
        $("select").addClass("form-control");
    });

</script>

@stop


