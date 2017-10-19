


<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Estadisticas</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="hidden"><a href="#">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">Estadisticas</li>
		</ol>
		<div class="clearfix">
		</div>
	</div>
	
	<div class="page-content">
		<div id="tab-general">
			<div id="sum_box" class="row mbl">
		
				<?
					$c_ip = $this->m_inicio->progreso($n_pendientes,10);
					
					$clase = $this->m_inicio->progreso_class($c_ip);
				?>					
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-globe"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$n_pendientes?></span></h4>
							<p class="description">
								Servicios Inconclusos</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$c_ip?>%;" class="progress-bar <?=$clase?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				<?
					$c_s = $this->m_inicio->progreso($n_servicios,10);
					
					$clase = $this->m_inicio->progreso_class($c_s);
				?>	
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-desktop"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$n_servicios?></span></h4>
							<p class="description">
								Servicios Pendientes</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$c_s?>%;" class="progress-bar <?=$clase?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				<?
					$c_u = $this->m_inicio->progreso($n_usuarios,100);
					
					$clase = $this->m_inicio->progreso_class($c_u);
				?>	
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-group"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$n_usuarios?></span></h4>
							<p class="description">
								Personal de Mantenimiento</p>
						
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="<?=$n_usuarios?>" aria-valuemin="0" aria-valuemax="320"
									style="width: <?=$c_u?>%;" class="progress-bar <?=$clase?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			

		</div>
	</div>	
	
</div>

