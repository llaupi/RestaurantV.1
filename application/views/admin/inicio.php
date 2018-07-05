<div id="myCarousel" class="carousel slide" data-interval="false">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php base_url();?>assets/imagenes/bannernice.png" style="width:100%" class="img-responsive">
      
    </div>
    <div class="item">
      <img src="<?php base_url();?>assets/imagenes/banner1.png" class="img-responsive">
      <div class="container">
        
      </div>
    </div>
    <div class="item">
      <img src="https://images.pexels.com/photos/763771/pexels-photo-763771.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" class="img-responsive">
      
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>

<h1 class="text-center"> Menu de Comida</h1>

<div class="container" id="imgProductos">
	<div class="row">
		<div class="col-md-4" v-for="p in producto">
			<div class="img-thumbnail text-center"  >
        <img :src="p.imagen" class="llaupi" > 
      <p>{{p.nombre}} ({{p.Descripcion}})</p>
      <p>{{p.precio}}</p>
        <input type="button" @click="head.agregarCarrito(p.codigo,p.nombre,p.precio,p.Descripcion)" value="agregar" id="btnCarro" class="btn btn-ld ">
      </div>

		</div>

	</div>
</div>
