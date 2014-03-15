@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Producto &gt; <small>Nuevo Producto</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Productos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>



{{ Form::open(array('route' => 'Inventario.Productos.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('INV_Producto_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Producto_Codigo', null, array('class' => 'form-control', 'id' => 'INV_Producto_Codigo', 'placeholder'=>'PRO-00001')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Producto_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Producto_Nombre', null, array('class' => 'form-control', 'id' => 'INV_Producto_Nombre', 'placeholder'=>'name')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Producto_Descripcion', 'Descripción: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Producto_Descripcion', null, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Producto_Descripcion', 'placeholder'=>'Descripcion')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PrecioVenta', 'Precio de Venta: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PrecioVenta',null, array('class' => 'form-control', 'id' => 'INV_Producto_PrecioVenta', 'placeholder' => '#.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_MargenGanancia', 'Margen de Ganancia: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_MargenGanancia',null, array('class' => 'form-control', 'id' => 'INV_Producto_MargenGanancia', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PrecioCosto', 'Precio de Costo: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PrecioCosto',null, array('class' => 'form-control', 'id' => 'INV_Producto_PrecioCosto', 'placeholder' => '#.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Cantidad', 'Cantidad:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Cantidad',null, array('class' => 'form-control', 'id' => 'INV_Producto_Cantidad', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Impuesto1', 'Impuesto 1:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Impuesto1',null, array('class' => 'form-control', 'id' => 'INV_Producto_Impuesto1', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Impuesto2', 'Impuesto 2:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Impuesto2',null, array('class' => 'form-control', 'id' => 'INV_Producto_Impuesto2', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_RutaImagen', 'Ruta de Imagen:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_RutaImagen',null, array('class' => 'form-control', 'id' => 'INV_Producto_RutaImagen', 'placeholder' => 'Dir' )) }}
      </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Producto_Comentarios', 'Comentarios:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Producto_Comentarios', null, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Producto_Comentarios', 'placeholder'=>'Comentario')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PuntoReorden', 'Punto de Reorden: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PuntoReorden',null, array('class' => 'form-control', 'id' => 'INV_Producto_PuntoReorden', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_NivelReposicion', 'Nivel de Reposición: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_NivelReposicion',null, array('class' => 'form-control', 'id' => 'INV_Producto_NivelReposicion', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_TipoCodigoBarras', 'Tipo Codigo de Barras:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_TipoCodigoBarras',null, array('class' => 'form-control', 'id' => 'INV_Producto_TipoCodigoBarras', 'placeholder' => 'Tipo' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_ValorCodigoBarras', 'Valor Codigo de Barras:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_ValorCodigoBarras',null, array('class' => 'form-control', 'id' => 'INV_Producto_ValorCodigoBarras', 'placeholder' => 'Valor' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_ValorDescuento', 'Valor de Descuento:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_ValorDescuento',null, array('class' => 'form-control', 'id' => 'INV_Producto_ValorDescuento', 'placeholder' => '#.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_PorcentajeDescuento', 'Porcentaje de Descuento:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_PorcentajeDescuento',null, array('class' => 'form-control', 'id' => 'INV_Producto_PorcentajeDescuento', 'placeholder' => '0.#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Producto_Activo', '1', '1', array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_IDCategoriaPadre', 'Categoria Padre ID:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_IDCategoriaPadre', $combobox, null, array('class' => 'form-control', 'id' => 'INV_Categoria_IDCategoriaPadre', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_ID', 'Categoria ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_ID', array(), null, array('class' => 'form-control', 'id' => 'INV_Categoria_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_UnidadMedida_ID', 'Unidad de Medida ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_UnidadMedida_ID', $unidad, null, array('class' => 'form-control', 'id' => 'INV_UnidadMedida_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_HorarioBloqueo_ID', 'Horario de Bloqueo ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_HorarioBloqueo_ID', $horarios,null, array('class' => 'form-control', 'id' => 'INV_HorarioBloqueo_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    
    {{ Form::hidden('INV_Producto_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Producto_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}

<script type="text/javascript">
//  $(function() {
    var padres = JSON.parse('{{$jpadres}}');
    var hijos = JSON.parse('{{$jhijos}}');

    $('#INV_Categoria_IDCategoriaPadre').on('change', function() {
      var el = $(this);
      var i = el.val();

      var f = $.map(hijos, function(index, hijo) {
        var r = null;
        if (index == i) {
          r = {name: hijo, i: index};
        }

        return r;
      });

      $('#INV_Categoria_ID').empty();
      $.each(f, function(i, hijo) {
        $('#INV_Categoria_ID').append($('<option>', {
          value: hijo.i,
          text: hijo.name
        }));  
      });
      

    });
//  });
</script>

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


