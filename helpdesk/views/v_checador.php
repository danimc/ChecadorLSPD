<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Feb 2017 18:33:24 GMT -->
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="<?=base_url()?>/src/img/shield.png">
		<title>Checador</title>

		<link rel="stylesheet" href="<?=base_url()?>src/vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/font-awesome/css/font-awesome.min.css">

		<link rel="stylesheet" href="<?=base_url()?>src/css/core.css">
	<body class="" >
		
		<div class="container-fluid">
			<div class="sign-form">
				<div class="row">
					<div class="col-md-4 offset-md-4 px-3">
						<img width="100%" src="<?=base_url()?>src/img/comisaria.jpg">
						<div class="box b-a-0">
							<div class="p-2 text-xs-center">
								<h5>CHECADOR 2.0</h5>
							</div>
							<div align="center" id="salida"></div>
							 
								<div align="center" class="form-group">
									<canvas   id="foto" width="100%" height=""></canvas>
									<input type="text" name="empleado" class="form-control" id="empleado" placeholder="Num. Empleado">
								</div>
								
								<div class="px-2 form-group mb-0">
									<button type="submit" class="btn bg-facebook btn-lg btn-block text-uppercase">Registrar</button>
								</div>
								
								<video  id="video" width="180" height="134" autoplay="autoplay"></video>
       						<div class="p-2 text-xs-center text-muted">
								¿Administrador? <a class="text-black" href="<?base_url()?>index.php?acceso/iniciar_session"><span class="underline">Inicia Sesión</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
<script type="text/javascript" src="<?=base_url()?>src/vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>src/vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>src/vendor/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>src/js/webcam.js"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Feb 2017 18:33:24 GMT -->
</html>