
<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4><?=$titulo?>  </h4>
			
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
				
				$toltip = "";
				$ref = '';
				
				if($this->session->userdata("radios")!= "")
				{
					
					
					$seguridad = explode("+",$this->session->userdata("radios"));
					
				
				}else{
					$toltip = 'data-toggle="tooltip" data-placement="left" title="Acceso restringido"';	
				}

					
				
				?>

			<span class="tag tag-success">BATERIAS</span>
			<span class="tag tag-info">ANTENAS</span>
			<span class="tag tag-warning">MICROFONOS</span>
			<span class="tag tag-danger">CLIPS</span>
			<span class="tag tag-default">CARGADOR INDIVIDUAL</span>
			<span class="tag tag-primary">CARGADOR MULPIPLE</span>
			<br><br>
			
			<div class="box box-block bg-white">
				<div class="table-responsive" data-pattern="priority-columns">
				<table class="table table-striped table-bordered dataTable table-sm" id="table-2">
						<thead>
							<tr>
								<th>DEPARTAMENTO O ZONA</th>
								<th class="table-success">XTS 1500/2250</th>
								<th class="table-success">APX 1000</th>
								<th class="table-success">APX 5000</th>
								<th class="table-success">JOHNSON-VIKINGO</th>
								<th class="table-info">XTS 1500/2250</th>
								<th class="table-info">APX 1000/5000</th>
								<th class="table-info">JOHNSON-VIKINGO</th>
								<th class="table-info">MÓVIL MOTOROLA</th>
								<th class="table-warning">XTS 1500/2250</th>
								<th class="table-warning">MÓVIL MOTOROLA</th>
								<th class="table-danger">XTS 1500/2250</th>
								<th class="table-danger">APX 1000</th>
								<th class="table-danger">APX 5000</th>
								<th class="table-danger">JOHNSON-VIKINGO</th>
								<th>XTS 1500/2250</th>
								<th>APX 1000</th>
								<th>APX 5000</th>
								<th >JOHNSON-VIKINGO</th>
								<th class="table-active">MOTOROLA SIMPLE</th>
								<th class="table-active">MOTOROLA IMPRESS</th>
								<th>XTS 1500/2250</th>
								<th>Fecha</th>
								
							</tr>
							</thead>
							<tbody>
							<?
								foreach($accesorios as $accesorio){
									
									$fecha = $this->m_accesorios->fecha_text($accesorio->fecha);
							?>	
							<tr>
								
								<td><?=$accesorio->departamento?></td>
								<td><?=$accesorio->a1?></td>
								<td><?=$accesorio->a2?></td>
								<td><?=$accesorio->a3?></td>
								<td><?=$accesorio->a4?></td>
								<td><?=$accesorio->a5?></td>
								<td><?=$accesorio->a6?></td>
								<td><?=$accesorio->a7?></td>
								<td><?=$accesorio->a8?></td>
								<td><?=$accesorio->a9?></td>
								<td><?=$accesorio->a10?></td>
								<td><?=$accesorio->a11?></td>
								<td><?=$accesorio->a12?></td>
								<td><?=$accesorio->a13?></td>
								<td><?=$accesorio->a14?></td>
								<td><?=$accesorio->a15?></td>
								<td><?=$accesorio->a16?></td>
								<td><?=$accesorio->a17?></td>
								<td><?=$accesorio->a18?></td>
								<td><?=$accesorio->a19?></td>
								<td><?=$accesorio->a20?></td>
								<td><?=$accesorio->a21?></td>
								
								<td><?=$fecha?></td>
								
								
									
							</tr>
							<?}?>
							</tbody>
							<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							</tfoot>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>

<!--
	
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
 <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">

<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Inventario de radios</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="hidden"><a href="#">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">Usuarios</li>
		</ol>
		<div class="clearfix">
		</div>
	</div>
	
	<div class="page-content">
		<div id="tab-general">
			<div class="col-lg-12">
			
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
				
				$toltip = "";
				$ref = '';
				
				if($this->session->userdata("radios")!= "")
				{
					
					
					$seguridad = explode("+",$this->session->userdata("radios"));
					
					if($seguridad[2] == 1){
						echo'
						 <ul class="nav nav-tabs">
							<li class="active"><a href="'.base_url().'index.php?/radios/nuevo" >Nuevo Equipo</a></li>
							
							<li><a href="#tab-messages" data-toggle="tab"></a></li>
						</ul>';
						
						
					}else
					{
						$toltip = 'data-toggle="tooltip" data-placement="left" title="Acceso restringido"';				
					}
				}else{
					$toltip = 'data-toggle="tooltip" data-placement="left" title="Acceso restringido"';	
				}

					
				
				?>

			
				
				<div class="panel panel-blue" style="background:#FFF;">
					<div class="panel-heading">Inventario de equipos </div>
					<div class="panel-body">
						<table id="example" class="display nowrap" class="table table-hover table-bordered">
							<thead>
							<tr>
								<th>Tipo</th>
								<th>Modelo</th>
								<th>Serie</th>
								<th>Id Ceinco</th>
								<th>Patrimonial</th>
								<th>Resguardante</th>
								<th>Departamento</th>
								<th>Canales</th>
								<th>Observaciones</th>
								<th>Ultimo movimiento</th>
								<th>Historial</th>
								<th>Estado</th>

							</tr>
							</thead>
							<tbody>
							<?
								foreach($inventarios as $inventario){
									$canales = "";
									
									
									if($inventario->canales != "++"){
										
										$canal = explode("+",$inventario->canales);
										
										
										
											if($canal[0] == "1"){
												$canales .="OPERATIVOS ";
											}
											if($canal[1] == "1"){
												$canales .="- MANDOS";
											}
											if($canal[2] == "1"){
												$canales .="- PRESIDENCIA ";
											}
									}else{
										$canales = "INHIBIDO";
									}
									if($inventario->estado == 'DE BAJA'){
										$estado = '<span '.$toltip.' class="label label-sm label-default">'.$inventario->estado.'</span>';
									}else if($inventario->estado == 'INHIBIDO'){
										$estado = '<span '.$toltip.' class="label label-sm label-info">'.$inventario->estado.'</span>';
									}else if($inventario->estado == 'EN REPARACION'){
										$estado = '<span '.$toltip.' class="label label-sm label-danger">'.$inventario->estado.'</span>';
									}else if($inventario->estado == 'EN REPROGRAMACION'){
										$estado = '<span '.$toltip.' class="label label-sm label-warning">'.$inventario->estado.'</span>';
									}else if($inventario->estado == 'EXTRAVIADO'){
										$estado = '<span '.$toltip.' class="label label-sm label-default">'.$inventario->estado.'</span>';
									}else{
										$estado = '<span '.$toltip.' class="label label-sm label-success">'.$inventario->estado.'</span>';
									}
									
									$fecha = $this->m_armamento->fecha_text($inventario->f_resguardo);
							?>	
							<tr>
								<td><?=$inventario->tipo?></td>
								<td><?=$inventario->modelo?></td>
								<td><?=$inventario->serie?></td>
								<td><?=$inventario->id_interno?></td>
								<td><?=$inventario->patrimonial?></td>
								<td><?=$inventario->n_usuario." ".$inventario->a_usuario?></td>
								<td><?=$inventario->dep?></td>
								
								<td><?=$canales?></td>
								<td><?=$inventario->observaciones?></td>
								
								<td><?=$fecha?></td>
								<td><a href="<?=base_url()?>index.php?/radios/historial_radio/<?=$inventario->id?>"><span class="label label-sm label-info">Movimientos</span></a></td>

								<td><a <?if($seguridad[0] == 1){?>
										 href='<?=base_url()?>index.php?/radios/ver/<?=$inventario->id?>';
									<?}?> ><?=$estado?></a></td>
									
							</tr>
							<?}?>
							</tbody>
							<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>	
		
	</div>

</div>
</div>
		</div>	
	
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>			

<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/src/exporttable/buttons.flash.min.js"></script>
<script src="<?=base_url()?>/src/exporttable/jszip.min.js"></script>
<script src="<?=base_url()?>/src/exporttable/pdfmake.min.js"></script>
<script src="<?=base_url()?>/src/exporttable/vfs_fonts.js"></script>
<script src="<?=base_url()?>/src/exporttable/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/src/exporttable/buttons.print.min.js"></script>



	
<script>

	
	var NC = jQuery.noConflict();
	
	    NC(document).ready(function() {
		NC('#example').DataTable(
		{
			"scrollX": true,
			
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
		
		
	});
</script>--->