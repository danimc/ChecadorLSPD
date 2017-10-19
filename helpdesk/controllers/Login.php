<?php

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('Usuario',"",TRUE);

	}

	public function index()
	{
		$this->verifica_logeado();
		$this->load->view('v_login');
		
	}
	
	function menu(){
		if($this->session->userdata("logged_in")){
			redirect("home");
		}
		else{
			redirect("ingreso");
		}
    }
	
	function login(){
		if(!isset($_POST["user"]) || !isset($_POST["password"]))
			redirect("Inicio");
		
		session_start();

		$_SESSION["user"]=$_POST["user"];

		//$this->Usuario->validar();
	}
        
	function logout()
	{
		$this->simplelogin->logout();
		redirect("ingreso");
	}

	function verifica_logeado()
	{
		if($this->session->userdata("logged_in"))
			redirect("Inicio");
	}
}