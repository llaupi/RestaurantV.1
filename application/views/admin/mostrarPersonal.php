<div class="row" id="inicioAdmin">
	<div class="col-md-8 col-md-offset-2">

		<div class="btn-toolbar">
			<button class="btn">Import</button>
			<button class="btn">Export</button>
		</div>
		<br>
		<div class="well">
			<table class="table" @submit="btneliminarPe($event)">
				<thead>
					<tr>
						<th>rut</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th style="width: 236px;">tipo</th>
						<th>editar</th>
						<th>eliminar</th>
						<th style="width: 36px;"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="p in arreglo">
						<td>{{p.rut}}</td>
						<td>{{p.nombre}}</td>
						<td>{{p.apellido}}</td>
						<td>{{p.correo}}</td>
						<td>{{tipo[p.tipo]}}</td>
						<td>
							<input type="submit" @click="modalEditarpe($event,p.rut,p.nombre,p.apellido,p.correo,p.telefono,p.tipo)" data-toggle="modal"
								data-target="#conEditarPe" class="btn-editar btn btn-xs" value="editar"></input>
						</td>
						<td>
							<input type="submit" @click="modalEliminarPe($event,p.rut)" data-toggle="modal"
								data-target="#conEliminarPer" class="btn-eliminar btn btn-xs" value="eliminar"></input>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- ======================================== modal eliminar =============================== -->
<div class="modal fade" id="conEliminarPer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">¿ Esta seguro que quiere eliminar? :o</h3>
				<button type="button-modal " class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-footer">
				<button type="submit" @click="btneliminarPe($event)" id="modalEliminarPer" class="btn-eliminar btn " rut="">Eliminar</button>
				<button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<!-- ======================================== fin  modal eliminar ===============================   -->
<!-- ======================================== modal Editar ===============================   -->

	<div class="modal fade" id="conEditarPe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><th>Actualizar Personal</th></h3>
        <button type="button-modal " class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			<div class="modal-body" >
			<div class="row"  >
	<div class="container" >
		<div class="col-md-5">
			<div class="form-area">
				<form method="post"  role="form" id="editarpersonal">
					<br style="clear:both">
					<div class="form-group">
						<input type="text" class="form-control" readonly id="rutEditPersonal" name="rutEditPersonal" placeholder="correo" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="nombreEditPersonal" name="nombreEditPersonal"  required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="apellidoEditPersonal" name="apellidoEditPersonal"  required>
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" id="correoEditPersonal" name="correoEditPersonal"  required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="telefonoEditPersonal" name="telefonoEditPersonal"  required>
					</div>
					<div class="dropdown">
						<div class="form-group">
							<label for="sel1">Personal</label>
							<select class="form-control" name="tipoEditPersonal" id="tipoEditPersonal">
								<option value="0">administrador</option>
								<option value="1">Vendedor</option>
							</select>
            </div>
					
				</form>
				</div>
			</div>
		</div>
	</div>

      </div>
     
      <div class="modal-footer">
        <button type="submit" @click="btneditarpersonal($event)" id="modalEditar" producto="" class="btn-editarModal btn " producto="" >Actualizar</button>
        <button type="button"  data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- ======================================== fin  modal editar ===============================   -->	
</div>
