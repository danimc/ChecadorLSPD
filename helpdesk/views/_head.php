<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="<?=base_url()?>/src/img/shield.png">
		<title>Ctrl Armamento</title>

		<link rel="stylesheet" href="<?=base_url()?>src/vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/waves/waves.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/DataTables/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
		
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/select2/dist/css/select2.min.css">
		
		<link rel="stylesheet" href="<?=base_url()?>src/css/core.css">
		
		<script type="text/javascript" src="<?=base_url()?>src/vendor/jquery/jquery-1.12.3.min.js"></script>
		
		

	</head>
	
	
	<?php
		$controlador = $this->uri->segment(1);
		$funcion = $this->uri->segment(2);
		$objeto  = $this->uri->segment(3);

		$this->m_seguridad->log_general($controlador, $funcion, $objeto);
	
		if($this->session->userdata("id") == null){
			redirect('/acceso/logout');
		}
		if($this->m_seguridad->acceso_sistema() == 0)
		{
			
			redirect('/Inicio/noaccess');
		}
	?>

			
		