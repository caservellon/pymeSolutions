<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>pymeSolutions</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
</head>
<body style="margin-top: 50px">
	
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
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contabilidad <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Crear Asientos de Ajuste</a></li>
	            <li><a href="#">Estado de Resultados</a></li>
	            <li><a href="#">Balande General</a></li>
	            <li><a href="#">Libro Diario</a></li>
	            <li><a href="#">ROI</a></li>
	            <li><a href="#">Punto de Equilibrio</a></li>
	            <li><a href="#">Flujo de Caja</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Configuración</a></li>
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

		<p class="navbar-text navbar-right" style="margin-right: 1em;">Signed in as <a href="#" class="navbar-link">Jorge Caballero</a></p>
	</nav>

	<div class="container col-md-8 col-md-offset-2">
		@yield('main')
	</div>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>