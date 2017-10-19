
<?

	$p_total = $this->m_inicio->progreso($todos,$todos);
	$p_activo = $this->m_inicio->progreso($activos,$todos);
	$p_prog = $this->m_inicio->progreso($programacion,$todos);
	$p_rep = $this->m_inicio->progreso($reparacion,$todos);
	$p_in = $this->m_inicio->progreso($inhibidos,$todos);
	$p_ext = $this->m_inicio->progreso($extraviados,$todos);

?>
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
			
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-tachometer "></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$todos?></span></h4>
							<p class="description">
								Radios Registrados</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$p_total?>%;" class="progress-bar <?=$this->m_inicio->progreso_class($p_total)?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-rss"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$activos?></span></h4>
							<p class="description">
								Radios Activos</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$p_activo?>%;" class="progress-bar <?=$this->m_inicio->progreso_class($p_activo)?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-spinner"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$programacion?></span></h4>
							<p class="description">
								MTTO (REPROGRAMACIÓN)</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$p_prog?>%;" class="progress-bar <?=$this->m_inicio->progreso_class($p_prog)?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-wrench"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$reparacion?></span></h4>
							<p class="description">
								MTTO (CORRECTIVO)</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$p_rep?>%;" class="progress-bar <?=$this->m_inicio->progreso_class($p_rep)?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-warning"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$inhibidos?></span></h4>
							<p class="description">
								Radios inhibidos</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$p_in?>%;" class="progress-bar <?=$this->m_inicio->progreso_class($p_in)?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-4">
					<div class="panel profit db mbm">
						<div class="panel-body">
							<p class="icon">
								<i class="icon fa fa-slack"></i>
							</p>
							<h4 class="value">
								<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
								</span><span><?=$extraviados?></span></h4>
							<p class="description">
								Radios extraviados</p>
							<div class="progress progress-sm mbn">
								<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
									style="width: <?=$p_ext?>%;" class="progress-bar <?=$this->m_inicio->progreso_class($p_ext)?>">
									<span class="sr-only">80% Complete (success)</span></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>	
	
</div>
</div>
	</div>	
