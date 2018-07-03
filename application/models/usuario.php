<?php


class usuario extends CI_Model{

public function login($rut, $clave){
    $this->db->where("rut",$rut);
    $this->db->where("clave",$clave);
    return $this->db->get("personal")->result();
}

public function personal(){
    return $this->db->get("personal")->result();
}

}