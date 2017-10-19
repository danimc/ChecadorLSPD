<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<body class="fixed-sidebar fixed-header skin-default content-appear">
		<div class="wrapper">

			<div class="preloader"></div>

			<div class="site-overlay"></div>
			<div class="site-sidebar">
				<div class="custom-scroll custom-scroll-light">
					<ul class="sidebar-menu">
						<li class="menu-title">Navegador</li>
						
						<li class="compact-hide">
							<a href="<?php echo base_url();?>index.php?/Inicio" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-dashboard"></i></span>
								<span class="s-text">Inicio</span>
							</a>
						</li>
						
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fa fa-user"></i></span>
								<span class="s-text">Usuarios</span>
							</a>
							<ul>
							
								<li><a href="<?=base_url()?>index.php?/Usuarios">Usuarios registrados</a></li>
							</ul>
						</li>
					
						
						<?
							if($this->m_seguridad->acceso_modulo(5) != 0){
						?>
						<li class="compact-hide">
							<a href="<?php echo base_url();?>index.php?/checador/lista_usuarios" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-plus"></i></span>
								<span class="s-text">Reposte de Checador</span>
							</a>
						</li>
						<?
							}
						?>
						
					<!-- 	
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fa fa-headphones"></i></span>
								<span class="s-text">Accesorios</span>
							</a>
							<ul>
								<li><a href="<?=base_url()?>index.php?/accesorios/asignar">Asignación de accesorios</a></li>
								<li><a href="<?=base_url()?>index.php?/accesorios">Accesorios</a></li>
							</ul>
						</li> -->
						
					</ul>
				</div>
			</div>
			

			<!-- Header -->
			<div class="site-header">
				<nav class="navbar navbar-light">
					<div class="navbar-left">
						<a class="navbar-brand" style="margin-top: -10px;" href="<?=base_url()?>">
							<div class="logo" style="height: 45px;width: 110px;"></div>
						</a>
						<div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
							<span class="hamburger"></span>
						</div>
						<div class="toggle-button-second dark float-xs-right hidden-md-up">
							<i class="ti-arrow-left"></i>
						</div>
						<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
							<span class="more"></span>
						</div>
					</div>
					<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
						<div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
							<span class="hamburger"></span>
						</div>
						
						<ul class="nav navbar-nav float-md-right">
							
							<li class="nav-item dropdown hidden-sm-down">
								
								<a href="#" data-toggle="dropdown" aria-expanded="false">
								
									<span class="avatar">
										<?=$this->session->userdata("nombreCompleto")?>
										
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right animated fadeInUp">
										
									<a class="dropdown-item" href="<?=base_url()?>index.php?/acceso/logout"><i class="ti-power-off mr-0-5"></i>Cerrar session</a>
								</div>
							</li>
						</ul>


						
					</div>
				</nav>
			</div>

