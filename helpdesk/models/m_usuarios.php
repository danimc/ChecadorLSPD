<?php

class m_usuarios extends CI_Model {
	
    function __construct()
    {  
        parent::__construct();
    }
    	
  
    function obt_usuarios($id)
    {
		$qry ="";
		$qry .= "SELECT
				usuarios.id,
				usuarios.nombreCompleto,
				usuarios.user,
				
				nombramientos.nombre as nombramiento,
				departamentos.nombre as dep,
				Tb_CatPuestos.nombre as puesto
				FROM
				Tb_Empleados usuarios
				LEFT JOIN Tb_DatosLaborales l ON l.rfc = usuarios.rfc
				LEFT JOIN departamentos ON departamentos.id = l.departamento
				LEFT JOIN nombramientos ON nombramientos.id = l.nombramiento
				LEFT JOIN Tb_CatPuestos ON Tb_CatPuestos.id = l.puesto
				WHERE usuarios.user = '$id'";
							
        return $this->db->query($qry)->row();     
    }
	
	function obt_usuario($id)
    {
		$this->db->where("user",$id);        
        return $this->db->get("usuarios")->row();
	}

	function nombre_entrega_armas($usuario)
	{
		$qry = "SELECT nombreCompleto
				FROM Tb_Empleados
				WHERE user = ".$usuario;

		 return $this->db->query($qry)->row(); 
	}

	function obt_usuario_act($id)
    {
		$query ="";
		$query = "SELECT
				
				departamentos.id as dep
				FROM
				Tb_Empleados usuarios
				LEFT JOIN Tb_DatosLaborales l ON l.rfc = usuarios.rfc
				LEFT JOIN departamentos ON departamentos.id = l.departamento
				LEFT JOIN Tb_CatPuestos ON Tb_CatPuestos.id = l.puesto
				where usuarios.user =".$id;

				 return $this->db->query($query)->row(); 


	}
	
	function obt_cat_sistemas()
    {	
		$this->db->where("estado",1);        
        return $this->db->get("CatSistemas")->result();
	}
	
	function obt_cat_modulos($sistema)
    {	
		$this->db->where("estado",1);      
		$this->db->where("sistema",$sistema);   
        return $this->db->get("CatModulos")->result();
	}
	
	function accesos_sistemas_usuario($usuario)
    {
		
		$qry ="";
		$qry .= "SELECT 

				s.checkbox

			FROM db_helpdesk.accesos_sistemas a
			LEFT JOIN db_helpdesk.CatSistemas s on s.id = a.sistema
			WHERE a.usuario = ".$usuario;
							
        return $this->db->query($qry)->result();   
    }
	
	function accesos_modulos_usuario($usuario)
    {
		
		$qry ="";
		$qry .= "SELECT 

				m.checkbox

			FROM db_helpdesk.accesos_modulos a
			LEFT JOIN db_helpdesk.CatModulos m on m.id = a.modulo
			WHERE a.usuario = ".$usuario;
							
        return $this->db->query($qry)->result();   
    }

	
	 function obt_directorio()
    {
		$qry ="";
		$qry .= "SELECT 
				e.id,extension,marca,modelo,linea,mac,comentarios,
				d.nombre as dep
				FROM
				hd_telefonos e
				LEFT JOIN departamentos d ON d.id = e.departamento";
							
        return $this->db->query($qry)->result();     
    }
	
	function datos_usuario($id)
    {
		$this->db->select('Tb_Empleados.*,Tb_DatosLaborales.*');
		$this->db->from('Tb_Empleados');
		$this->db->join('Tb_DatosLaborales', 'Tb_Empleados.rfc = Tb_DatosLaborales.rfc', 'left'); 
		$this->db->where("Tb_Empleados.user",$id);   
		$query = $this->db->get();
		
		return $query->row();

	}
	
	function obt_departamentos(){
		
		return $this->db->get("departamentos")->result();

	}
	
	function obt_departamento()
	{
		$this->db->where("id",$id);  
		return $this->db->get("departamentos")->row();

	}
	
	
	function obt_areas(){
		
		return $this->db->get("hd_areas")->result();

	}
	
	function obt_puestos()
    {
		return $this->db->get("Tb_CatPuestos")->result();    
    }
	
	function obt_municipios()
    {
		return $this->db->get("municipios")->result();    
    }

	function obt_direcciones()
    {
		return $this->db->get("Tb_CatDirecciones")->result();    
    }
	
	function obt_nombramientos(){
		
		return $this->db->get("nombramientos")->result();

	}
	
	function guardar()
    {        
	

		
		$this->activo = 1;
		$this->user = $_POST["numero"];	
		$this->nombre = strtoupper($_POST["nombre"]);	
		$this->apellido = strtoupper($_POST["apellido"]);	
		$this->puesto = $_POST["puesto"];	
		$this->departamento = $_POST["departamento"];	
		//$this->nombramiento = $_POST["nombramiento"];	
		//$this->municipio = $_POST["municipio"];
		//$this->direccion_dep = $_POST["direccion_dep"];
		$this->telefono = $_POST["telefono"];
		$this->correo = $_POST["correo"];
		//$this->cp = $_POST["cp"];			
		
        $this->db->insert("usuarios",$this);

        
    }
	
	function actualizar($id)
    { 
		//$fecha = $this->fecha_a_sql($_POST["fecha"]);
		//$this->db->set("nombre",strtoupper($_POST["nombre"]));
		//$this->db->set("apellido",strtoupper($_POST["apellido"]));
		//$this->db->set("puesto",$_POST["puesto"]);
		//$this->db->set("departamento",$_POST["departamento"]);
		//$this->db->set("municipio",$_POST["municipio"]);
		//$this->db->set("direccion_dep",$_POST["direccion_dep"]);
		//$this->db->set("nombramiento",$_POST["nombramiento"]);
		//$this->db->set("direccion",$_POST["direccion"]);
		//$this->db->set("telefono",$_POST["telefono"]);		
		//$this->db->set("cp",$_POST["cp"]); 
		//$this->db->set("correo",$_POST["correo"]);

		if($_POST["password"] != ""){
			$this->db->set("password",md5($_POST["password"]));  
		}
				
        $this->db->where("user",$id);        
        $this->db->update("Tb_Empleados");        
    }
	
	function datos_usuario_validacion($id)
    {
		$qry ="";
		$qry .= "SELECT
				usuarios.id,
				usuarios.nombreCompleto,
				departamentos.nombre as dep,
				Tb_CatPuestos.nombre as puesto
				FROM
				Tb_Empleados usuarios
				LEFT JOIN Tb_DatosLaborales l ON l.rfc = usuarios.rfc
				LEFT JOIN departamentos ON departamentos.id = l.departamento
				LEFT JOIN Tb_CatPuestos ON Tb_CatPuestos.id = l.puesto
				where usuarios.user = ".$id;
				
			return $this->db->query($qry)->row();     
	}
	
	
	
	function datos_usuario_validacion_n($id)
    {
		$qry ="";
		$qry .= "SELECT
				usuarios.id,
				usuarios.nombreCompleto,
				departamentos.nombre as dep
				FROM
				Tb_Empleados usuarios
				LEFT JOIN Tb_DatosLaborales l ON l.rfc = usuarios.rfc
				LEFT JOIN departamentos ON departamentos.id = l.departamento
				where usuarios.user = '$id'";
				
			return $this->db->query($qry)->num_rows();     
	}
	
	
	//************************FECHA*******************************//
	
	function fecha($datetime){
		$dia = explode(" ",$datetime);
		$fecha = explode("-",$dia[0]);
		if($fecha[1] == 1){
			$mes = 'enero';
		}else if($fecha[1] == 2){
			$mes = 'febrero';
		}else if($fecha[1] == 3){
			$mes = 'marzo';
		}else if($fecha[1] == 4){
			$mes = 'abril';
		}else if($fecha[1] == 5){
			$mes = 'mayo';
		}else if($fecha[1] == 6){
			$mes = 'junio';
		}else if($fecha[1] == 7){
			$mes = 'julio';
		}else if($fecha[1] == 8){
			$mes = 'agosto';
		}else if($fecha[1] == 9){
			$mes = 'septiembre';
		}else if($fecha[1] == 10){
			$mes = 'octubre';
		}else if($fecha[1] == 11){
			$mes = 'noviembre';
		}else if($fecha[1] == 12){
			$mes = 'diciembre';
		}

		$fecha2 = $fecha[2]." ".$mes." ".$fecha[0];
		return $fecha2;
	}
	
	function fecha_a_sql($date){
		$fecha = explode("/",$date);
		$fecha_sql = $fecha['2']."-".$fecha['0']."-".$fecha['1'];
		return $fecha_sql;
	}
	
	function fecha_a_form($date){
		$fecha = explode("-",$date);
		$fecha_sql = $fecha['1']."/".$fecha['2']."/".$fecha['0'];
		return $fecha_sql;
	}
	
}
?>
