<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this -> load->model('usuario');
		$this->request = json_decode(file_get_contents('php://input'));

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('index');
		$this->load->view('template/footer');
	}
	public function registrarCliente()
	{
		$this->load->view('template/header');
		$this->load->view('registrar');
		$this->load->view('template/footer');

	
	}
	
	public function login(){
		$rut = $this->request->rut;
		$clave = $this->request->clave;
		$arrayuser = $this->usuario->login($rut,md5($clave));

		if (count($arrayuser)>0){
			if($arrayuser[0]->tipo ==0){
				echo json_encode(array("msg"=> "administrador"));
				$this->session->set_userdata("administrador",$arrayuser);
			}
			elseif($arrayuser[0]->tipo ==1){
				echo json_encode(array("msg"=> "vendedor"));
			}elseif ($arrayuser[0]->tipo==2) {
				echo json_encode(array("msg"=> "cocinero"));
			}elseif ($arrayuser[0]->tipo ==3) {
				echo json_encode(array("msg"=> "cliente"));
			}
		}else{
			echo json_encode(array("msg"=> "error"));
		}
	}

	public function personal(){
	echo json_encode($this->usuario->personal());
}

public function logout(){
	$this->session->sess_destroy();
	redirect('');
}



}
