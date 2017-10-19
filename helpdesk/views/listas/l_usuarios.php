<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Usuarios </h4>
			<div class="row row-md">
				<div class="col-lg-12 col-md-12 col-xs-12">
				
					<?if($this->session->userdata("guardado"))
					{        
					echo '<div class="alert alert-success-fill alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
							<strong>Guardado!</strong><a href="#" class="alert-link">' . $this->session->userdata("guardado") . '</a>
						</div>';
							$this->session->unset_userdata("guardado");

					}else if($this->session->userdata("actualizado"))
					{        
						echo '<div class="alert alert-info-fill alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
							<strong>Actualizado!</strong><a href="#" class="alert-link">' . $this->session->userdata("actualizado") . '</a>
						</div>';
						$this->session->unset_userdata("actualizado");
					}else if($this->session->userdata("eliminado"))
					{        
						echo '<div class="alert alert-danger-fill alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
							<strong>Eliminado!</strong><a href="#" class="alert-link">' . $this->session->userdata("eliminado") . '</a>
						</div>';
						$this->session->unset_userdata("eliminado");
					}?>
				</div>
			</div>
			<div class="box box-block bg-white">
				
				<table class="table table-striped table-bordered dataTable" id="table-2">
					<thead>
						<tr>
							<th>No Empleado</th>
							<th>Nombre</th>
							<th>Departamento</th>
							<th>Puesto</th>
							
							<th>Editar</th>
						</tr>
						</thead>
						<tbody>
						<?
							foreach($usuarios as $usuario){
						?>	
						<tr>
							<td><?=$usuario->user?></td>
							<td><?=$usuario->nombreCompleto?></td>
							
							<td><?=$usuario->dep?></td>
							<td><?=$usuario->puesto?></td>
							
							<td>
								<a href="<?php echo base_url();?>index.php?/Usuarios/actualizar_usuario/<?=$usuario->user?>" >
									<span class="tag tag-primary">Editar</span>
								<a>
							</td>
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
						</tr>
						</tfoot>

				</table>
			</div>
		</div>
	</div>
