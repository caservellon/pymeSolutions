
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>PymeSolutions</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <?php //HTML::style('justified-nav.css'); ?>
    <link rel="stylesheet" href="//getbootstrap.com/examples/justified-nav/justified-nav.css">
    <link rel="stylesheet" href="//getbootstrap.com/assets/css/docs.min.css">
    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container" >

      <div class="masthead">
        <h3 class="text-muted">PymeSolutions</h3>
        <ul class="nav nav-justified">
          <li><a href="#">Home</a></li>
          <li><a href="#" >Compras</a></li>
          <li><a href="#">Inventario</a></li>
          <li><a href="#">Ventas</a></li>
          <li class="active"><a href="#">Contabilidad</a></li>
          <li><a href="#">Seguridad</a></li>
          <li><a href="#">Configuracion</a></li>
        </ul>
        
      </div>
        
      <br>
      
        <!-- Content... -->
        @yield('main')

      <!-- Site footer -->
      <div class="footer">
        <div class="container">
          <p class="text-muted">&copy; All Rights Reserved 2014</p>
        </div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
  </body>
</html>
