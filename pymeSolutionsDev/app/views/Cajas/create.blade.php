@extends('layouts.scaffold')

@section('main')

<h1>Create Caja</h1>
<form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="Codigo" class="col-md-2 control-label">Codigo:</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="Codigo" placeholder="PRO-00001">
              </div>
          </div>

         <div class="form-group">
            <label for="Nombre" class="col-md-2 control-label">Nombre:</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre">
              </div>
         </div> 

          <div class="form-group">
            <label for="Tipo" class="col-md-2 control-label">Tipo:</label>
              <div class="col-md-5">
                <select class="form-control input-md">
                  <option value="">Numerico</option>
                  <option value="">Decimal</option>
                  <option value="">Texto</option>
                </select>
              </div>
         </div> 

         <div class="form-group">
            <label for="ValoresPredefinidos" class="col-md-4 control-label">ValoresPredefinidos:</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="ValoresPredefinidos" placeholder="ValoresPredefinidos">
              </div>
              <div class="col-md-1">
                <button type="submit" class="btn btn-default">Agregar</button>
              </div>
         </div>
        </form>        
{{ Form::open(array('route' => 'Cajas.store')) }}
    <div class="form-group">
        {{ Form::label('VEN_Caja_Codigo', 'Código:') }}
        <div class="col-md-4">
            {{ Form::text('VEN_Caja_Codigo') }}
        </div>
    </div>

        <li>
            {{ Form::label('VEN_Caja_Numero', 'Número de Caja:') }}
            {{ Form::text('VEN_Caja_Numero') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_Estado', 'Estado de Caja:') }}
            {{ Form::text('VEN_Caja_Estado') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_SaldoInicial', 'Saldo Inicial:') }}
            {{ Form::text('VEN_Caja_SaldoInicial') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


