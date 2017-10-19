
<?

	// $p_total = $this->m_inicio->progreso($todos,$todos);
	// $p_activo = $this->m_inicio->progreso($activos,$todos);
	// $p_prog = $this->m_inicio->progreso($programacion,$todos);
	// $p_rep = $this->m_inicio->progreso($reparacion,$todos);
	// $p_in = $this->m_inicio->progreso($inhibidos,$todos);
	// $p_ext = $this->m_inicio->progreso($extraviados,$todos);

?>


<div class="site-content">

	

	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Sistema de checador </h4>

			<?if($this->session->userdata("guardado"))
				{        
					echo '<div class="alert alert-success alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' . $this->session->userdata("guardado") . '</div>';
					$this->session->unset_userdata("guardado");

				}else if($this->session->userdata("actualizado"))
				{        
					echo '<div class="alert alert-info alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' . $this->session->userdata("actualizado") . '</div>';
					$this->session->unset_userdata("actualizado");

				}
				
				
				?>
				<!-- Bloque de indicadores de activos -->
						<!-- Bloque de indicadores de activos --
			<div class="row row-md">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="box box-block tile tile-2 bg-info mb-2">
						<div class="t-icon right"><i class="ti-layout-list-thumb-alt "></i></div>
						<div class="t-content">
							<h1 class="mb-1"><?=$todos?></h1>
							<h6 class="text-uppercase">Armamento registrado</h6>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12" >
					<div class="box box-block tile tile-2 bg-success mb-2" >
						<div class="t-icon right"><i class="ti-check"></i></div>
						<div class="t-content" >
							<h1 class="mb-1" ><?=$almacenado?></h1>
							<h6 class="text-uppercase">almacenado</h6>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
					<div class="box box-block tile tile-2 bg-warning mb-2">
						<div class="t-icon right"><i class="ti-location-arrow "></i></div>
						<div class="t-content">
							<h1 class="mb-1"><?=$servicio?></h1>
							<h6 class="text-uppercase">en servicio </h6>
						</div>
					</div>
				</div>
				
				<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
					<div class="box box-block tile tile-2 bg-danger mb-2">
						<div class="t-icon right"><i class=" ti-na "></i></div>
						<div class="t-content">
							<h1 class="mb-1"><?=$fservicio?></h1>
							<h6 class="text-uppercase">fuera de servicio</h6>
						</div>
					</div>
				</div>
			</div>
			<!-- fin de bloque de indicadores de activos -->
			
			<!-- fin de bloque de indicadores de activos -->
			
			<!-- <div class="box box-block bg-white">
				<div class="table-responsive" data-pattern="priority-columns">
				<table class="table table-striped table-bordered dataTable table-inverse" id="table-2">
						<thead>
							<tr>
								<tr>
									<th>Id</th>
									<th>Departamento</th>
									<th>Armas cortas</th>
									<th>Armas largas</th>
									<th>Pr</th>
									<th>Placas Balisticas</th>
									<th>Cascos</th>
									<th>Aros de restriccion</th>
									<th>Cargadores</th>
									<th>Total de armas</th>
								</tr>
							</tr>
							</thead>
							<tbody>
							<?
										
								$v_b = 0;
								$e_p = 0;
								$e_m = 0;
								$p_r = 0;
								$m_r = 0;
								$e_r = 0;
								$t_r = 0;
								$ar_total = 0;
								
								foreach($departamentos as $departamento){	
								
									$radios_t_zona = $this->m_inicio->total_armamento($departamento->id);
									$cortas = $this->m_inicio->total_x_zona($departamento->id,1);
									$largas = $this->m_inicio->total_x_zona($departamento->id,2);
									$pr = $this->m_inicio->total_x_zona($departamento->id,3);
									$balisticas = $this->m_inicio->total_x_zona($departamento->id,4);
									$cascos = $this->m_inicio->total_x_zona($departamento->id,5);
									$aros = $this->m_inicio->total_x_zona($departamento->id,6);
									$cargadores = $this->m_inicio->total_x_zona($departamento->id,7);

									if($cortas == 0){
										$cortas = "-------"; 
									}
									if($largas == 0){
										$largas = "-------";
									}
									if($pr == 0){
										$pr = "-------";
									}
									if($balisticas == 0){
										$balisticas = "-------";
									}
									if($cascos == 0){
										$cascos = "-------";
									}
									if($aros == 0){
										$aros = "-------";
									}
									if($cargadores == 0){
										$cargadores = "-------";
									}
									
									if($radios_t_zona > 0){
									
										?>	
										<tr>
											<td><?=$departamento->id?></td>
											<td><?=$departamento->nombre?></td>
											<td Style="text-align: center;" class="warning"><?=$cortas?></td>
											<td Style="text-align: center;" class="info"><?=$largas?></td>
											<td Style="text-align: center;" class="success"><?=$pr?></td>
											<td Style="text-align: center;" class="defult"><?=$balisticas?></td>
											<td Style="text-align: center;" class="defult"><?=$cascos?></td>
											
											<td Style="text-align: center;" class="defult"><?=$aros?></td>
											<td Style="text-align: center;" class="defult"><?=$cargadores?></td>
											
											<td Style="text-align: center;" class="danger"><?=$radios_t_zona?></td>
											

										</tr>
										<?
										$v_b = $v_b + $cortas;
										$e_p = $e_p + $largas;
										$e_m = $e_m + $pr;
										$p_r = $p_r + $balisticas;
										$m_r = $m_r + $cascos;
										$e_r = $e_r + $aros;
										$t_r = $t_r + $cargadores;
										$ar_total = $ar_total + $radios_t_zona;
								
									}
								}
								?>
							</tbody>
							<tfoot>
							<tr>
								<th></th>
								<th Style="text-align: center;">Totales</th>
								<th Style="text-align: center;"><?=$v_b?></th> 
								<th Style="text-align: center;"><?=$e_p?></th>
								<th Style="text-align: center;"><?=$e_m?></th>
								<th Style="text-align: center;"><?=$p_r?></th>
								<th Style="text-align: center;"><?=$m_r?></th>
								<th Style="text-align: center;"><?=$e_r?></th>
								<th Style="text-align: center;"><?=$t_r?></th>
								<th Style="text-align: center;"><?=$ar_total?></th>
							</tr>
							</tfoot>
				</table>
			</div>
			</div>-->
		</div>

	</div> 

<script>

</script>