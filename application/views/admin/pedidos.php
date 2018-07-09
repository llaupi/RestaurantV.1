<div class="row" id="mostrarPedidos">
	<div class="container well">
		<div class="col-md-8">
<div id="accordion" >
	<div class="card-body" >
		<div class="card-header" id="headingone">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
					pedido mesa <b>N°{{pedidos.idMesa}}</b>
				</button>
			</h5>
		</div>
		<div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#accordion">
			<div class="card-body">
      <table class="table table-bordered">
				<thead class="">
					<tr>
						<td>mesa</td>
						<td>N° orden</td>
						<td style="width:200px;">Producto</td>
						<td>precio</td>
					</tr>
				</thead>
				<tbody  v-for="p in pedidos">
					<tr >
						<td >{{p.idMesa}}</td>
						<td>{{p.idorden}}</td>
						<td>{{p.nombre}}</td>
            <td>{{p.precio}}</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>

		</div>
	</div>
</div>

