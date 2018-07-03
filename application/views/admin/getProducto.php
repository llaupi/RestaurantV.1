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
            <td>accion</td>
						<th style="width: 36px;"></th>
					</tr>
				</thead>
				<tbody v-for="p in producto">
					<tr>
						<td>{{p.codigo}}</td>
						<td>{{p.nombre}}</td>
						<td>{{p.precio}}</td>
            <td>{{p.stock}}</td>
            <td>{{p.idCategoria}}</td>
            <td><input type="submit" @click="btneliminarPro($event,p.codigo)" class="btn btn-xs btn-danger" value="eliminar"></input></td>
					</tr>
				</tbody>
			</table>
		</div>
	