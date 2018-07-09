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
    public function modulopedidos()
    {
        $this->load->view("templateAd/header");
        $this->load->view("admin/pedidos");
        $this->load->view("templateAd/footer");
    }
    // mostrar
    public function getCategoria()
    {
        echo json_encode($this->administradorModel->getCategoria());
        }
        public function addCategoria()
        {
            $nombre = $this->request->nombre;
            $this->administradorModel->addCategoria($nombre);
            echo json_encode(array("msg"=>"categoria agregada :)"));
        }
        public function deleteCategoria()
        {
            $id = $this->request->id;
            $this->administradorModel->deleteCategoria($id);
            echo json_encode(array("msg"=>"eliminado"));
        }
        public function updateCategoria()
        {
            $id = $this->request->id;
            $nombre = $this->request->nombre;
            $this->administradorModel->updateCategoria($id,$nombre);
            echo json_encode(array("msg"=>"actualizado"));
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
     public function  editarPersonal()
     {
         $rut = $this->request->rut;
         $nombre = $this->request->nombre;
         $apellido = $this->request->apellido;
         $correo = $this->request->correo;
         $telefono = $this->request->telefono;
         $tipo = $this->request->tipo;
         $this->administradorModel->editarPersonal($rut,$nombre,$apellido,$correo,$telefono,$tipo);
         echo json_encode(array("msg"=>"actualizado con exito"));
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


     public function addOrden()
     {
         $idmesa = $this->request->idmesa;
         $fecha = date("Y-m-d H:i:s");
         $precio = $this->request->total;
         $cliente = $this->request->cliente;
         $productos = $this->request->productos;
          $cantidad = sizeof($this->administradorModel->buscarMesa($idmesa));
          if ($cantidad>0) {
            $ultimaId = $this->administradorModel->addOrden($idmesa,$fecha,$precio,$cliente)[0]->ultima;
              foreach ($productos as $prod) {
        $this->administradorModel->detalleOrden($ultimaId,$prod->codigo);
       }
       echo json_encode(array("msg"=>"ay"));
        
          } else {
              echo json_encode(array("msg"=>"mesa no encontrada"));
          }
          
       
     }

     public function pedido()
     {
        echo json_encode($this->administradorModel->pedido());
     }
     public function mostrarOrden()
    {
        echo json_encode($this->administradorModel->mostrarOrden());
        }

        public function buscarProducto()
        {
            $codigo = $this->request->codigo;
            echo json_encode($this->administradorModel->buscarProducto($codigo));
        }
        public function buscarMesa()
        {
            $id = $this->request->codigo;
            echo json_encode($this->administradorModel->buscarMesa($id));
        }


        public function getProductosPorOrden()
        {
            $ordenes = $this->administradorModel->mostrarOrden();
            $result=array();
            foreach ($ordenes as $o) {
                $p = $this->administradorModel->getProductosPorOrden($o->idorden);
                $r = array("datos"=>$o,"productos"=>$p);
                array_push($result,$r);
            }
            echo json_encode($result);
        }







}
