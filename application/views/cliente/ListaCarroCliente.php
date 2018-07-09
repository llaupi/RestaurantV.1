<div class="container" id="listaCarroCliente">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>nombre</td>
						<td>Descripcion</td>
						<td style="width:200px;">precio:</td>
						<td>Accion</td>
					</tr>
				</thead>
				<tbody>

					<tr v-for="c in headCliente.carrito.productos">
						<td>{{c.nombre}}</td>
						<td>{{c.descripcion}}</td>
						<td>{{c.precio}}</td>

						<td>
							<input type="button" @click="eliminardelcarroCiente($event,c.codigo,c.precio)" class="btn-eliminar btn btn-xs" value="eliminar">
						</td>
					</tr>
				</tbody>
			</table>
			<div class="col-md-4 col-xs-offset-8">
			<p class="text-right">total a pagar:
				<b>${{headCliente.carrito.total}}</b>
			
				<p><b>N° mesa</b> </p>
				<div class="form-group">
					<input type="number" class="form-control" id="numeroMesa" name="numeroMesa" required>
				</div>
				
			</p>
			<input type="submit" @click="enviarOrden($event)" value="pedir orden"  class="btn-agregar btn  pull-right">

			
				
			</div>


			
		</div>
	</div>


	
			</div>
