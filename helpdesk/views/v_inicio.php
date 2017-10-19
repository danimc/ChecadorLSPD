<!DOCTYPE html>
<html lang="en">
<head>
    <title>SCC | Sistemas</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/all.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/main.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/pace.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/src/styles/jquery.news-ticker.css">
	
	
	<!-----------------------DATATABLE---------------------------->
	 <link href="<?php echo base_url();?>src/styles/css_datatable.css" rel="stylesheet">
	
</head>

<?
	$n_pendientes = $this->m_inicio->contar_servicios(1,1);
	$n_programados = $this->m_inicio->contar_servicios_tecnico();
?>

<body>

	
	<div id="header-topbar-option-demo" class="page-header-topbar">
		<nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
		<div class="navbar-header">
			<button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			<a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">HelpDesk<!--<img style="margin-top: -15px;" src="<?=base_url();?>src/images/icons/logo_w_m.png"/>--></span><span style="display: none" class="logo-text-icon">µ</span></a></div>
		<div class="topbar-main"><a id="menu-toggle" href="" class="hidden-xs"><i class="fa fa-bars"></i></a>

			<ul class="nav navbar navbar-top-links navbar-right mbn">
				
				</li>
				<li class="dropdown"><a data-hover="dropdown" href="<?php echo base_url();?>index.php?/Sistemas/servicios" class="dropdown-toggle"><i class="fa fa-desktop fa-fw"></i>
				
				<?
					if($n_pendientes != 0){
						echo'<span class="badge badge-red">'.$n_pendientes.'</span>';
					}
				?></a>
					
				</li>
				<li class="dropdown"><a data-hover="dropdown" href="<?php echo base_url();?>index.php?/Sistemas/servicios" class="dropdown-toggle"><i class="fa fa-user fa-fw"></i>
				<?
					if($n_programados != 0){
						echo'<span class="badge badge-yellow">'.$n_programados.'</span>';
					}
				?>
				</a>
					
				</li>	
				</li>
				<li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle">&nbsp;<span class="hidden-xs"><?php echo $this->session->userdata("nombre").' '.$this->session->userdata("apellido") ?></span>&nbsp;<span class="caret"></span></a>
					<ul class="dropdown-menu dropdown-user pull-right">
						<li><a href="<?php echo base_url();?>index.php?/Inicio/perfil"><i class="fa fa-user"></i>Mi perfil</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url();?>/index.php?/acceso/logout"><i class="fa fa-key"></i>Cerrar Sesion</a></li>
					</ul>
				</li>
				<!--<li id="topbar-chat" class="hidden-xs"><a href="<?php echo base_url();?>index.php?/Inicio/mensajes" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">2</span></a></li>-->
			</ul>
		</div>
		</nav>

	</div>
	
	            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                    <li <? if($titulo == 'inicio'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Inicio">
							<i class="fa fa-tachometer fa-fw">
								<div class="icon-bg bg-orange"></div>
							</i><span class="menu-title">Inicio</span>
						</a>
					</li>	
					<li <? if($titulo == 'usuarios'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Usuarios">
							<i class="fa fa-user fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Usuarios</span>
						</a>     
                    </li>
					<li <? if($titulo == 'directorio'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Usuarios/directorio">
							<i class="fa fa-phone fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Extensiones Telefonicas</span>
						</a>     
                    </li>
					
					<li <? if($titulo == 'servicios_sistemas'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Sistemas/servicios">
							<i class="fa fa-desktop fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Soporte Tecnico</span>
						</a>     
                    </li>
					<li <? if($titulo == 'servicios_tecnico'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Sistemas/misservicios">
							<i class="fa fa-user fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Mis pendientes</span>
						</a>     
                    </li>
					<li <? if($titulo == 'informe'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Sistemas/informe">
							<i class="fa fa-list fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Informe de avance</span>
						</a>     
                    </li>
					<li <? if($titulo == 'inventario'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/inventario/informatico">
							<i class="fa fa-building fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Inventario General</span>
						</a>      
                    </li>
					<li <? if($titulo == 'impresoras'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Inventario/impresoras">
							<i class="fa fa-file fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Impresoras</span>
						</a>     
                    </li>
					<li <? if($titulo == 'documentos'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Inicio/documentos">
							<i class="fa fa-square fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Documentos</span>
						</a>     
                    </li>
					<!--<li <? if($titulo == 'mantenimiento'){?>class="active"<?}?>>
						<a href="<?php echo base_url();?>index.php?/Mantenimiento">
							<i class="fa fa-car fa-fw">
								<div class="icon-bg bg-pink"></div>
							</i><span class="menu-title">Mantenimiento</span>
						</a>     
                    </li>-->
					
                    
                     
                </ul>
            </div>
        </nav>
		
</body>

	<script src="<?php echo base_url();?>/src/script/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>/src/script/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url();?>/src/script/html5shiv.js"></script>
    <script src="<?php echo base_url();?>/src/script/respond.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.cookie.js"></script>
    <script src="<?php echo base_url();?>/src/script/icheck.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/custom.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.news-ticker.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.menu.js"></script>
    <script src="<?php echo base_url();?>/src/script/pace.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/holder.js"></script>
    <script src="<?php echo base_url();?>/src/script/responsive-tabs.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.tooltip.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.fillbetween.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>/src/script/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>/src/script/zabuto_calendar.min.js"></script>
    <script src="<?php echo base_url();?>/src/script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="<?php echo base_url();?>/src/script/highcharts.js"></script>
    <script src="<?php echo base_url();?>/src/script/data.js"></script>
    <script src="<?php echo base_url();?>/src/script/drilldown.js"></script>
    <script src="<?php echo base_url();?>/src/script/exporting.js"></script>
    <script src="<?php echo base_url();?>/src/script/highcharts-more.js"></script>
    <script src="<?php echo base_url();?>/src/script/charts-highchart-pie.js"></script>
    <script src="<?php echo base_url();?>/src/script/charts-highchart-more.js"></script>
	
	<script src="<?php echo base_url();?>/src/script/jquery-1.11.3.min.js"></script>
 <script src="<?php echo base_url();?>/src/script/jquery.dataTables.min.js"></script>

	
    <!--CORE JAVASCRIPT-->
    <script src="<?php echo base_url();?>/src/script/main.js"></script>
    <script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-145464-12', 'auto');
        ga('send', 'pageview');


</script>

</html>
