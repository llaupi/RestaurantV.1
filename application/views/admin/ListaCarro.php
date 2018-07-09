<div class="container" id="listaCarro">
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
					<tr v-for="c in head.carrito.productos">
						<td>{{c.nombre}}</td>
						<td>{{c.descripcion}}</td>
            <td>{{c.precio}}</td>
						<td>
							<input type="button" @click="eliminardelcarro($event,c.codigo,c.precio)" class="btn-eliminar btn btn-xs" value="eliminar">
						</td>
          </tr>
				</tbody>
      </table>
      <p class="text-right">total a pagar: <b>${{head.carrito.total}}</b></p>
      <input type="button" value="pedir orden" class="btn-agregar btn  pull-right">

		</div>
	</div>
</div>
