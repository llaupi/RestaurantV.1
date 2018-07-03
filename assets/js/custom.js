function mensaje(text,tiempo){
	var div = document.createElement("div");
	div.classList.add("mensaje");
	var p = document.createElement("p");
	p.innerText= text;
	div.appendChild(p);
	document.body.appendChild(div);
	setTimeout(function(){
		document.querySelectorAll(".mensaje p")[0].style.right=0;
	},100)
	setTimeout(function(){
		document.querySelectorAll(".mensaje p")[0].style.right="-100%";
	},tiempo)
	setTimeout(function(){
		document.querySelectorAll(".mensaje p")[0].remove();
	},tiempo+1000)
}
var head = new Vue({
	el: "#head",
	methods:{
		mostrarMensaje: function(e){
			e.preventDefault();
			mensaje("esta es mi segundo intento");
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
						case "error":
							alert("no existe ese usuario");
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
		tipo: ["admin", "vendedor", "cocinero", "cliente"]
	},
	methods: {
		btneliminarPe: function (e, rut) {
			e.preventDefault();

			data = {
				rut: rut
			}
			this.$http.post(index.url + "deletePersonal", data).then(function (r) {
				var result = r.body;
				alert(result.msg);
				this.cargarPersonal();
			})

			//	this.arreglo[0].nombre = "felipe";
			// this.arreglo.push({nombre:"marcos",apellido:"caiman",tipo:2});
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
				
					mensaje("completalo, mala persona",3000);
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
						alert(result.msg);

					});
				}
			} else {
				alert("la confirmacion de la clave no es correcta");
			}


		}
	}
})
//cargar combo producto
var Productosadd = new Vue({
	el: "#agregarProducto",
	data: {
		categoria: [],
		imagenBase64:""
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
				$.notify(result);
				form.reset();

			})
		},
		cambiarImagen : function(input){
			if (input.target.files && input.target.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
				
					Productosadd.imagenBase64 = e.target.result;
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
		producto: []
	},
	methods: {
		btneliminarPro: function (e, codigo) {
			e.preventDefault();
			data = {
				codigo: codigo
			}
			this.$http.post(index.url + "deleteProduct", data).then(function (r) {
				var result = r.body;
				this.cargarproductos();
			
			})
	},
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



// cargar informacion del producto en la imagen de inicio
var productoimg = new Vue({

	el: "#imgProductos",
	data: {
		producto: []
	},
	methods: {
		btneliminarPro: function (e, codigo) {
			e.preventDefault();
			data = {
				codigo: codigo
			}
			this.$http.post(index.url + "deleteProduct", data).then(function (r) {
				var result = r.body;
				this.cargarproductos();
			
			})
	},
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


