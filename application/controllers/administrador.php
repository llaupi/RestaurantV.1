<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {

     public function __construct(){
        parent::__construct();
        $this->load->model("administradorModel");
        $this->request = json_decode(file_get_contents('php://input'));
     }

     public function inicioAdmin(){
         $this->load->view("templateAd/header");
         $this->load->view("admin/inicio");
         $this->load->view("templateAd/footer");

     }
     public function redirectRegistrar(){
         $this->load->view("templateAd/header");
         $this->load->view("admin/registrar");
         $this->load->view("templateAd/footer");
     }
     public function moduloPersonal(){
        $this->load->view("templateAd/header");
        $this->load->view("admin/mostrarPersonal");
        $this->load->view("templateAd/footer");
    }

    public function moduloAddCategoria(){
        $this->load->view("templateAd/header");
        $this->load->view("admin/AddCategoria");
        $this->load->view("templateAd/footer");
    }
    public function moduloAddProducto(){
        $this->load->view("templateAd/header");
        $this->load->view("admin/addProducto");
        $this->load->view("templateAd/footer");
    }
    public function moduloAddGetProducto(){
        $this->load->view("templateAd/header");
        $this->load->view("admin/getProducto");
        $this->load->view("templateAd/footer");
    }
    public function modulolistaCarro()
    {
        $this->load->view("templateAd/header");
        $this->load->view("admin/listaCarro");
        $this->load->view("templateAd/footer");
    }
    public function modulocategoria()
    {
        $this->load->view("templateAd/header");
        $this->load->view("admin/categoria");
        $this->load->view("templateAd/footer");
    }

    // mostrar
    public function getCategoria()
    {
        echo json_encode($this->administradorModel->getCategoria());
        }

        public function getProducto()
        {
            echo json_encode($this->administradorModel->getProducto());
        }

    public function agregarProducto()
    {
        $nombre = $this->request->nombre;
        $precio = $this->request->precio;
        $stock = $this->request->stock;
        $descripcion = $this->request->descripcion;
        $categoria = $this->request->categoria;
        $imagen = $this->request->imagen;
        $this->administradorModel->agregarProducto($nombre,$precio,$stock,$descripcion,$categoria,$imagen);
            echo json_encode(array("msg"=>"producto ingresado")); 
           
    }


     public function registrarPersonal()
     {
         $rut = $this->request->rut;
         $nombre = $this->request->nombre;
         $apellido = $this->request->apellido;
         $correo = $this->request->email;
         $clave = $this->request->clave;
         $telefono = $this->request->telefono;
         $tipo = $this->request->tipo;
         $cantidad = sizeof($this->administradorModel->buscarusuario($rut));
         if ($cantidad >0) {
             echo json_encode(array("msg"=>"el rut ya se encuentra registrado"));
         } else {
             $this->administradorModel->registrarPersonal($rut,$nombre,$apellido,$correo,md5($clave),$telefono,$tipo);
             echo json_encode(array("msg"=>"registrado"));
             
         }
         
     }

     public function deletePersonal()
     {
         $rut = $this->request->rut;
         $this->administradorModel->deletePersonal($rut);
         echo json_encode(array("msg"=>"usuario eliminado"));
     }

     public function deleteProduct()
     {
        $codigo = $this->request->codigo;
        $this->administradorModel->deleteProduct($codigo);
        echo json_encode(array("msg"=>"producto eliminado"));
     }

     public function unirCategoria()
     {
         echo json_encode($this->administradorModel->unirCategoria());
     }

     public function actualizarProducto()
     {
         $codigo = $this->request->codigo;
         $precio = $this->request->precio;
         $nombre = $this->request->nombre;
         $stock = $this->request->stock;
         $descripcion = $this->request->descripcion;
         $categoria = $this->request->categoria;
         $imagen = $this->request->imagen;
         $this->administradorModel->actualizarProducto($codigo,$nombre, $precio, $stock, $descripcion, $categoria, $imagen);
         echo json_encode(array("msg"=>"se actualizo"));
     }









}
