<div class="row">
	<div class="container-fluid" id="registrarPersonal">
		<form method="post" @submit="registrarPersonal($event)">
			<div class="col-md-4">
				<div class="form-group">
					<label for="rutRe">rut</label>
					<input type="text" class="form-control" name="rutRe" id="rutRe" placeholder="rut">
				</div>
				<div class="form-group">
					<label for="nombreRe">nombre</label>
					<input type="text" class="form-control" name="nombreRe" id="nombreRe" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="apellidoRe">apellido</label>
					<input type="text" class="form-control" name="apellidoRe" id="apellidoRe" placeholder="apellido">
				</div>
				<div class="form-group">
					<label for="emailRe">email</label>
					<input type="mail" class="form-control" name="emailRe" id="emailRe" placeholder="email">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="claveRe">clave</label>
					<input type="password" class="form-control" name="claveRe" id="claveRe" placeholder="clave">
				</div>
				<div class="form-group">
					<label for="confirmarClaveRe">confirmar Clave</label>
					<input type="password" class="form-control" name="confirmarClaveRe" id="confirmarClaveRe" placeholder="clave">
				</div>
				<div class="form-group">
					<label for="telefonoRe">telefono</label>
					<input type="number" class="form-control" name="telefonoRe" id="telefonoRe" placeholder="telefono">
				</div>
				<div class="dropdown">
					<div class="form-group">
						<label for="sel1">Tipo</label>
						<select class="form-control" name="comboRegistrar">
							<option value="0">administrador</option>
							<option value="1">vendedor</option>
							<option value="2">cocinero</option>

						</select>
					</div>
					<input type="submit" value="registrar" class="btn btn-success">
					</button>
				</div>
		</form>

		</div>
	</div>
