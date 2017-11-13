
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
				
				if($this->session->userdata("checador")!= "")
				{
					
					
					$seguridad = explode("+",$this->session->userdata("checador"));
					
				}else{
					$toltip = 'data-toggle="tooltip" data-placement="left" title="Acceso restringido"';	
				}			
											
				?>
			<span class="tag tag-success"></span>
			<span class="tag tag-info"></span>
			<span class="tag tag-warning"></span>
			<span class="tag tag-danger"></span>
			<br><br>

			<? 
			$col = 'col-sm-12';
			?>
		
			<div class=""></div>
			<div class="box box-block bg-white <?=$col?>">
				<!-- <h5 class="mb-1"><?=$titulo?>  </h5> -->
<div class="col-md-2 box-block">
<form method="POST" action="<?=base_url()?>index.php?/checador/historial_checado_depa/<?=$depa?>">
  <h3>Checar Fecha:</h3>
  <input class="form-control" type="date" min="2017-10-16" name="fecha">
  <input class="btn btn-success" type="submit" value="Filtrar">
</form>
</div>
<div class="col-md-10">
	<h3 align="center">REPORTE DE CHECADO FECHA: <?=$dia?></h3>
</div>
				<div class="table-responsive  " data-pattern="priority-columns">
				<table class=" table table-striped table-bordered dataTable" id="table-2">
		
						<thead>
							<tr>
								<th>N° Empleado</th>
								<th>Nombre </th>
								<th>Ubicacion</th>
								<th>Entrada</th>
								<th>Salida</th>									
							</tr>
							</thead>
							<tbody>
								<tr>
								<?foreach ($asistencia as $data) {
									?><td><?=$data->usr?></td>
									  <td><?=$data->nombreCompleto?></td>
									  <td><?=$data->departamento?></td>
									  <td><?=$data->hora_entrada?></td>
									  <td><?=$data->hora_salida?></td>
									</tr>
								<?}
							
								?>
							</tbody>
							<tfoot>
							
							</tfoot>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>
