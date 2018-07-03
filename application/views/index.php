<!--<div class="my-content" id="iniciarSesion">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1> Inicia Sesion</h1>
				<div class="mydescription">
					<p>bienvenido</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 myform-cont">
				<div class="myform-top">
					<div class="myform-top-left">
						<p></p>
					</div>
				</div>
				<div class="myform-bottom">
					<form action="" @submit="iniciarSesion($event)" method="post" role="form" class="">
						<div class="form-group">
							<input type="text" name="rutLogin" placeholder="rut..." class="form-control" id="rutLogin">
						</div>
						<div class="form-group">
							<input type="password" name="claveLogin" placeholder="clave..." class="form-control" id="claveLogin">
						</div>
						<input type="submit" class="btn btn-primary" value="ingresar" >

					</form>
				</div>
			</div>
		</div>
	</div>
</div>  
-->
<div class="container" id="iniciarSesion">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<h3 class="text-center">iniciar Sesion</h3>
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							
							<form @submit="iniciarSesion($event)" method="post" role="form" style="display: block;">
								<div class="form-group">
									<input type="text" name="rutLogin" id="rutLogin" tabindex="1" class="form-control" placeholder="Rut...." value="">
								</div>
								<div class="form-group">
									<input type="password" name="claveLogin" id="claveLogin" tabindex="2" class="form-control" placeholder="Contraseña">
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input id="login-submit" name="login-submit" type="submit" class="form-control btn btn-login" value="Iniciar sesión">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12">
											<div class="text-center">
												<a href="#" tabindex="5" class="forgot-password">¿Has olvidado tu contraseña?</a>
											</div>
										</div>
									</div>
								</div>
							</form>
