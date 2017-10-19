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
	
	public function asignar()
	{
		$datos['titulo'] = 'Accesorios';	
		$datos["departamentos"] = $this->m_usuarios->obt_departamentos();	
		$datos["accesorios"] = $this->m_accesorios->obt_cat_accesorios();
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('forms/f_accesorio',$datos);
		$this->load->view('_foot');
	}
	
	public function obt_accesorios_zona()
	{
		$departamento = $_POST['departamento'];
		
		$accesorio = $this->m_accesorios->obt_accesorios_zona_f($departamento);
		
		$array = (array)$accesorio;
		
		$actuales = $this->m_accesorios->obt_cat_accesorios();
		
		$div = "";
		
		$x = 1;
		
		foreach($actuales as $actual)
		{	
			$apuntador = "a".$x;
			
			$div .='
				<div class="form-group">
					<label for="exampleInputEmail1">'.$actual->tipo." - ".$actual->accesorio.'</label>
					<input name="a'.$actual->id.'" type="text" placeholder="" value="'.@$array[$apuntador].'" class="form-control" />
				</div>				
			';
			
			$x++;
		}	
		
		echo $div;
	}
	
	public function guardar()
	{
		$zona = $_POST['departamento'];
		
		$n = $this->m_accesorios->obt_n_accesorios_zona($zona);

		if($n != 0)
		{
			$this->m_accesorios->actualizar($zona);
		}
		else
		{
			$this->m_accesorios->guardar($zona);
		}
		
		$this->session->set_userdata(array("guardado" => "Se han actualizado los accesorios correctamante </b>"));
        redirect('/accesorios');
	}
}
