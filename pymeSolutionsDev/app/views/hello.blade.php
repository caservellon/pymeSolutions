@extends('layouts.scaffold')

@section('main')

<!doctype html>
<?php $empresa = Seguridad::Compania(); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			padding-top: 275px;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
</head>
<body>
	<div class="welcome">
		<img src="{{$empresa->SEG_Config_Imagen}}"></img>
		<h1>{{$empresa->SEG_Config_NombreEmpresa}}</h1> 
		
	</div>
</body>
</html>

@stop
