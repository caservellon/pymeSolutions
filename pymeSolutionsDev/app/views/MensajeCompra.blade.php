@extends('layouts.scaffold')

@section('main')


<div style='text-align: center; margin-top: 25%'>
    <div class='row'>
        <div class="col-md-12">
            <h3 class="is-hidden">
                {{ $mensaje}}
            </h3>
        </div>
    </div>
    <div class='row'>
        <div class="col-md-12">
            <a href="{{{ $ruta }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok btn-sm"></span></a>
        </div>  
    </div>
</div>




@stop
