<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>pymeSolutions</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <style>
  	table form { margin-bottom: 0; }
  	form ul { margin-left: 0; list-style: none; }
  	.error { color: red; font-style: italic; }
  </style>
</head>
<body>
  <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> <img src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-5/32/navigate-right-icon.png"> PymeSolutions</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="#Ventas">VENTAS</a></li>
            <li><a href="#Compras">COMPRAS</a></li>
            <li><a href="#Inventario">INVENTARIO</a></li>
            <li><a href="#Contabilidad">CONTABILIDAD</a></li>
            <li><a href="#Seguridad">SEGURIDAD</a></li>
            <li><a href="#Configuracion">CONFIGURACION</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">user@domain.com <img img="" src="http://icons.iconarchive.com/icons/custom-icon-design/mono-business/24/user-icon.png"></a></li>
            <li></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

  <div class="container">
    @if (Session::has('message'))
		<div class="flash alert">
			<p>{{ Session::get('message') }}</p>
		</div>
	@endif
	@yield('main')
  </div>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>