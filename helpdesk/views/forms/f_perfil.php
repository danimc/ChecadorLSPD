     
<?
		

		foreach($perfiles as $usuario);
		
		$numero = $usuario->user;
		$nombre = $usuario->nombre;
		$apellido = $usuario->apellido;
		$contraseña = $usuario->password;
		$departamento = $usuario->departamento;
		$area = $usuario->area;
		$puesto = $usuario->puesto;
		$nombramiento = $usuario->nombramiento;
		$correo = $usuario->correo;
		$ext = $usuario->ext;
		$ip = $usuario->ip;
		$proxy = $usuario->proxy;
	
?>


            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Mi Perfil</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo base_url();?>index.php?/Inicio">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Perfil</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                
                                            <div class="col-md-12">
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
                                            </div>
                                
                            </div>

                            <div class="col-lg-12">
                              
                                    
                              <div class="row">
                    <div class="col-md-12"><h2><?=$usuario->nombre." ".$usuario->apellido?> </h2>

                        <div class="row mtl">
                           <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <div class="text-center mbl"><img src="http://lorempixel.com/640/480/business/1/" alt="" class="img-responsive"/></div>
                                    <div class="text-center mbl"><a href="#" class="btn btn-green"><i class="fa fa-upload"></i>&nbsp;
                                        Upload</a></div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td>User Name</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>name@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>Street 123, Avenue 45, Country</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span class="label label-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>User Rating</td>
                                        <td><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Member Since</td>
                                        <td> Jun 03, 2014</td>
                                    </tr>
                                    </tbody>
                                </table>
								<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-content">
										<ul class="list-inline item-details">
											<li><a href="http://themifycloud.com">Admin templates</a></li>
											<li><a href="http://themescloud.org">Bootstrap themes</a></li>
										</ul>
									</div>
								</div>
                            </div> -->
                            <div class="col-md-11">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-edit" data-toggle="tab">Mi Perfil</a></li>
                                    <li><a href="#tab-messages" data-toggle="tab">Mis Mensages</a></li>
                                </ul>
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
						<form action="<?php echo base_url();?>index.php?/Usuarios/guardar" method="POST" class="form-horizontal"><h3>Datos Personales</h3>
							 <div class="form-group"><label class="col-sm-3 control-label">No Empleado</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-4"><input disabled type="number" required="" name="numero" value="<?=$numero?>" placeholder="Empleado" class="form-control"/></div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Nombre</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-9"><input disabled required="" type="text" value="<?=$nombre?>" name="nombre" placeholder="Nombres" class="form-control"/></div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Apellido</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-9"><input disabled required="" type="text" name="apellido" value="<?=$apellido?>" placeholder="Apellidos" class="form-control"/></div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Contraseña</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-4"><input required="" name="password" type="password" value="<?=$contraseña?>"placeholder="password" class="form-control"/></div>
									</div>
								</div>
							</div>

							<hr/>
							<h3>Datos Laborales</h3>
							<div class="form-group"><label class="col-sm-3 control-label">Departamento</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-6">
											<select disabled required="" name="departamento" class="form-control">
												<option>Departamento...</option>
												<?
													foreach($departamentos as $departamento){
												?>
													<option value="<?=$departamento->id?>" > <?=$departamento->nombre ?> </option>
												<?
													}	
												?>
											</select></div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Area</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div  class="col-xs-6"><select disabled required="" name="area" class="form-control">
											<option>Area....</option>
											<?
												foreach($areas as $area){
											?>
												<option value="<?=$area->id?>" > <?=$area->nombre ?> </option>
											<?
												}	
											?>
										</select></div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Nombramiento</label>

								 <div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-6">
										<select disabled required="" name="nombramiento" class="form-control">
											<option>Nombramiento....</option>
											<?
												foreach($nombramientos as $nombramiento){
											?>
												<option value="<?=$nombramiento->id?>" > <?=$nombramiento->nombre ?> </option>
											<?
												}	
											?>
										</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Puesto</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-6">
										<select disabled required="" name="puesto" class="form-control">
											<option>Puesto....</option>
											<?
												foreach($puestos as $puesto){
											?>
												<option value="<?=$puesto->id?>" > <?=$puesto->nombre ?> </option>
											<?
												}	
											?>
										</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Correo</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-9"><input name="correo" type="mail" value="<?=$correo?>" placeholder="correo@guadalajara.gob.mx" class="form-control"/></div>
									</div>
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">Ext o Linea</label>

								<div class="col-sm-9 controls">
									<div class="row">
										<div class="col-xs-9"><input type="number" name="ext" value="<?=$ext?>"placeholder="Telefono o Extencion" class="form-control"/></div>
									</div>
								</div>
							</div>
							

							<button type="submit" class="btn btn-green btn-block">Guargar</button>
						</form>
					</div>
					<div id="tab-messages" class="tab-pane fade in">
						<div class="row mbl">
							<div class="col-lg-6"><span style="margin-left: 15px"></span><input type="checkbox"/><a href="#" class="btn btn-success btn-sm mlm mrm"><i class="fa fa-send-o"></i>&nbsp;
								Enviar Mensaje</a></div>
							
						</div>
						<div class="list-group">
		
						<?
							foreach($mensajes as $mensaje){
		
						?>
							<a href="#" class="list-group-item">
								<span style="min-width: 120px; display: inline-block;" class="name">
									</span>
								<span>
									Sed ut perspiciatis unde
								</span>&nbsp; - &nbsp;
								<span style="font-size: 11px;" class="text-muted">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit
								</span>
								<span class="badge">
									12:10 AM
								</span>
								
							</a>
						
							<? } ?>		
						
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
                </div>
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <div id="footer">
                    <div class="copyright">
                        <a href="http://themifycloud.com">2014 © KAdmin Responsive Multi-Purpose Template</a></div>
                </div>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

			
<script>
	var NC = jQuery.noConflict();
	NC(document).ready(function() {
    NC('#usuarios').DataTable();
} );

var NCA = jQuery.noConflict();
NCA(document).ready(function(){			
			<?php

					echo "NCA('[name=departamento]').val(".$usuario->departamento.");";            					
					echo "NCA('[name=area]').val(".$usuario->area.");";
					echo "NCA('[name=puesto]').val(".$usuario->puesto.");";
					echo "NCA('[name=nombramiento]').val(".$usuario->nombramiento.");";
					echo "NCA('[name=proxy]').val(".$usuario->proxy.");";
 				
			?>
		});

</script>