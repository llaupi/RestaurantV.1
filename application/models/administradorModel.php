<?php class administradorModel extends CI_Model {

	public function buscarusuario($rut) {
		$this->db->where("rut", $rut);
		$this->db->select("rut");
		return $this->db->get("personal")->result();
  }
  
	public function getCategoria() {
		return $this->db->get("categoria")->result();
	}
	public function getProducto()
	{
		return $this->db->get("producto")->result();
	}
  
	public function agregarProducto($nombre, $precio, $stock, $descripcion, $categoria, $imagen) {
		$data=array("nombre"=>$nombre, "precio"=>$precio, "stock"=>$stock, "Descripcion"=>$descripcion,
		 "idCategoria"=>$categoria, "imagen"=>$imagen);
		return $this->db->insert("producto", $data);
  }
  
	public function registrarPersonal($rut, $nombre, $apellido, $correo, $clave, $telefono, $tipo) {
		$data=array("rut"=> $rut, "nombre"=>$nombre, "apellido"=>$apellido, "correo"=>$correo, "clave"=>$clave, "telefono"=>$telefono, "tipo"=>$tipo);
		return $this->db->insert("personal", $data);
	}
	public function editarPersonal($rut,$nombre,$apellido,$correo,$telefono,$tipo)
	{
		$data=array("rut"=>$rut,"nombre"=>$nombre,"apellido"=>$apellido,"correo"=>$correo,"telefono"=>$telefono,"tipo"=>$tipo);
		$this->db->where("rut",$rut);
		return $this->db->update("personal",$data);
	}

	public function deletePersonal($rut)
	{
		$this->db->where("rut",$rut);
		return $this->db->delete("personal");
	}

	public function deleteProduct($codigo)
	{
		$this->db->where("codigo",$codigo);
		return $this->db->delete("producto");
	}

	public function actualizarProducto($codigo,$nombre, $precio, $stock, $descripcion, $categoria, $imagen)
	{
		$data=array("nombre"=>$nombre, "precio"=>$precio, "stock"=>$stock, "Descripcion"=>$descripcion,
		 "idCategoria"=>$categoria, "imagen"=>$imagen);
		 $this->db->where("codigo",$codigo);
			return $this->db->update("producto",$data);
	}
	public function addCategoria($nombre)
	{
		$data= array("nombre"=>$nombre);
		return $this->db->insert("categoria",$data);
	}
	public function deleteCategoria($id)
	{
		$this->db->where("id",$id);
		return $this->db->delete("categoria");
	}
	public function updateCategoria($id,$nombre)
	{
		$data=array("nombre"=>$nombre);
		$this->db->where("id",$id);
		return $this->db->update("categoria",$data);
	}

	//join de categoria con producto

	public function unirCategoria()
	{
		$this->db->select("producto.codigo,producto.nombre,producto.precio,producto.stock,producto.descripcion,categoria.nombre as 'categoria'");
		$this->db->from("producto");
		$this->db->join("categoria","producto.idCategoria = categoria.id");
		return $this->db->get()->result();
	}

	// capturar orden
	public function addOrden($idmesa,$fecha,$precio,$cliente)
	{
		$data = array("idMesa"=>$idmesa,"fecha"=>$fecha,"precio"=>$precio,
		"rutCliente"=>$cliente);
		 $this->db->insert("orden",$data);
	$id = $this->db->query("select max(idorden) as 'ultima' from orden")->result();
		return $id;
	}
	public function detalleOrden($ultimaID,$producto)
	{
		$data= array("idOrden"=>$ultimaID,"idCodigo"=>$producto);
		$this->db->insert("detalleorden",$data);
	}
	//	idorden idMesa fecha precio rutCliente
	public function pedido()
	{
		$this->db->select("*");
		$this->db->from("orden");
		$this->db->join("detalleorden","orden.idorden = detalleorden.idOrden");
		$this->db->join("producto","producto.codigo = detalleorden.idCodigo");
		return $this->db->get()->result();
	}
	public function mostrarOrden()
	{
		return $this->db->get("orden")->result();
	}
	public function buscarProducto($codigo)
        {
            $this->db->where("codigo",$codigo);
            return $this->db->get("producto")->result();
        }


	public function buscarMesa($idmesa)
        {
            $this->db->where("id",$idmesa);
            return $this->db->get("mesa")->result();
				}
				
				public function getProductosPorOrden($idorden)
				{
					$this->db->select("*");
					$this->db->from("producto");
					$this->db->join("detalleorden","detalleorden.idCodigo = producto.codigo");
					$this->db->where("detalleorden.idOrden",$idorden);
				return	$this->db->get()->result();

				}



}
