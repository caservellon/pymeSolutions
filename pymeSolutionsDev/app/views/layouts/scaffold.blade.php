<!doctype html>
<<<<<<< HEAD
<html>
	<head>
		<meta charset="utf-8">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
	</head>

	<body>

		<div class="container">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>

	</body>

=======
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>pymeSolutions</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/general.css">
  <link rel="stylesheet" href="<?php public_path(); ?>/bootstrap/css/bootstrap.min.css">

  <script src="<?php public_path(); ?>/bootstrap/js/jquery-2.0.2.min.js"></script>
  <script src="<?php public_path(); ?>/bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 50px">
  <header>
  <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <a class="navbar-brand" href="#">pymeERP</a>

    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ventas <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Gestión de Ventas</a></li>
              <li><a href="#">Gestión de Caja</a></li>
              <li><a href="#">Devoluciones</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
            </ul>
          </li>

      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Compras <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Solicitudes de Cotización</a></li>
              <li><a href="#">Cotizaciones</a></li>
              <li><a href="#">Ordenes de Compras</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
            </ul>
          </li>

      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventario <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Inventario</a></li>
              <li><a href="#">Categorias</a></li>
              <li><a href="#">Atributos</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="contabilidad" class="dropdown-toggle" data-toggle="dropdown">Contabilidad <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Crear Asientos de Ajuste</a></li>
              <li><a href="#">Estado de Resultados</a></li>
              <li><a href="#">Balande General</a></li>
              <li><a href="{{URL::to('contabilidad/librodiario')}}">Libro Diario</a></li>
              <li><a href="#">ROI</a></li>
              <li><a href="#">Punto de Equilibrio</a></li>
              <li><a href="#">Flujo de Caja</a></li>
              <li class="divider"></li>
              <li><a href="{{ URL::to('contabilidad/configuracion/') }}">Configuración</a></li>
            </ul>
          </li>

      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRM <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Clientes</a></li>
              <li><a href="#">Empresariales</a></li>
              <li><a href="#">Proveedores</a></li>
              <li><a href="#">Campañas</a></li>
              <li><a href="#">Documentos</a></li>
              <li><a href="#">Oportunidades de Negocios</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seguridad <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Usuarios</a></li>
              <li><a href="#">Roles</a></li>
              <li><a href="#">Logs</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
            </ul>
          </li>

    </ul>

    <p class="navbar-text navbar-right" style="margin-right: 1em;">Signed in as <a href="#" class="navbar-link">Admin</a></p>
  </nav>
  </header>
  <div class="container col-md-8 col-md-offset-2">
    @yield('main')
  </div>
  <!--script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
</body>
>>>>>>> origin
</html>