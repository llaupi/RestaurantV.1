<div class="row" id="mostrarPedidos">
	<div class="container ">
		<div class="col-md-8">
<div id="accordion" >
	<div class="card-body well" v-for="p in pedidos" v-if="p.productos.length > 0" >
		<div class="card-header" id="headingone">
			<h5 class="mb-0">
				<button class="btn  collapsed" data-toggle="collapse" :data-target="'#collapseone'+p.datos.idorden" aria-expanded="false" aria-controls="collapseone">
					orden {{p.datos.idorden}} 
				</button>
			</h5>
		</div>
		<div :id="'collapseone'+p.datos.idorden" class="collapse" aria-labelledby="headingone" data-parent="#accordion">
			<div class="card-body">
			<p>total: <b>$</b>{{p.datos.precio}}</p>
			<p> mesa: {{p.datos.idMesa}}</p>
      <table class="table table-bordered">
				<thead class="">
					<tr>
						<td>codigo</td>
						<td>nombre</td>
						<td>precio</td>
						
					</tr>
				</thead>
				<tbody  >
					<tr v-for="productos in p.productos">
					<td>{{productos.codigo}}</td>
					<td>{{productos.nombre}}</td>
					<td>{{productos.precio}}</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>

		</div>
	</div>
</div>

