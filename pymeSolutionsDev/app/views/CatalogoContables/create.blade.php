@extends('layouts.scaffold')

@section('main')

<h1>Crear nueva cuenta</h1>

@include('_messages.errors')

{{ Form::open(array('url' => 'contabilidad/configuracion/catalogocuentas')) }}

            {{ Form::label('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', 'Clasificacion Cuenta:') }}
            {{ Form::select('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', $clasi, $selected,array('id'=> 'prueba2')) }}
     
            {{ Form::label('CON_CatalogoContable_Codigo', 'Codigo:') }}
            {{ Form::text('CON_CatalogoContable_Codigo','',array('maxlength'=>'10','id' => 'prueba')) }}

            {{ Form::label('CON_CatalogoContable_Nombre', 'Nombre:') }}
            {{ Form::text('CON_CatalogoContable_Nombre','',array('maxlength'=>'100')) }}
  

             {{ Form::hidden('CON_CatalogoContable_UsuarioCreacion','Admin') }}

            {{ Form::label('CON_CatalogoContable_NaturalezaSaldo', 'Naturaleza Saldo:') }}
            {{ Form::select('CON_CatalogoContable_NaturalezaSaldo', $naturaleza, $selected3) }}
  <div class="form-group">
            {{ Form::label('CON_CatalogoContable_Estado', 'Estado:') }}
            {{ Form::select('CON_CatalogoContable_Estado',$esta,$selected2) }}
      </div>
			{{ Form::submit('Crear', array('class' => 'btn btn-info')) }}

{{ Form::close() }}
<script type="text/javascript">
$('#prueba2').on('change', function(){
var asd = $('#prueba2').val();
$('#prueba').attr("value",asd);
});
</script>


<script type="text/javascript">
    $(document).ready(function(){

        $("input").addClass("form-control");
        $("select").addClass("form-control");

    });

</script>
@stop