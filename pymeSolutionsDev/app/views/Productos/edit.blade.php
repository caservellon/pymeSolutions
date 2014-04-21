@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Producto &gt; <small>Editar Producto</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Productos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
{{ Form::model($Producto, array('method' => 'PATCH', 'route' => array('Inventario.Productos.update', $Producto->INV_Producto_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="form-group">
      {{ Form::label('INV_Producto_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
        {{ Form::text('INV_Producto_Codigo', $Producto->INV_Producto_Codigo, array('class' => 'form-control', 'id' => 'INV_Producto_Codigo', 'placeholder'=>'PRO-00001')) }}
      </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Producto_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Producto_Nombre', $Producto->INV_Producto_Nombre, array('class' => 'form-control', 'id' => 'INV_Producto_Nombre', 'placeholder'=>'name')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Producto_Descripcion', 'Descripción: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Producto_Descripcion', $Producto->INV_Producto_Descripcion, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Producto_Descripcion', 'placeholder'=>'Descripcion')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PrecioVenta', 'Precio de Venta: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PrecioVenta',$Producto->INV_Producto_PrecioVenta, array('class' => 'form-control', 'id' => 'INV_Producto_PrecioVenta', 'placeholder' => '#.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_MargenGanancia', 'Margen de Ganancia: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_MargenGanancia',$Producto->INV_Producto_MargenGanancia, array('class' => 'form-control', 'id' => 'INV_Producto_MargenGanancia', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PrecioCosto', 'Precio de Costo: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PrecioCosto',$Producto->INV_Producto_PrecioCosto, array('class' => 'form-control', 'id' => 'INV_Producto_PrecioCosto', 'placeholder' => '#.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Cantidad', 'Cantidad:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Cantidad',$Producto->INV_Producto_Cantidad, array('class' => 'form-control', 'id' => 'INV_Producto_Cantidad', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Impuesto1', 'Impuesto 1:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Impuesto1',$Producto->INV_Producto_Impuesto1, array('class' => 'form-control', 'id' => 'INV_Producto_Impuesto1', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Impuesto2', 'Impuesto 2:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Impuesto2',$Producto->INV_Producto_Impuesto2, array('class' => 'form-control', 'id' => 'INV_Producto_Impuesto2', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_RutaImagen', 'Ruta de Imagen:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_RutaImagen',$Producto->INV_Producto_RutaImagen, array('class' => 'form-control', 'id' => 'INV_Producto_RutaImagen', 'placeholder' => 'Dir' )) }}
      </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Producto_Comentarios', 'Comentarios:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Producto_Comentarios', $Producto->INV_Producto_Comentarios, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Producto_Comentarios', 'placeholder'=>'Comentario')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PuntoReorden', 'Punto de Reorden: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PuntoReorden',$Producto->INV_Producto_PuntoReorden, array('class' => 'form-control', 'id' => 'INV_Producto_PuntoReorden', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_NivelReposicion', 'Nivel de Reposición: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_NivelReposicion',$Producto->INV_Producto_NivelReposicion, array('class' => 'form-control', 'id' => 'INV_Producto_NivelReposicion', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_TipoCodigoBarras', 'Tipo Codigo de Barras:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_TipoCodigoBarras',$Producto->INV_Producto_TipoCodigoBarras, array('class' => 'form-control', 'id' => 'INV_Producto_TipoCodigoBarras', 'placeholder' => 'Tipo' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_ValorCodigoBarras', 'Valor Codigo de Barras:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_ValorCodigoBarras',$Producto->INV_Producto_ValorCodigoBarras, array('class' => 'form-control', 'id' => 'INV_Producto_ValorCodigoBarras', 'placeholder' => 'Valor' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_ValorDescuento', 'Valor de Descuento:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_ValorDescuento',$Producto->INV_Producto_ValorDescuento, array('class' => 'form-control', 'id' => 'INV_Producto_ValorDescuento', 'placeholder' => '#.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PorcentajeDescuento', 'Porcentaje de Descuento:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PorcentajeDescuento',$Producto->INV_Producto_PorcentajeDescuento, array('class' => 'form-control', 'id' => 'INV_Producto_PorcentajeDescuento', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Producto_Activo', '1', $Producto->INV_Producto_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_ID', 'Categoria ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_ID', $combobox,$Producto->INV_Producto_Categoria_ID, array('class' => 'form-control', 'id' => 'INV_Categoria_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_IDCategoriaPadre', 'Categoria Padre ID:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_IDCategoriaPadre', $combobox, $Producto->INV_Producto_IDCategoriaPadre, array('class' => 'form-control', 'id' => 'INV_Categoria_IDCategoriaPadre', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_UnidadMedida_ID', 'Unidad de Medida ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_UnidadMedida_ID', $unidad,$Producto->INV_UnidadMedida_ID, array('class' => 'form-control', 'id' => 'INV_UnidadMedida_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_HorarioBloqueo_ID', 'Horario de Bloqueo ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_HorarioBloqueo_ID', $horarios,$Producto->INV_HorarioBloqueo_ID, array('class' => 'form-control', 'id' => 'INV_HorarioBloqueo_ID', 'placeholder' => '#' )) }}
      </div>
    </div>

    <div class="page-header clearfix">
      <h3 class="pull-left">Producto &gt; <small>Campos Locales</small></h3>
    </div>


      @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','INV_PRD%')->get() as $campo)
            <div class="campo-local-tipo form-group">
                {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
                @if ($campo->GEN_CampoLocal_Requerido)
                    <label>*</label>
                @endif
                <div class="col-md-5">
                    @if ($campo->GEN_CampoLocal_Tipo == 'TXT' || $campo->GEN_CampoLocal_Tipo == 'INT' || $campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        @if (DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->count() > 0 )
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->first()->INV_Producto_CampoLocal_Valor, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
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


    {{ Form::hidden('INV_Producto_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Inventario.Productos.show', 'Cancelar', $Producto->INV_Producto_ID, array('class' => 'btn')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop
