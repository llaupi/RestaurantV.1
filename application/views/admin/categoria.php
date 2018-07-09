<div class="container container-fluid" id="Categoriaform">
<div class="modal fade" id="conEditarCate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">
					<th>Actualizar categoria</th>
				</h3>
				<button type="button-modal " class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="container">
						<div class="col-md-5">
							<div class="form-area">
								<form method="post" role="form" id="editarCategoria">
									<br style="clear:both">

									<div class="form-group">
										<input type="text" class="form-control" id="nombrecategoria" name="nombrecategoria" required>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="modal-footer">
				<button type="submit" @click="btneditarcate()"  id="modalEditar" producto="" class="btn-editar btn " categoria="">Actualizar</button>
				<button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
			</div>
		</div>
	</div>
</div>
	<div class="row">
		<div class="col-md-4 well">
			<h3 class="text-center">
				<b> ingresar Categoria</b>
			</h3>
			<br>
			<form method="post" @submit="agregarCategoria($event)">
				<label for="categoriaadd">Nombre</label>
				<div class="form-group">
					<input type="text" name="nameCateAdd" class="form-control" id="categoriaadd">
				</div>
				<input type="submit" class="btn-agregar btn pull-right" value="agregar">
			</form>
		</div>
		<div class="col-md-8">
			<div class=" container">
				<div class="row col-md-6 col-md-offset-2 custyle">
					<table class="table table-striped custab">
						<thead>

							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>Accion</th>
								<th>Accion</th>
							</tr>
						</thead>

						<tr v-for="c in categoria">
							<td>{{c.id}}</td>
							<td>{{c.nombre}}</td>
							<td>
								<input type="button" @click="abrirModalEditarCat($event,c.id,c.nombre)" class=" btn-editar btn btn-xs" data-toggle="modal"
								data-target="#conEditarCate" value="editar">
							</td>
							<td>
								<input type="button" @click="abrirModalEliminarcat($event,c.id)" class="btn-eliminar btn btn-xs btn-rounded" data-toggle="modal"
								data-target="#conEliminarCat" value="eliminar">
							</td>
						</tr>

					</table>
				</div>
			</div>
		</div>
	</div>
	
<!-- ======================================== modal eliminar =============================== -->
<div class="modal fade" id="conEliminarCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">¿ Esta seguro que quiere eliminar? :o</h3>
				<button type="button-modal " class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-footer">
				<button type="submit" @click="modalEliminarCat($event)" id="modalEliminarcat1" class="btn-eliminar btn " categoria="">Eliminar</button>
				<button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<!-- ======================================== fin  modal eliminar ===============================   -->
</div>



<!-- ======================================== modal Editar ===============================   -->
<div class="modal fade" id="conEditarCate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">
					<th>Actualizar categoria</th>
				</h3>
				<button type="button-modal " class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="container">
						<div class="col-md-5">
							<div class="form-area">
								<form method="post" role="form" id="editarCategoria">
									<br style="clear:both">

									<div class="form-group">
										<input type="text" class="form-control" id="nombrecategoria" name="nombrecategoria" required>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>

			</div>

<!-- ======================================== fin  modal editar ===============================   -->
