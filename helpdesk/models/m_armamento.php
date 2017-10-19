<?php

class m_armamento extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    	
	function obt_armamentos()
    {
		$qry =""; 
		$qry .= "SELECT
		usuarios.user,
		usuarios.nombreCompleto,
		departamentos.nombre
		FROM CH_checador
		LEFT JOIN Tb_Empleados usuarios ON usuarios.user = usr
		LEFT JOIN Tb_DatosLaborales l ON l.rfc = usuarios.rfc
		LEFT JOIN departamentos ON departamentos.id = l.departamento
		order by user asc";
							
        return $this->db->query($qry)->result();     
    }

    function tipoxcat($cat)
    {
    	$this->db->where('cat',$cat);
    	return $this->db->get('AR_tipo')->result();
    }

    function subtipoxcat($tipo)
    {
    	$this->db->where('tipo', $tipo);
    	return $this->db->get('AR_subtipo')->result();
    }

	
	function obt_resguardantes()
    {
		$qry =""; 
		$qry .= "SELECT 
					r.resguardante
					,u.nombreCompleto
					,count(r.id) as radios
					,r.departamento
					,d.nombre as n_departamento
				FROM db_helpdesk.AR_armamento r
				INNER JOIN db_helpdesk.Tb_Empleados u ON u.user = r.resguardante
				INNER JOIN db_helpdesk.departamentos d ON d.id = r.departamento
				WHERE r.estado != 1 AND r.estado != 7
				GROUP BY u.nombre, r.resguardante";
							
        return $this->db->query($qry)->result();     
    }
	
	function obt_radios_zona($zona)
    {
		$qry =""; 
		$qry .= "SELECT
				radios.id, 
				radios.patrimonial, 
				radios.id_interno,
				radios.modelo,
				radios.serie,
				radios.canales,
				radios.f_resguardo,
				radios.observaciones,
				usuarios.nombre as n_usuario,
				usuarios.apellido as a_usuario,
				departamentos.nombre as dep,
				r_tipos_radios.nombre as tipo,
				r_estados.nombre as estado
				FROM
				radios
				LEFT JOIN usuarios ON usuarios.user = radios.usuario
				LEFT JOIN departamentos ON departamentos.id = radios.departamento
				LEFT JOIN r_tipos_radios ON r_tipos_radios.id = radios.tipo
				LEFT JOIN r_estados ON r_estados.id = radios.estado
				WHERE radios.estado != 1 AND radios.estado != 7 AND radios.departamento = ".$zona;
							
        return $this->db->query($qry)->result();     
    }
	
	
	function obt_armamentos_resguardante($usuario)
    {
		$qry =""; 
		$qry .= "SELECT
				ar.id, 
				ar.patrimonial, 
				ar.matricula,
				cat.nombre,
				tipo.clasificacion,
                subtipo.descripcion
				FROM
				AR_armamento ar
                LEFT JOIN AR_categoria cat ON cat.id = ar.cat
                LEFT JOIN AR_tipo tipo ON tipo.id = ar.tipo
                LEFT JOIN AR_subtipo subtipo ON subtipo.id_subtipo = ar.subtipo
				WHERE ar.estado != 1 AND ar.estado != 7 AND ar.resguardante = ".$usuario;
							
        return $this->db->query($qry)->result();     
    }
	
	function obt_radios_baja()
    {
		$qry =""; 
		$qry .= "SELECT
				radios.id, 
				radios.patrimonial, 
				radios.id_interno,
				radios.modelo,
				radios.serie,
				radios.canales,
				radios.f_resguardo,
				radios.observaciones,
				usuarios.nombreCompleto,
				departamentos.nombre as dep,
				r_tipos_radios.nombre as tipo,
				r_estados.nombre as estado
				FROM
				radios
				LEFT JOIN Tb_Empleados usuarios ON usuarios.user = radios.usuario
				LEFT JOIN departamentos ON departamentos.id = radios.departamento
				LEFT JOIN r_tipos_radios ON r_tipos_radios.id = radios.tipo
				LEFT JOIN r_estados ON r_estados.id = radios.estado
				WHERE radios.estado = 1 OR radios.estado = 7";
							
        return $this->db->query($qry)->result();     
    }
	
	function obt_historial()
    {
		$qry =""; 
		$qry .= "SELECT 
			AR_historico.id,
			AR_subtipo.descripcion as armamento,
			AR_armamento.matricula,
			AR_historico.fecha,
			AR_historico.detalles,
			us.nombreCompleto as usCambio,
			usuarios.nombreCompleto as nombre,
			departamentos.nombre as dep,
			AR_estadoArmamento.estado,
			AR_situacionArmamento.descripcion as situacion
			FROM db_helpdesk.AR_historico
			INNER JOIN AR_armamento
			LEFT JOIN departamentos ON departamentos.id = AR_historico.departamento
			LEFT JOIN AR_subtipo ON AR_armamento.subtipo = AR_subtipo.id_subtipo
			LEFT JOIN Tb_Empleados us ON AR_historico.usuario =  us.user  
			LEFT JOIN Tb_Empleados usuarios ON AR_historico.resguardante =  usuarios.user 
			LEFT JOIN AR_estadoArmamento ON AR_estadoArmamento.id = AR_historico.estado
			LEFT JOIN AR_situacionArmamento ON AR_situacionArmamento.id = AR_historico.situacion
			WHERE AR_armamento.id = AR_historico.armamento";
							
        return $this->db->query($qry)->result();     
    }
	
	function obt_historial_radio($id)
    {
		$qry =""; 
		$qry .= "SELECT 
			AR_historico.id,
			AR_subtipo.descripcion as armamento,
			AR_armamento.matricula,
			AR_historico.fecha,
			AR_historico.detalles,
			usuarios.nombreCompleto as nombre,
			us.nombreCompleto as usCambio,
			departamentos.nombre as dep,
			AR_estadoArmamento.estado,
			AR_situacionArmamento.descripcion as situacion
			FROM db_helpdesk.AR_historico
			INNER JOIN AR_armamento
			LEFT JOIN departamentos ON departamentos.id = AR_historico.departamento
			LEFT JOIN AR_subtipo ON AR_armamento.subtipo = AR_subtipo.id_subtipo
			LEFT JOIN Tb_Empleados usuarios ON AR_historico.resguardante =  usuarios.user
			LEFT JOIN Tb_Empleados us ON AR_historico.usuario =  us.user  
			LEFT JOIN AR_estadoArmamento ON AR_estadoArmamento.id = AR_historico.estado
			LEFT JOIN AR_situacionArmamento ON AR_situacionArmamento.id = AR_historico.situacion
			WHERE AR_armamento.id = AR_historico.armamento
			AND AR_historico.armamento = '$id'";

							
        return $this->db->query($qry)->result();     
    }
	
	function obt_armamento($id)
    {
		$qry =""; 
		$qry .= "SELECT
				AR_armamento.id,
				AR_armamento.patrimonial,
				AR_categoria.nombre as cat,
				AR_tipo.clasificacion,
				AR_subtipo.descripcion,
				AR_armamento.matricula,
				AR_armamento.resguardante as resg,
				AR_armamento.departamento,
				AR_armamento.situacion as idSituacion,
				AR_situacionArmamento.descripcion as situacion,
				AR_estadoArmamento.estado,
				AR_armamento.estado as idEstado,
				departamentos.nombre as dep,
				AR_armamento.f_resguardo,
				AR_armamento.patrimonial,
				AR_armamento.observaciones
				from
				AR_armamento
				left join departamentos on departamentos.id = AR_armamento.departamento
				left join AR_categoria on AR_categoria.id = AR_armamento.cat
				left join AR_tipo on AR_tipo.id = AR_armamento.tipo
				left join AR_subtipo on AR_subtipo.id_subtipo = AR_armamento.subtipo
				left join AR_estadoArmamento on AR_estadoArmamento.id = AR_armamento.estado
				left join AR_situacionArmamento on AR_armamento.situacion = AR_situacionArmamento.id
				where AR_armamento.id ='$id'"; 

			return $this->db->query($qry)->row(); 
			    
    }
    

    	function obt_cat()
    {
		return $this->db->get("AR_categoria")->result();    
    }

	
	function obt_estado()
    {
		return $this->db->get("AR_estadoArmamento")->result();    
    }

    function obt_situacion()
    {
		return $this->db->get("AR_situacionArmamento")->result();    
    }

    function obt_tipo()
    {
		return $this->db->get("AR_tipo")->result();    
    }

     function obt_subtipo()
    {
		return $this->db->get("AR_subtipo")->result();    
    }
	

	function guardar()
    {


       	$fecha = $this->fecha_actual();
		$patrimonial = $_POST["patrimonial"];
	
		$this->cat = $_POST["cat"];
		$this->tipo = $_POST["tipo"];		
		$this->subtipo = $_POST["subtipo"];	
		$this->matricula = $_POST["matricula"];	
		$this->situacion = 1;	
		$this->patrimonial = $patrimonial;	
		$this->estado = $_POST['estado'];	
		$this->f_resguardo = $fecha;	
		$this->observaciones = $_POST['observaciones'];	
		//$this->estado = 2;	
		//$this->usuario = 00000;	
		
        $this->db->insert("AR_armamento",$this);   
	
    }
	
	function guardar_h($serie)
    {	
		$this->radio = $serie;
		$this->usuario = $this->session->userdata("user");
		$this->resguardante = 00000;		
		$this->departamento = 39;	
		$this->estado = 2;	
		$this->detalles = "EL EQUIPO SE REGISTRO ";
				
        $this->db->insert("h_radios",$this);        
    }

	function actualizarArma($id,$user,$dep,$estado,$oficio,$observaciones,$situacion)
	{		
		$fecha = $this->fecha_actual();
		
		$this->db->set("resguardante",$user); 
		$this->db->set("departamento",$dep);
		$this->db->set("estado",$estado); 		
		//$this->db->set("oficio",$oficio); 		
		$this->db->set("situacion",$situacion);
		$this->db->set("observaciones",$observaciones); 	
		$this->db->set("f_resguardo",$fecha);
        $this->db->where("id",$id);        
        $this->db->update("AR_armamento");	
	}
	

	function actualizar_h($id,$user,$resguardante,$departamento,$estado,$situacion,$oficio,$detalles)
	{
		// $ext = explode('.',$_FILES['documento']['name']);               
  //       $ext = $ext[count($ext) - 1];             
		
		// $this->ext = $ext; 
		$this->armamento = $id;
		//$this->serie = $serie;
		$this->usuario = $this->session->userdata("user");
		$this->resguardante = $user;	
		$this->departamento = $departamento;	
		$this->estado = $estado;
		$this->situacion = $situacion;	
		$this->oficio = $oficio;
		$this->detalles = $detalles;
				
        $this->db->insert("AR_historico",$this);       
		return $this->db->insert_id();
		
	}
		
		
	function actualizar_masivo($user,$dep_nuevo,$dep_anterior,$oficio,$detalles)
	{
		$fecha = $this->fecha_actual();
		
		$this->db->set("resguardante",$user); 
		$this->db->set("departamento",$dep_nuevo);		
		//$this->db->set("oficio",$oficio); 		
		$this->db->set("observaciones",$detalles); 	
		$this->db->set("f_resguardo",$fecha);   
		$this->db->where("departamento",$dep_anterior); 
        $this->db->update("AR_armamento");	
	}
	
	function actualizar_masivo_h($user,$dep_nuevo,$dep_anterior,$oficio,$detalles)
	{
		$ext = explode('.',$_FILES['documento']['name']);               
        $ext = $ext[count($ext) - 1];             
		
		$this->ext = $ext; 
		$this->radio = 'cambio de resguardo masivo';
		$this->usuario = $this->session->userdata("user");
		$this->resguardante = $user;	
		$this->departamento = $dep_nuevo;		
		$this->oficio = $oficio;
		$this->estado = 'MASIVO';
		$this->detalles = $detalles;
				
        $this->db->insert("AR_historico",$this);       
		return $this->db->insert_id();
		
	}
		
	//******************************** FECHAS **********************************************/	
		
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
	
	function fecha_actual(){
		date_default_timezone_get("America/Mexico_City");
		$fecha = date("Y-m-d");
		return $fecha;
	}
	
	function fechahora_actual(){
		date_default_timezone_get("America/Mexico_City");
		$fecha = date("Y-m-d h:i:s");
		return $fecha;
	}
	
	function fecha_text($datetime)
	{
		if($datetime == "0000-00-00 00:00:00"){
			return "Fecha indefinida";
		}else{
			
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
			
			$hora = explode(":",$dia[1]);
			
			$time = $hora[0].":".$hora[1]." Hrs";
			
			$fecha2 = $fecha[2]." ".$mes." ".$fecha[0];
			return $fecha2." a las ".$time ;
		}
	}
	
	function fecha_text_f($datetime)
	{
		if($datetime == "0000-00-00"){
			return "Fecha indefinida";
		}else{
			
		$fecha = explode("-",$datetime);
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
			return $fecha2 ;
		}
	}
	
	function hora_fecha_text($dia)
	{
		$dia2 = explode(" ",$dia);
		
		if($dia2[0] == "0000-00-00"){
			$fecha2 = "Termino indefinido";
		}else{
			$fecha = explode("-",$dia2[0]);
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
			
			$fecha2 = $fecha[2]." de ".$mes." del ".$fecha[0];
		}
		return $fecha2;
	}

}
?>
