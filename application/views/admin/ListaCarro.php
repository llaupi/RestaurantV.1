<div class="container"id="listaCarro" >
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>nombre</td>
              <td>Descripcion</td>
              <td>precio:</td>
            </tr>
          </thead>
          <tbody >
            <tr v-for="c in head.carrito.productos">
              <td>{{c.nombre}}</td>
              <td>{{c.descripcion}}</td>
              <td>{{c.precio}}</td>
            </tr>
          </tbody>
        </table>
        
    </div>
  </div>
</div>