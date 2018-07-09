function mensaje(text, tiempo) {
	var largo = document.querySelectorAll(".mensaje p").length;
	if (largo == 0) {
		var div = document.createElement("div");
		div.classList.add("mensaje");
		var p = document.createElement("p");
		p.innerText = text;
		div.appendChild(p);
		document.body.appendChild(div);
		setTimeout(function () {
			document.querySelectorAll(".mensaje p")[0].style.right = 0;
		}, 100)
		setTimeout(function () {
			document.querySelectorAll(".mensaje p")[0].style.right = "-100%";
		}, tiempo)
		setTimeout(function () {
			document.querySelectorAll(".mensaje p")[0].remove();
		}, tiempo + 500)
	}

}
var head = new Vue({
	el: "#head",
	data: {
		carrito: {
			total: 0,
			productos: []
		},
	},
	methods: {
		mostrarMensaje: function (e) {
			e.preventDefault();
			mensaje("esta es mi segundo intento", 3000);
		},
		agregarCarrito: function (codigo, nombre, precio, descripcion) {
			data = {
				codigo: codigo,
				nombre: nombre,
				precio: precio,
				descripcion: descripcion
			}
			this.carrito.total += parseInt(precio);
			this.carrito.productos.push(data);
			sessionStorage.setItem("carrito", JSON.stringify(this.carrito));

		}
	},
	mounted: function () {
		if (sessionStorage.getItem("carrito") != null) {
			this.carrito = JSON.parse(sessionStorage.getItem("carrito"));
		}
	}
});
var listaCarro = new Vue({
	el: "#listaCarro",
	methods: {
		eliminardelcarro: function (e, codigo, precio) {
			pos = 0;
			head.carrito.productos.forEach(p => {
				if (p.codigo == codigo) {
					head.carrito.productos.splice(pos, 1);
					head.carrito.total -= parseInt(precio);
				}
				pos++;
			});
			sessionStorage.setItem("carrito", JSON.stringify(head.carrito));
		}
	}
})

var index = new Vue({
	el: "#iniciarSesion",
	data: {
		url: "http://localhost/RestaurantV.1/"

	},
	methods: {

		iniciarSesion: function (e) {
			e.preventDefault();
			formulario = e.target;
			rut = formulario.rutLogin.value;
			clave = formulario.claveLogin.value;
			if (rut == "" || clave == "") {
				alert("complete los campos");
			} else {
				data = {
					rut: rut,
					clave: clave
				};
				this.$http.post(index.url + "login", data).then(function (r) {
					var result = r.body;
					switch (result.msg) {
						case "administrador":
							window.location = index.url + "inicioAdmin";

							break;
							case"cliente":
							window.location = index.url +"inicioCliente";
							break;
						case "error":
							mensaje("no existe el usuario", 3000);
							break;

						default:
							break;
					}
				})
			}

		}

	}
});

var inicioAdmin = new Vue({
	el: "#inicioAdmin",
	//mostrar datos de un arreglo a una pagina
	data: {
		arreglo: [],
		tipo: ["admin", "vendedor", "cliente"]
	},
	methods: {

		modalEliminarPe:function(e,rut){
			document.getElementById("modalEliminarPer").rut = rut;
		},
		btneliminarPe: function (e) {
			e.preventDefault();
			data = {
				rut: e.target.rut
			}
			this.$http.post(index.url + "deletePersonal", data).then(function (r) {
				var result = r.body;
				$('#conEliminarPer').modal('hide');
				mensaje(result.msg,2000);
				this.cargarPersonal();
			})

		},
		modalEditarpe:function(e,rut,nombre,apellido,correo,telefono,tipo){
			var form = document.getElementById("editarpersonal");
			form.rutEditPersonal.value = rut;
			form.nombreEditPersonal.value = nombre;
			form.apellidoEditPersonal.value = apellido;
			form.correoEditPersonal.value =correo;
			form.telefonoEditPersonal.value = telefono;
			form.tipoEditPersonal.value = tipo;
			
			
		},
		btneditarpersonal:function(e){
			e.preventDefault();
			var form = document.getElementById("editarpersonal");
			rut= form.rutEditPersonal.value;
			nombre = form.nombreEditPersonal.value;
			apellido = form.apellidoEditPersonal.value;
			correo = form.correoEditPersonal.value;
			telefono = form.telefonoEditPersonal.value;
			tipo = form.tipoEditPersonal.value;
			data={
				rut:rut,
				nombre:nombre,
				apellido:apellido,
				correo:correo,
				telefono:telefono,
				tipo:tipo
			}
			this.$http.post(index.url + "editarPersonal", data).then(function (r) {
				var result = r.body;
				$('#conEditarPe').modal('hide');
			
				mensaje(result.msg,2000);
			})
		},
		cargarPersonal: function () {
			this.$http.get(index.url + "personal").then(function (r) {
				var result = r.body;
				this.arreglo = result;
			})
		}
	},
	// cuando carga pagina pasa estas cosas
	// con get muestro
	mounted: function () {
		this.cargarPersonal();
	}



});


var registrarPerson = new Vue({
	el: "#registrarPersonal",

	methods: {
		registrarPersonal: function (e) {
			e.preventDefault();
			formulario = e.target;
			rut = formulario.rutRe.value;
			nombre = formulario.nombreRe.value;
			apellido = formulario.apellidoRe.value;
			email = formulario.emailRe.value;
			clave = formulario.claveRe.value;
			confirmarclave = formulario.confirmarClaveRe.value;
			telefono = formulario.telefonoRe.value;
			tipo = formulario.comboRegistrar.value;
			if (clave == confirmarclave) {
				if (rut == "" || nombre == "" || apellido == "" || email == "" || clave == "" || telefono == "") {

					mensaje("completalo, mala persona", 3000);
				} else {
					data = {
						rut: rut,
						nombre: nombre,
						apellido: apellido,
						email: email,
						clave: clave,
						telefono: telefono,
						tipo: tipo
					};
					this.$http.post(index.url + "registrarPersonal", data).then(function (r) {
						var result = r.body;
						console.log(result.msg);
						mensaje(result.msg, 2000);

					});
				}
			} else {
				mensaje("las contraseñas no coinciden", 3000);
			}


		}
	}
})
//cargar combo producto
var Productosadd = new Vue({
	el: "#agregarProducto",
	data: {
		categoria: [],
		imagenBase64: ""
	},
	methods: {
		addunProducto: function (e) {
			e.preventDefault();
			var form = e.target;
			nombre = form.nombreAddProducto.value;
			precio = form.precioAddProducto.value;
			stock = form.stockAddProducto.value;
			descripcion = form.descAddProducto.value;
			categoria = form.comboAddProducto.value;

			data = {
				nombre: nombre,
				precio: precio,
				stock: stock,
				descripcion: descripcion,
				categoria: categoria,
				imagen: this.imagenBase64,
			};
			this.$http.post(index.url + "agregarProducto", data).then(function (r) {
				var result = r.body;
				mensaje(result.msg, 2000);
				form.reset();

			})
		},
		cambiarImagen: function (input) {
			if (input.target.files && input.target.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					if (reader.result.search("image") != -1) {
						Productosadd.imagenBase64 = e.target.result;
					} else {
						mensaje("sube una foto guapo", 3000);
					}

				}
				reader.readAsDataURL(input.target.files[0]);
			}
		}
	},
	mounted: function () {
		this.$http.get(index.url + "getCategoria").then(function (r) {
			var result = r.body;
			this.categoria = result;
		});
	}

});

var buscarProducto = new Vue({

	el: "#buscarProducto",
	data: {
		producto: [],
		categoria: [],
		codigo: "",
		imagenBase64: ""
	},
	methods: {
		btneliminarPro: function (e) {
			e.preventDefault();
			data = {
				codigo: e.target.producto
			}
			this.$http.post(index.url + "deleteProduct", data).then(function (r) {
				var result = r.body;
				$('#conEliminar').modal('hide');
				this.cargarproductos();

			})
		},

		abrirModalEliminar: function (e, codigo) {
			document.getElementById("modalEliminar").producto = codigo;
		},
		abrirModalEditar: function (e, codigo, nombre, precio, stock, descripcion, categoria) {

			var form = document.getElementById("editarProducto");
			form.nombreupProducto.value = nombre;
			form.precioupProducto.value = precio;
			form.stockupProducto.value = stock;
			form.descupProducto.value = descripcion;
			var cate = document.getElementById("categoriaEditar");
			var array = [].slice.call([cate.children][0]);
			var p = array.indexOf(array.filter(opt => opt.text == categoria)[0]);
			cate.selectedIndex = p;
			this.codigo = codigo;
		},
		btneditarPro: function (e) {
			e.preventDefault();
			var formu = document.getElementById("editarProducto");

			nombre = formu.nombreupProducto.value;
			precio = formu.precioupProducto.value;
			stock = formu.stockupProducto.value;
			descripcion = formu.descupProducto.value;
			categoria = formu.comboupProducto.value;

			data = {
				codigo: this.codigo,
				nombre: nombre,
				precio: precio,
				stock: stock,
				descripcion: descripcion,
				categoria: categoria,
				imagen: this.imagenBase64
			}
			this.$http.post(index.url + "actualizarProducto", data).then(function (r) {
				var result = r.body;
				this.cargarproductos();
				mensaje(result.msg, 2000);
				$('#conEditar').modal('hide');
			})
		},
		cargarproductos: function () {
			this.$http.get(index.url + "unirCategoria").then(function (r) {
				var result = r.body;
				this.producto = result;



			});
		},
		cambiarImagen: function (input) {
			if (input.target.files && input.target.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					if (reader.result.search("image") != -1) {
						buscarProducto.imagenBase64 = e.target.result;
					} else {
						mensaje("sube una foto guapo", 3000);
					}

				}
				reader.readAsDataURL(input.target.files[0]);
			}
		},
		cargarCategoria: function () {
			this.$http.get(index.url + "getCategoria").then(function (r) {
				var result = r.body;
				this.categoria = result;
			});
		}
	},
	mounted: function () {
		this.cargarproductos();
		this.cargarCategoria();
	}
});



// cargar informacion del producto en la imagen de inicio
var productoimg = new Vue({

	el: "#imgProductos",
	data: {
		producto: []
	},
	methods: {
	
		cargarproductos: function () {
			this.$http.get(index.url + "getProducto").then(function (r) {
				var result = r.body;
				this.producto = result;


			});
		}
	},
	mounted: function () {
		this.cargarproductos();

	}
});

var mostrarCategoria = new Vue({
	el: "#Categoriaform",
	data: {
		categoria: [],
		id:""
	},
	methods: {
		agregarCategoria: function (e) {
			e.preventDefault();
			form = e.target;
			nombre = form.nameCateAdd.value;
			data = {
				nombre: nombre
			}
			this.$http.post(index.url + "addCategoria", data).then(function (r) {
				var result = r.body;
				form.reset;
				mensaje(result.msg, 3000);
				this.mostrarCategoria();
			})
		},
		mostrarCategoria: function () {
			this.$http.get(index.url + "getCategoria").then(function (r) {
				var result = r.body;
				this.categoria = result;

			})
		},
		abrirModalEliminarcat: function (e, id) {
			document.getElementById("modalEliminarcat1").categoria = id;
			
		},
		modalEliminarCat: function (e) {
			e.preventDefault();
			data = {
				id:e.target.categoria
			}
			
			this.$http.post(index.url + "deleteCategoria",data).then(function (r) {
				var result = r.body;
				mensaje(result.msg, 2000);
				$('#conEliminarCat').modal('hide');
				this.mostrarCategoria();
			
			})
		},
		abrirModalEditarCat:function(e,id,nombre){
		var form = document.getElementById("editarCategoria");
		form.nombrecategoria.value = nombre;
		this.id= id;
	},
	btneditarcate:function(){
		var form = document.getElementById("editarCategoria");
		nombre= form.nombrecategoria.value;
		data={
			nombre:nombre,
			id:this.id
		}
		
		this.$http.post(index.url+"updateCategoria",data).then(function(r){
		 var result = r.body;
		 mensaje(result.msg,2000);
		 $('#conEditarCate').modal('hide');
		 this.mostrarCategoria();
		 
		})
	}


	},
	mounted: function () {
		this.mostrarCategoria();
		
	},
})
	// funciones del Cliente
	
	var inicioClient = new Vue({
		el: "#imgProductosClientes",
		data: {
			producto: []
		},
		methods: {
		
			cargarproductos: function () {
				this.$http.get(index.url + "getProducto").then(function (r) {
					var result = r.body;
					this.producto = result;
	
	
				});
			}
		},
		mounted: function () {
			this.cargarproductos();
	
		}
	});
// funciones del navbar cliente
	var headCliente = new Vue({
		el: "#headCliente",
		data: {
			carrito: {
				total: 0,
				productos: [],
				cantidad:0
			},
		},
		methods: {
			mostrarMensaje: function (e) {
				e.preventDefault();
				mensaje("esta es mi segundo intento", 3000);
			},
			agregarCarritoCliente: function (codigo, nombre, precio, descripcion) {
				data = {
					codigo: codigo,
					nombre: nombre,
					precio: precio,
					descripcion: descripcion
				}
			
				this.carrito.total += parseInt(precio);
				this.carrito.productos.push(data);
				this.carrito.cantidad +=parseInt(this.cantidad++);
				sessionStorage.setItem("carritoCliente", JSON.stringify(this.carrito));
	
			}
		},
		mounted: function () {
			if (sessionStorage.getItem("carritoCliente") != null) {
				this.carrito = JSON.parse(sessionStorage.getItem("carritoCliente"));
				
			}
		}
	});
	// funciones del carrito de compras del navbar
	var listaCarroCliente = new Vue({
		el: "#listaCarroCliente",
		methods: {
			eliminardelcarroCiente: function (e,codigo,precio) {
				pos = 0;
				headCliente.carrito.productos.forEach(p => {
					if (p.codigo == codigo) {
						headCliente.carrito.productos.splice(pos, 1);
						headCliente.carrito.total -= parseInt(precio);
					}
					pos++;
				});
				sessionStorage.setItem("carritoCliente", JSON.stringify(headCliente.carrito));
			},
			enviarOrden:function(e){
				e.preventDefault();
				var mesa = document.getElementById("numeroMesa").value;
				data={
					idmesa:mesa,
					total:headCliente.carrito.total,
					cliente:"invitado",
					productos:headCliente.carrito.productos
				}
				
				this.$http.post(index.url+"addOrden",data).then(function(r){
					var result = r.body;
				//	mensaje(result.msg,2000);
					console.log(r);
				})
			}
		}
	})

	var mostrarPedido = new Vue({
		el:"#mostrarPedidos",
		data :{
			pedidos:[]
		},
		methods:{
				mostrarPedidos:function(e){
					$('.collapse').collapse()
					this.$http.get(index.url+"pedido").then(function(r){
						var result = r.body;
						this.pedidos = result;
						
						console.log(this.pedidos)
					})
				}
				
		},
		mounted:function(){
			this.mostrarPedidos();
		}
	});
	

