@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Proveedor &gt; <small>Editar Proveedor</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Proveedor') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

    {{ Form::open(array('route' => 'Proveedor.editarFormaPago')) }}
    {{ Form::label('FP', 'Editar: ', array('class' => 'col-md-2 control-label')) }}
    {{ Form::hidden('INV_Proveedor_Nombre', $Proveedor->INV_Proveedor_Nombre) }}
    {{ Form::submit('Forma de Pago', array('class' => 'btn btn-success btn-sm' )) }}
    {{ Form::close() }}
    <br />

@if ($errors->any())

<div class="alert alert-danger fade in">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      @if($errors->count() > 1)
      <h4>Oh no! Se encontraron errores!</h4>
      @else
      <h4>Oh no! Se encontró un error!</h4>
      @endif
      <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </ul>
      
</div>
@endif

{{ Form::model($Proveedor, array('method' => 'PATCH', 'route' => array('Inventario.Proveedor.update', $Proveedor->INV_Proveedor_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	{{ Form::hidden('INV_Proveedor_ID') }}
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Proveedor_Codigo', $Proveedor->INV_Proveedor_Codigo, array('class' => 'form-control', 'id' => 'INV_Proveedor_Codigo', 'placeholder'=>'PROV-00001', 'maxlength'=>'16')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Nombre', $Proveedor->INV_Proveedor_Nombre, array('class' => 'form-control', 'id' => 'INV_Proveedor_Nombre', 'placeholder'=>'Nombre', 'maxlength'=>'128')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Direccion', 'Direccion: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Proveedor_Direccion', $Proveedor->INV_Proveedor_Direccion, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Proveedor_Direccion', 'placeholder'=>'Descripcion', 'maxlength'=>'512')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Telefono', 'Teléfono:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Telefono', $Proveedor->INV_Proveedor_Telefono, array('class' => 'form-control', 'id' => 'INV_Proveedor_Telefono', 'placeholder'=>'(504)2222-2222', 'maxlength'=>'16')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Email', 'Email:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Email', $Proveedor->INV_Proveedor_Email, array('class' => 'form-control', 'id' => 'INV_Proveedor_Email', 'placeholder'=>'name@email.com', 'maxlength'=>'64')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_PaginaWeb', 'Página Web:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_PaginaWeb', $Proveedor->INV_Proveedor_PaginaWeb, array('class' => 'form-control', 'id' => 'INV_Proveedor_PaginaWeb', 'placeholder'=>'myweb.com', 'maxlength'=>'64')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_RepresentanteVentas', 'Representante Ventas: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_RepresentanteVentas', $Proveedor->INV_Proveedor_RepresentanteVentas, array('class' => 'form-control', 'id' => 'INV_Proveedor_RepresentanteVentas', 'placeholder'=>'name')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_TelefonoRepresentanteVentas', 'Teléfono Representante:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_TelefonoRepresentanteVentas', $Proveedor->INV_Proveedor_TelefonoRepresentanteVentas, array('class' => 'form-control', 'id' => 'INV_Proveedor_TelefonoRepresentanteVentas', 'placeholder'=>'(504)2222-2222')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Comentarios', 'Comentarios:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Proveedor_Comentarios', $Proveedor->INV_Proveedor_Comentarios, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Proveedor_Comentarios', 'placeholder'=>'Comentario', 'maxlength'=>'512')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Proveedor_RutaImagen', 'Ruta de Imagen:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Proveedor_RutaImagen',$Proveedor->INV_Proveedor_RutaImagen, array('class' => 'form-control', 'id' => 'INV_Proveedor_RutaImagen', 'placeholder' => 'Dir' )) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('INV_Ciudad_ID', 'Ciudad: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Ciudad_ID', $ciudades, null, array('class' => 'form-control', 'id' => 'INV_Ciudad_ID', 'placeholder' => '#' )) }}
      </div>
    </div>

   
    <div class="form-group">
      {{ Form::label('INV_Proveedor_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Proveedor_Activo', '1', $Proveedor->INV_Proveedor_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Proveedor_FechaModificacion', date('Y-m-d H:i:s')) }}

    <div class="page-header clearfix">
      <h3 class="pull-left">Proveedor &gt; <small>Campos Locales</small></h3>
    </div>
        
        @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','INV_PRV%')->get() as $campo)
            <div class="campo-local-tipo form-group">
                {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
                @if ($campo->GEN_CampoLocal_Requerido)
                    <label>*</label>
                @endif
                <div class="col-md-5">
                    @if ($campo->GEN_CampoLocal_Tipo == 'TXT' || $campo->GEN_CampoLocal_Tipo == 'INT' || $campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        @if (DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->count() > 0 )
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->first()->INV_Proveedor_CampoLocal_Valor, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @else
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @endif
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                        {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID')) }}
                    @endif
                </div>
            </div> 
        @endforeach


    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
      </div>
    </div>


{{ Form::close() }}


@stop
