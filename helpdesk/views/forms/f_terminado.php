
<?

	foreach($servicios as $servicio);
	
	$departamentos = $this->m_servicios->obt_departamento_id($servicio->departamento);
	
	
								
	foreach($departamentos as $departamento);
	
	$usuarios = $this->m_servicios->obt_usuario_id($servicio->usuario);
								
	foreach($usuarios as $usuario);
	
	date_default_timezone_set('America/Mexico_City');
		$dia = date("Y-m-d");
		$hora = date("H:i:00");
		$fecha = $dia." ".$hora;
	
	if($servicio->tipo == 1){
		$tipo = 'SOPORTE';		
	}else if($servicio->tipo == 2){
		$tipo = 'REPARACION';		
	}else if($servicio->tipo == 3){
		$tipo = 'MANTENIMIENTO';		
	}
	
	$fecha = explode(" ",$servicio->f_termino);
?>


<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Servicio finalizado</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="dashboard.html">Servicios</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="dashboard.html">Atencion</a>
		</ol>
		<div class="clearfix">
		</div>
	</div>
	
	<div class="page-content">
		<div id="tab-general">
			<div class="col-lg-12">
				<div class="col-lg-6">
					<div class="panel panel-pink">
						<div class="panel-heading">Formato de servicio usuario</div>
						<div class="panel-body pan">
							<div class="form-body pal">
								<div class="form-group">
									<select disabled="" name="usuario" class="form-control">
										<?
											foreach($usuarios as $usuario){
										?>
											<option value="<?=$usuario->id?>" > <?=$usuario->nombre." ".$usuario->apellido ?> </option>
										<?
											}	
										?>

									</select>
								</div>
								
								<div class="form-group">
										<div class="input-icon right">
											<i class="fa fa-desktop"></i>
											<input disabled="" name="departamento" type="text" value="<?=$departamento->nombre?>" class="form-control" /></div>
								</div>
								
								<div class="form-group">
										<div class="input-icon right">
											<i class="fa fa-desktop"></i>
											<input disabled="" name="tipo" type="text" value="<?=$tipo?>" class="form-control" /></div>
								</div>
								<div class="form-group">
									<select disabled="" name="equipo" class="form-control">
										<option>EQUIPO..</option>
										<?
											foreach($equipos as $equipo){
										?>
											<option value="<?=$equipo->id?>" > <?=$equipo->nombre ?> </option>
										<?
											}	
										?>

									</select>
								</div>
									<div class="form-group">
										<div class="input-icon right">
											<i class="fa fa-desktop"></i>
											<input disabled="" name="patrimonial" type="text" value="<?=$servicio->patrimonial?>" class="form-control" /></div>
									</div>
									<div class="form-group">
										<div class="input-icon right">
											<i class="fa fa-edit"></i>
											<input disabled="" name="marca" type="text" value="<?=$servicio->marca?>" class="form-control" /></div>
									</div>


									<div class="form-group">
										<textarea disabled="" rows="5" name="descripcion" class="form-control"><?=$servicio->descripcion?></textarea>
									</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="panel panel-grey">
						<div class="panel-heading">Formato de atencion de servicio</div>
						<div class="panel-body pan">
							<form action="<?php echo base_url();?>index.php?/Servicios/atender" method="POST" class="form-horizontal">
								<div class="form-body pal">
									<div class="form-group">
										<select disabled="" name="estado" class="form-control">
											<option value="2">PROGRAMADO</option>
											<option value="3">FINALIZADO</option>

										</select>
									</div>
									<div class="form-group">
										<select disabled="" name="tecnico" class="form-control">
											<option>PERSONAL DE ATENCION..</option>
											<?
												foreach($tecnicos as $tecnico){
											?>
												<option value="<?=$tecnico->id?>" > <?=$tecnico->nombre." ".$tecnico->apellido ?> </option>
											<?
												}	
											?>

										</select>
									</div>
									<div class="form-group">
										<div class="input-icon right">
											<i class="fa fa-calendar"></i>
											<input disabled="" name="fecha" value="<?=$fecha[0]?>" type="date" class="form-control"/></div>
									</div>
									<div class="form-group">
											<div disabled="" class="input-icon right">
												<i class="fa fa-desktop"></i>
												<input disabled="" name="hora"value="<?=$fecha[1]?>" type="time" value="" class="form-control" /></div>
									</div>
									
										<div class="form-group">
											<textarea disabled="" rows="5" name="solucion" placeholder="Solucion o posible atencion" class="form-control"><?=$servicio->solucion?></textarea>
										</div>

										<input name="usuario" type="hidden" placeholder="Modelo" value="<?php echo $this->session->userdata("id"); ?>" class="form-control" />
						
										<input name="departamento" type="hidden" placeholder="Modelo" value="<?php echo $this->session->userdata("departamento"); ?>" class="form-control" />
						
										<input name="id" type="hidden"value="<?php echo intval($this->uri->segment(3)); ?>" class="form-control" />
					
										
					
									<div class="form-actions text-right pal">
										<button type="submit" class="btn btn-primary">
											Guardar </button>
									</div>
								</div>
							</form>
						</div>
					</div>	
				</div>
				
			</div>
		</div>		
	</div>
</div>	

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script language="JavaScript">		
		$(document).ready(function(){			
			<?php
					
					echo "$('[name=equipo]').val(".$servicio->equipo.");";            					
					echo "$('[name=usuario]').val(".$servicio->usuario.");";
					echo "$('[name=tecnico]').val(".$servicio->tecnico.");";
 				
			?>
		});
</script>			
<script>
	var NC = jQuery.noConflict();
	NC(document).ready(function() {
    NC('#usuarios').DataTable();
} );
</script>