<div class="row"  id="buscarProducto">
	<div class="col-md-8 col-md-offset-2">

		<div class="btn-toolbar">
      <button class="btn ">Export</button>
    </div>
    
    <br>
		<div class="well">
			<table class="table" @submit="btneliminarPro($event)">
				<thead>
					<tr>
						<th>codigo</th>
						<th>Nombre</th>
						<th>precio</th>
						<th>stock</th>
						<th>descripcion</th>
						<th>Categoria</th>
            <td>accion</td>
						<th style="width: 36px;"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="p in producto">
						<td>{{p.codigo}}</td>
						<td>{{p.nombre}}</td>
						<td>{{p.precio}}</td>
						<td>{{p.stock}}</td>
						<td>{{p.descripcion}}</td>
						<td>{{p.categoria}}</td>
						<td><input type="submit" @click="abrirModalEditar($event,p.codigo,p.nombre,p.precio,p.stock,p.descripcion,p.categoria)" data-toggle="modal" data-target="#conEditar"  class="btn btn-xs " value="editar"></input></td>
						<td><input type="submit" @click="abrirModalEliminar($event,p.codigo)" data-toggle="modal" data-target="#conEliminar"  class="btn btn-xs btn-danger" value="eliminar"></input></td>
						
					</tr>
				</tbody>
			</table>
		</div>
<!-- ======================================== modal eliminar ===============================   -->
		<div class="modal fade" id="conEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">¿ Esta seguro que quiere eliminar? :o</h3>
        <button type="button-modal " class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-footer">
        <button type="submit" @click="btneliminarPro($event)" id="modalEliminar" class="btn-eliminarModal btn " producto="" >Eliminar</button>
        <button type="button"  data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- ======================================== fin  modal eliminar ===============================   -->
<!-- ======================================== modal Editar ===============================   -->

	<div class="modal fade" id="conEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><th>Actualizar Producto</th></h3>
        <button type="button-modal " class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			<div class="modal-body">
			<div class="row"  >
	<div class="container" id="editarProducto">
		<div class="col-md-5">
			<div class="form-area">
				<form method="post" @submit="editProducto($event)" role="form">
					<br style="clear:both">
				
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
								<option ></option>
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

						<input type="submit" class="btn btn-primary pull-right" value="agregar"></input>
				</form>
				</div>
			</div>
		</div>
	</div>

      </div>
     
      <div class="modal-footer">
        <button type="submit" @click="btneliminarPro($event)" id="modalEditar" class="btn-editarModal btn " producto="" >Actualizar</button>
        <button type="button"  data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- ======================================== fin  modal editar ===============================   -->	