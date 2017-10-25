<?php

class m_checador extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }

    function verificacion($empleado)
    {
    	$qry =""; 
		$qry .= "SELECT user FROM Tb_Empleados
				 WHERE user = '$empleado'";

		$dato = $this->db->query($qry)->row(); 
		return $dato;
    }

    function checa_registros($empleado, $fecha)
    {
        $qry = "";
        $qry .= "SELECT id, fecha, hora_salida FROM CH_checador
                WHERE usr = '$empleado'
                AND fecha = '$fecha'";

        $check = $this->db->query($qry)->row();

        return $check;
    }

      function checar_entrada($dir, $empleado, $fecha, $hora)
    {
        $this->usr = $empleado;
        $this->fecha = $fecha;
        $this->hora_entrada = $hora;
        $this->foto_entrada = $dir;
        $this->db->insert("CH_checador",$this); 
    }

    function checar_salida($idChecado, $dir, $hora)
    {
        $this->db->set("hora_salida", $hora); 
        $this->db->set("foto_salida", $dir);
        $this->db->where("id",$idChecado);        
        $this->db->update("CH_checador");  
    }
    function obt_usuarios()
    {
        $qry =""; 
        $qry .= "SELECT distinct
        usuarios.user,
        usuarios.nombreCompleto,
        departamentos.nombre as dep
        FROM CH_checador
        LEFT JOIN Tb_Empleados usuarios ON usuarios.user = usr
        LEFT JOIN Tb_DatosLaborales l ON l.rfc = usuarios.rfc
        LEFT JOIN departamentos ON departamentos.id = l.departamento
        order by user asc";
                            
        return $this->db->query($qry)->result();   
    }

    function obt_checado($id)
    {

         $qry =""; 
        $qry .= "SELECT
        ch.fecha,
        usuarios.user,
        usuarios.nombreCompleto,
        departamentos.nombre as dep,
        ch.hora_entrada,
        ch.foto_entrada,
        ch.hora_salida,
        ch.foto_salida
        FROM CH_checador ch
        LEFT JOIN Tb_Empleados usuarios ON usuarios.user = usr
        LEFT JOIN Tb_DatosLaborales l ON l.rfc = usuarios.rfc
        LEFT JOIN departamentos ON departamentos.id = l.departamento
        where usuarios.user = '$id'";
                            
        return $this->db->query($qry)->result();  
       
    }

    function revisar_asistencia_hoy($usuario, $fecha)
    {
        $qry = "";
        $qry = "SELECT
        fecha,
        hora_entrada,
        hora_salida
        FROM CH_checador
        where usr = '$usuario'
        and fecha = '$fecha'";

        return $this->db->query($qry)->row();

    }

    function datos_grafica($usr)
    {
        $qry =""; 
        $qry .= "SELECT
        fecha,
        hora_entrada as hora
        FROM CH_checador
        where usr = '$usr'
        ORDER BY fecha asc";
                            
        return $this->db->query($qry)->result(); 
    }

   function buscar_dias_vacios($id)
    {
        $qry = '';
        $qry = "SELECT fecha FROM CH_checador
                where usr = '$id'
                order by fecha asc";

        return $this->db->query($qry)->result();

    }

    function subir_faltas($fecha, $id)
    {
        $this->usr          = $id;   
        $this->fecha        = $fecha;
        $this->hora_entrada = '00:00:00';
        $this->db->insert("CH_checador",$this); 

    }

    }