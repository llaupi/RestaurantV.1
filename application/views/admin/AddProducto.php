<div class=" row"  >
	<div class=" container " id="agregarProducto">
		<div class="col-md-5">
			<div class="form-area">
				<form method="post" @submit="addunProducto($event)" role="form">
					<br style="clear:both">
					<h3 style="margin-bottom: 25px; text-align: center;">Ingresar Producto</h3>
					<div class="form-group">
						<input type="text" class="form-control" id="nombreAddProducto" name="nombreAddProducto" placeholder="nombre" required>
					</div>
					
					<div class="form-group">
						<input type="number" class="form-control" id="precioAddProducto" name="precioAddProducto" placeholder="precio:" required>
					</div>
					<div class="form-group">
						<input type="number_format" class="form-control" id="mobile" name="stockAddProducto" placeholder="Stock:" required>
					</div>
					<div class="dropdown">
						<div class="form-group">
							<label for="sel1">Categoria</label>
							<select class="form-control" name="comboAddProducto">
								<option v-for="c in categoria" :value="c.id">{{c.nombre}}</option>
							</select>
            </div>
						<div class="form-group">
							<textarea class="form-control" name="descAddProducto" type="textarea" id="descrAddProducto" placeholder="descripcion del producto"
							maxlength="140" rows="7"></textarea>
							<span class="help-block">
								<p id="characterLeft" class="help-block "></p>
							</span>
						</div>
						

						<input type="file" @change="cambiarImagen($event)" name="imagen">

						<input type="submit" class="btn-agregar btn pull-right" value="agregar"></input>
				</form>
				</div>
			</div>
		</div>
	</div>
