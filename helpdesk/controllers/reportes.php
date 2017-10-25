<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesorios extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_armamento',"",true);
		$this->load->model('m_inicio',"",true);
		$this->load->model('m_usuarios',"",true);
		$this->load->model('m_seguridad',"",true);
		$this->load->model('m_accesorios',"",true);
		
		$ci = get_instance();	
		$this->ftp_ruta = $ci->config->item("f_ruta");
		$this->dir = $ci->config->item("oficios");
	}
	
	public function index()
	{
		$datos['titulo'] = 'Accesorios';	
		$datos["accesorios"] = $this->m_accesorios->obt_accesorios();	
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('listas/l_accesorios',$datos);
		$this->load->view('_foot');
	}
	
	}