
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/pages-sign-in2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Feb 2017 18:33:24 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="<?=base_url()?>/src/img/shield.png">
		<title>Ctrl Armamento | LogIn</title>

		<link rel="stylesheet" href="<?=base_url()?>src/vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="<?=base_url()?>src/vendor/font-awesome/css/font-awesome.min.css">

		<link rel="stylesheet" href="<?=base_url()?>src/css/core.css">

	</head>
	<body class="auth-bg">
		
		<div class="auth">
			<div class="auth-header">
				
				<?
						if($this->uri->segment(3) == "e")
						{        
						echo '
								<div class="row">
									<div class="col-md-4 offset-md-4">
										<div class="alert alert-danger-fill alert-dismissible fade in mb-0" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
											<strong>Usuario o contraseña incorrectos</strong>
										</div>
									</div>
								</div>';
						}
					?>
			
				<div class="mb-2"><img src="<?=base_url()?>src/img/logo.svg" title=""></div>
				<h6>Control de Checador 2.0</h6>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<form action="<?php echo base_url();?>index.php?/acceso/login" method="POST" >
							<div class="form-group">
								<div class="input-group">
									<input required type="number"  name="user" class="form-control" id="exampleInputEmail" placeholder="Numero de empleado">
									<div class="input-group-addon"><i class="ti-email"></i></div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
								<input required type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
									<div class="input-group-addon"><i class="ti-key"></i></div>
								</div>
							</div>
							<div class="form-group clearfix">
							
								<!--<div class="float-xs-right">
									<a class="text-white font-90" href="#">Olvidaste tu contraseña?</a>
								</div>-->
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-block">ingresar</button>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="<?=base_url()?>src/vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>src/vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>src/vendor/bootstrap4/js/bootstrap.min.js"></script>
	</body>


