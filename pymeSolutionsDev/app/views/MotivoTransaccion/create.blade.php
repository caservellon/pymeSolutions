

<div class='errors'>
	

</div>

{{ Form::open(array('route' => 'creandomotivo','class'=>'motivos form-horizontal')) }}
<div class="form-group">
    {{ Form::label('CON_MotivoTransaccion_Codigo', 'Codigo de la Transaccion:*') }}
     <div class='col-md-3'>
    {{ Form::text('CON_MotivoTransaccion_Codigo','',array('maxlength'=>'6')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('CON_MotivoTransaccion_Descripcion', 'Descripcion de la Transaccion:*') }}
     <div class='col-md-8'>
    {{ Form::text('CON_MotivoTransaccion_Descripcion','',array('placeholder'=>'Breve Descripcion del Motivo a Crear','maxlength'=>'255')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('CON_CatalogoContable_ID', 'Cuenta Debe del Motivo:') }}
     <div class='col-md-5'>
    {{ Form::select('CON_CatalogoContable_Debe',$Cuentas,array()) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('CON_CatalogoContable_ID', 'Cuenta Haber del Motivo:') }}
     <div class='col-md-5'>
    {{ Form::select('CON_CatalogoContable_Haber',$Cuentas,array()) }}
    </div>
</div>
     <div class='col-md-5'>
    {{ Form::submit('Agregar Motivo', array('class' => 'btn btn-success')) }}
    </div>
<br>
{{ Form::close() }}


	<script type="text/javascript">
	$('input').addClass('form-control');
	$('select').addClass('form-control');
	$("label").addClass('col-md-4 control-label pull-left');
	var form=$('.motivos');
	form.submit(function(e){
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:form.attr('action'),
			data:form.serialize(),
			success:function(data){
				//$('.errors_form').html('');
				console.log(data);
				if (data.success == false) {
					$('.errors').html(data.html);
					
				}
				else{
					location.reload();	
				}
			}
		});
	});
	</script>