<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="<?=base_url()?>/src/img/shield.png">
		<title>Seguridad Informática </title>

		<link rel="stylesheet" href="<?=base_url()?>src/vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/font-awesome/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="<?=base_url()?>src/css/core.css">
		
	</head>
	<body class="bg-danger">
		
		<div class="error-message text-xs-center">
			<h1 class="mb-3">ALTO<span><i class="ti-shield"></i></span></h1>
		
			<h5 class="text-uppercase"><?=$this->session->userdata("nombreCompleto")?></h5><br>
			<h5 class="text-uppercase">Lo sentimos, no tienes acceso a esta plataforma.</h5>
			<div class="error-message-text mb-3">Ponte en contacto con el departamento de sistema para validar esto</div>
			<a href="<?=base_url()?>index.php?/acceso/logout" class="btn btn-outline-white w-min-md">Ir la inicio</a>
		</div>

		<script type="text/javascript" src="<?=base_url()?>src/vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>src/vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>src/vendor/bootstrap4/js/bootstrap.min.js"></script>
		
	</body>

</html>