<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_usuarios',"",true); 
		$this->load->model('m_inicio',"",true);
		$this->load->model('m_seguridad',"",true);
		//$this->load->model('m_seguridad_modulos',"",true);
	}

	public function index()
	{	$datos['titulo'] = 'usuarios';
		$datos["usuarios"] = $this->m_usuarios->obt_usuarios();	
			
		$this->load->view('_head');
			$this->load->view('_menu');
			$this->load->view('listas/l_usuarios',$datos);
			$this->load->view('_foot');
	}
	
	public function directorio()
	{
		$datos['titulo'] = 'directorio';
		$datos["usuarios"] = $this->m_usuarios->obt_directorio();	
		$this->load->view('v_inicio',$datos);
		$this->load->view('listas/l_directorio',$datos);
	}
	
	public function nuevo()
	{
		$datos['titulo'] = 'usuarios';
		$datos["puestos"] = $this->m_usuarios->obt_puestos();
		$datos["sistemas"] = $this->m_usuarios->obt_cat_sistemas();
		$datos['departamentos'] = $this->m_usuarios->obt_departamentos();
		$datos['municipios'] = $this->m_usuarios->obt_municipios();
		$datos['direccion_deps'] = $this->m_usuarios->obt_direcciones();
		$datos['nombramientos'] = $this->m_usuarios->obt_nombramientos();
		$datos['accion'] = 'guardar';

		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('forms/f_usuario',$datos);
		$this->load->view('_foot');
	}
	
	public function actualizar_usuario()
	{
		$datos['titulo'] = 'usuarios';
		$datos["puestos"] = $this->m_usuarios->obt_puestos();
		$datos["sistemas"] = $this->m_usuarios->obt_cat_sistemas();
		$datos['departamentos'] = $this->m_usuarios->obt_departamentos();
		$datos['municipios'] = $this->m_usuarios->obt_municipios();
		$datos['direccion_deps'] = $this->m_usuarios->obt_direcciones();
		$datos['nombramientos'] = $this->m_usuarios->obt_nombramientos();
		$datos["usuario"] = $this->m_usuarios->datos_usuario(intval($this->uri->segment(3)));
		$datos['accesos'] = $this->m_usuarios->accesos_sistemas_usuario(intval($this->uri->segment(3)));
		$datos['accesos_modulos'] = $this->m_usuarios->accesos_modulos_usuario(intval($this->uri->segment(3)));
		
		$datos['accion'] = 'actualizar';
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('forms/f_usuario',$datos);
		$this->load->view('_foot');
	}
	
	public function guardar()
	{
		$this->m_usuarios->guardar();
		
		$this->session->set_userdata(array("guardado" => "Se ha guardado correctamente el usuario! </b> "));
        redirect('/Usuarios');
	}
	
	public function obt_usuario()
	{
		$id = $_POST['id'];
		
		$usuario = $this->m_usuarios->datos_usuario_validacion($id);
		
		$numero = $this->m_usuarios->datos_usuario_validacion_n($id);
		
	
		if($numero == 0){
			echo '<div class="form-group">
					<div class="alert alert-danger">
						<strong>Error!</strong>
						El numero de empleado no es valido o el usuario no esta registrado registra el usuario para poder continuar con el proceso.
					</div>
				</div>';
		}
		else{
			$cuerpo = '	
				
				<div class="alert alert-info alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
										</button>
										<strong>'.$usuario->nombreCompleto.'<br><br></strong>'.$usuario->dep.'<br> Se ha seleccionado el departamento 
										actual del resguardante, si deseas puedes cambiarlo.
									</div>
			
			';
			echo $cuerpo;
		}
		


	}
	
	
	public function obt_departamento_usuario()
	{
		$id = $_POST['id'];
		$usuario = $this->m_usuarios->obt_usuario_act($id);
		echo $usuario->dep;
		
	
	}
	
	/*public function actualizar()
	{
		$usuario = $_POST['numero'];
		$sistema = "";
		
		if($_POST["password"] != ""){
			$this->m_usuarios->actualizar($usuario);
		}
		///////////////////CONTROL DE ACCESOS DEL USUARIO
		
		@$this->m_seguridad->limpiar_accesos_sistema($usuario);
		
		@$this->m_seguridad_modulos->limpiar_accesos_modulos($usuario);
		
		
		$sistemas = $this->m_usuarios->obt_cat_sistemas();
		
		foreach($sistemas as $sistema)
		{
			$cb = $sistema->checkbox;

			if(isset($_POST[$cb]))
			{
				$this->m_seguridad->dar_acceso_sistema($usuario,$_POST[$cb]);
			}
			
			$modulos = $this->m_usuarios->obt_cat_modulos($sistema->id);
			
			foreach($modulos as $modulo)
			{
				$cbm = $modulo->checkbox;
				
				if(isset($_POST[$cbm]))
				{
					$this->m_seguridad_modulos->dar_acceso_modulo($usuario, $_POST[$cb], $_POST[$cbm]);
				}
			}
		}

		$this->session->set_userdata(array("actualizado" => "Se ha actualizado correctamente el usuario! </b> "));
        redirect('/Usuarios');
	}*/

}
