<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_inicio',"",true);
		$this->load->model('m_usuarios',"",true);
		$this->load->model('m_seguridad',"",true);

	}

	public function index()
	{
	
		$datos['todos'] = $this->m_inicio->contador_armamento();
		$datos['almacenado'] = $this->m_inicio->contador_almacenado();
		$datos['servicio'] = $this->m_inicio->contador_en_servicio();
		$datos['fservicio'] = $this->m_inicio->contador_fuera_de_servicio();
		$datos['departamentos'] = $this->m_usuarios->obt_departamentos();
	//	$datos['inhibidos'] = $this->m_inicio->contador_fuera_de_servicio();
		//$datos['extraviados'] = $this->m_inicio->contador_radios_extraviados();
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('v_home',$datos);
		$this->load->view('_foot');
	
	
}
	
	public function noaccess()
	{
		$this->load->view('v_ingreso');
	}
	
	public function ubicacion()
	{
		
		$datos['todos'] = $this->m_inicio->contador_radios();
		$datos['reparacion'] = $this->m_inicio->contador_radios_reparacion();
		$datos['programacion'] = $this->m_inicio->contador_radios_reprogramacion();
		$datos['activos'] = $this->m_inicio->contador_radios_activos();
		$datos['departamentos'] = $this->m_usuarios->obt_departamentos();
		$datos['inhibidos'] = $this->m_inicio->contador_radios_inhibidos();
		$datos['extraviados'] = $this->m_inicio->contador_radios_extraviados();
		$datos['titulo'] = 'ubicacion';	
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('v_ubicacion',$datos);
		$this->load->view('_foot');	
	}
	
	public function nofound()
	{
		$this->load->view('v_nofound');
	}
}
