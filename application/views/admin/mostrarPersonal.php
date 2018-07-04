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
						<th>tipo</th>
						<td>accion</td>
						<th style="width: 36px;"></th>
					</tr>
				</thead>
				<tbody  >
					<tr v-for="p in arreglo">
						<td>{{p.rut}}</td>
						<td>{{p.nombre}}</td>
						<td>{{p.apellido}}</td>
						<td>{{p.correo}}</td>
						<td>{{tipo[p.tipo]}}</td>
						<td>
							<input type="submit" @click="btneliminarPe($event,p.rut)" class="btn btn-xs" value="eliminar"></input>
						</td>

					</tr>
				</tbody>
			</table>
		</div>
