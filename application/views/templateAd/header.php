<!DOCTYPE html>

<html lang="en">
<?php
 $user = $this->session->userdata("administrador");
?>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>NiceDay</title>

		<!-- Bootstrap -->
		<link href="<?php base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php base_url();?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="<?php base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
		crossorigin="anonymous">
		<link href="<?php base_url();?>assets/fontawesome-free-5-0.13" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<nav class="navbar   navbar-fixed-top" id="head">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header" id="navAdm">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php base_url()?>inicioAdmin">NiceDay</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php base_url()?>moduloAddProducto">ingresar</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="<?php base_url();?>moduloAddGetProducto">Productos</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php base_url()?>redirectRegistrar">Registrar</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="<?php base_url();?>moduloPersonal">personal</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" @submit="mostrarMensaje($event)">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="que buscas?">
						</div>
						<button type="submit"  class="btn btn-default">buscar</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?php echo "sñor(a) ", $user[0]->apellido;?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php base_url()?>redirectRegistrar">Registrar</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="<?php base_url();?>moduloPersonal">personal</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="<?php base_url();?>modulocategoria">Categoria</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carro
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li v-for="p in carrito.productos">
									<a href="#">{{p.nombre}}</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="#">total: ${{carrito.total}}</a>
								</li>
								<li role="separator" class="divider"></li>
								<li class="btnpagarcontainer"><button onclick="window.location='./modulolistaCarro'" class="btnpagar btn center">pagar</button></li>
								
							</ul>
						</li>
						<li>
							<a href="<?php base_url();?>logout">Salir</a>
						</li>

					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</head>

	<body>
		<main>
