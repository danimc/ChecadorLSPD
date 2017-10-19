<?php

class Acceso extends CI_Controller {
        
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');            
		$this->load->model('usuario',"",TRUE);
	}
	
	function index()
	{
		$this->load->view('v_checador');		     
	}

	function iniciar_session()
	{
		$this->verifica_logeado();
		$this->load->view("v_login");     
	}
	
	function menu()
	{
		if($this->session->userdata("logged_in")){
			redirect("/Inicio");
		}
		else{
			redirect("acceso");
		}
	}
	
	function no_privilegios()
	{
		redirect("inicio");
	}
	
	function login()
	{
		if(!isset($_POST["user"]) || !isset($_POST["password"]))
			redirect("/Inicio/index");
		

		session_start();

		$_SESSION["user"]=$_POST["user"];

		$this->usuario->validar();
	}
	function logout()
	{
		$this->simplelogin->logout();
		redirect("acceso");
	}

	function verifica_logeado()
	{
		if($this->session->userdata("logged_in"))
			redirect("/Inicio");
	}
	
}
?>