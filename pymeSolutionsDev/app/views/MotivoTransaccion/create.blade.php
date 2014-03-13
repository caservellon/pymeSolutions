
<h1 class='col-md-6'>Motivo ></h1>
<p>Crear</p>
@include('_messages.errors')

{{ Form::open(array('route' => 'creandomotivo','class'=>'motivos')) }}
    {{ Form::label('CON_MotivoTransaccion_Codigo', 'Codigo de la Transaccion:') }}
    {{ Form::text('CON_MotivoTransaccion_Codigo') }}

    {{ Form::label('CON_MotivoTransaccion_Descripcion', 'Descripcion de la Transaccion:') }}
    {{ Form::text('CON_MotivoTransaccion_Descripcion') }}

	<h2> Cuentas Afectadas por la Transaccion </h2>>

    {{ Form::label('CON_CatalogoContable_ID', 'Cuenta Debe del Motivo:') }}
    {{ Form::text('CON_CatalogoContable_Debe') }}

    {{ Form::label('CON_CatalogoContable_ID', 'Cuenta Haber del Motivo:') }}
    {{ Form::text('CON_CatalogoContable_Haber') }}

    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}

{{ Form::close() }}


	<script type="text/javascript">
	$('input').addClass('form-control');

	var form=$('.motivos');
	form.submit(function(e){
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:form.attr('action'),
			data:form.serialize(),
			success:function(data){
				//$('.errors_form').html('');
				if (!data.success == false) {
					//$('#thismodal').html(data.html);
					console.log(data.html);
				}
				else{
					$('html').html(data);
					//$('html').attr('lang','en');
				}
			}
		});
	});
	</script>