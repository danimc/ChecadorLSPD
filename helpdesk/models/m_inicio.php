<?php

class m_inicio extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	function progreso($avance, $total)
	{
		$res = ($avance * 100)/$total;	
		return $res;
	}
	
	function progreso_class($avance)
	{
		if($avance == 0 && $avance < 25){
			$class="progress-bar-info";
		}else if($avance > 26 && $avance < 50){
			$class="progress-bar-success";
		}else if($avance > 51 && $avance < 75){
			$class="progress-bar-warning";
		}else if($avance > 76 && $avance <= 100){
			$class="progress-bar-danger";
		}else{
			$class="progress-bar-info";
		}		
		return $class;
	}
	
	//---------------------------CONTADORES DE LA PANTALLA PRINCIPAL
	function contador_armamento()
	{
		$this->db->where("situacion !=",0);
		return $this->db->get("AR_armamento")->num_rows();	
	}
	
	function contador_almacenado()
	{
		$this->db->where("situacion =",1);
		return $this->db->get("AR_armamento")->num_rows();
	}
	
	function contador_en_servicio()
	{
		$this->db->where("situacion",2);
		return $this->db->get("AR_armamento")->num_rows();
	}
	
	function contador_fuera_de_servicio()
	{
		$this->db->where("situacion",3);
		return $this->db->get("AR_armamento")->num_rows();
	}
	

//------------------------FIN DE CONTADORES


	function total_armamento($departamento)
	{
		$this->db->where("departamento",$departamento);
		return $this->db->get("AR_armamento")->num_rows();	
	}
	
	function total_x_zona($departamento,$tipo)
	{
		$this->db->where("tipo",$tipo);
		$this->db->where("departamento",$departamento);
		return $this->db->get("AR_armamento")->num_rows();	
	}
	

	
	 function guardar_documento()
    {    
		$ext = explode('.',$_FILES['documento']['name']);               
        $ext = $ext[count($ext) - 1];             
		
		$this->ext = $ext; 
		$this->nombre = $_POST["nombre"];
		$this->departamento = $_POST["departamento"];
		$this->usuario = $_POST["usuario"];	
		$this->activo = 1;	
		
        $this->db->insert("hd_documentos",$this);
		return $this->db->insert_id();
    }
	
	
}
?>
