
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
			
				<div class="table-responsive  " data-pattern="priority-columns">
				<table class=" table table-striped table-bordered dataTable" id="table-2">
		
						<thead>
							<tr>
								<th>Usuario</th>
								<?
								$tempFecha = '';
								$i = 0;
								foreach ($fecha as $data)
								{
									$tempFecha[$i] = $data->fecha;
									?> <td><?=$data->fecha?><?
									$i++;
								} 
								
								?>								
							</tr>
							</thead>
							<tbody>
							<?
								$entrada = '';
								$tempNombre = '';
								$fecha = '';

								foreach($historico as $data)
								{/*$entrada = $data->hora_entrada;if($entrada=='00:00:00')
										{
											$entrada = "FALTA";
										}			*/
								?>	
							<tr class=" ">
								<?
								if ($data->usr != $tempNombre)
								{?>
									<td><?=$data->nombreCompleto?></td>			
									<?
									$tempNombre = $data->usr;
								}
								if ($data->fecha == $tempFecha[0])
								{
									?><td><?=$data->hora_entrada?></td>
									<?
								}
								?></tr>
							<?}?>
							</tbody>
							<tfoot>
							<tr>
								
							</tr>
							</tfoot>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>
