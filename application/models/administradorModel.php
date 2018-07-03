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




}
